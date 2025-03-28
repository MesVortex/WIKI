<?php

class Wiki {
  private $pdo;

  public function __construct(){
    $this->pdo = Database::getInstance();
  }

  public function countArchivedWikis(){
    $query = "SELECT COUNT(wiki.ID) as wikiCount FROM wiki WHERE wiki.status = 0";
    $result = $this->pdo->directQuery($query);
    return $result->wikiCount;
  }

  public function countUnarchivedWikis(){
    $query = "SELECT COUNT(wiki.ID) as wikiCount FROM wiki WHERE wiki.status = 1";
    $result = $this->pdo->directQuery($query);
    return $result->wikiCount;
  }

  public function addWiki($title, $content, $userID, $categoryID, $tags){
    $query1 = "INSERT INTO wiki(titre, contenu, status, authorID, categorieID) VALUES(:title, :content, '1', :userID, :categoryID)";
    $this->pdo->query($query1);
    $this->pdo->bind(':title', $title);
    $this->pdo->bind(':content', $content);
    $this->pdo->bind(':userID', $userID);
    $this->pdo->bind(':categoryID', $categoryID);
    $response1 = $this->pdo->execute();
    
    $lastWiki = $this->pdo->lastID();

    foreach($tags as $tag){
      $query2 = "INSERT INTO wiki_tag(wikiID, tagID) VALUES(:wikiID, :tagID)";
      $this->pdo->query($query2);
      $this->pdo->bind(':wikiID', $lastWiki);
      $this->pdo->bind(':tagID', $tag);
      $response2 = $this->pdo->execute();
    }

    if($response1 && $response2){
      return true;
    }else{
      return false;
    }

  }
  
  public function editWiki($newTitle, $newContent, $newCategoryID, $newTags, $wikiID){
    $query1 = "UPDATE wiki SET wiki.titre = :title , wiki.contenu = :content, wiki.categorieID = :categoryID WHERE wiki.ID = :wikiID";
    $this->pdo->query($query1);
    $this->pdo->bind(':title', $newTitle);
    $this->pdo->bind(':content', $newContent);
    $this->pdo->bind(':categoryID', $newCategoryID);
    $this->pdo->bind(':wikiID', $wikiID);
    $response1 = $this->pdo->execute();

    foreach($newTags as $tag){
      $query2 = "DELETE FROM wiki_tag WHERE wiki_tag.wikiID = :wikID";
      $this->pdo->query($query2);
      $this->pdo->bind(':wikID', $wikiID);
      $response2 = $this->pdo->execute();
    }

    
    foreach($newTags as $tag){
      $query3 = "INSERT INTO wiki_tag(wikiID, tagID) VALUES(:wikiID, :tagID)";
      $this->pdo->query($query3);
      $this->pdo->bind(':wikiID', $wikiID);
      $this->pdo->bind(':tagID', $tag);
      $response3 = $this->pdo->execute();
    }

    if($response1 && $response2 && $response3){
      return true;
    }else{
      return false;
    }

  }

  public function deleteWiki($wikiID){
    $query = "DELETE FROM wiki WHERE wiki.ID = :wikiID";
    $this->pdo->query($query);
    $this->pdo->bind(':wikiID', $wikiID);
    $response = $this->pdo->execute();
    if($response){
      return true;
    }else{
      return false;
    }
  }

  public function archiveWiki($wikiID){
    $query = "UPDATE wiki SET wiki.status = 0 WHERE wiki.ID = :wikiID";
    $this->pdo->query($query);
    $this->pdo->bind(':wikiID', $wikiID);
    $response = $this->pdo->execute();
    if($response){
      return true;
    }else{
      return false;
    }
  }

  public function getWiki($wikiID){
    $query = "SELECT w.ID, w.titre, w.contenu, w.authorID, w.date, u.username, GROUP_CONCAT(t.name) as tagName, c.name
              FROM wiki as w 
              JOIN wiki_tag as wt ON w.ID = wt.wikiID 
              JOIN user as u ON u.ID = w.authorID 
              JOIN tag as t ON t.ID = wt.tagID
              JOIN categorie as c ON c.ID = w.categorieID
              GROUP BY w.ID, w.titre, w.contenu, u.username, c.name
              HAVING w.ID = :wikiID";
    $this->pdo->query($query);
    $this->pdo->bind(':wikiID', $wikiID);
    $response = $this->pdo->execute();
    if($response){
      $result = $this->pdo->single();
      return $result;
    }else{
      return false;
    }
  }

  public function getAllWikis(){
    $query = "SELECT w.ID, w.titre, w.contenu, w.status, w.date, u.username
              FROM wiki as w
              JOIN user as u 
              ON u.ID = w.authorID";
    $result = $this->pdo->directQueryMultiple($query);
    return $result;
  }

  public function getAllUnarchivedWikis(){
    $query = "SELECT w.ID, w.titre, w.contenu, w.status, u.username
              FROM wiki as w
              JOIN user as u 
              ON u.ID = w.authorID
              WHERE status = 1";
    $result = $this->pdo->directQueryMultiple($query);
    return $result;
  }

  public function getAuthorWikis($authorID){
    $query = "SELECT w.ID, w.titre, w.contenu, u.username
              FROM wiki as w
              JOIN user as u 
              ON u.ID = w.authorID 
              WHERE w.authorID = :authorID
              AND w.status = 1";
    $this->pdo->query($query);
    $this->pdo->bind(':authorID', $authorID);
    $response = $this->pdo->execute();
    if($response){
      $results = $this->pdo->resultSet();
      if($this->pdo->rowCount() > 0){
        return $results;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }

  public function getLatestWikis(){
    $query = "SELECT w.ID, w.titre, w.contenu, u.username
              FROM wiki as w
              JOIN user as u 
              ON u.ID = w.authorID 
              WHERE w.status = 1
              ORDER BY w.ID DESC
              LIMIT 4";
    $result = $this->pdo->directQueryMultiple($query);
    return $result;
  }

  public function searchWiki($search){
    try {
      $searchTerm = '%' . $search . '%';
      $query = "SELECT DISTINCT w.ID, w.titre, w.contenu, u.username
                FROM wiki AS w
                JOIN user AS u ON u.ID = w.authorID
                JOIN categorie AS c ON c.ID = w.categorieID
                JOIN wiki_tag AS wt ON wt.wikiID = w.ID
                JOIN tag AS t ON t.ID = wt.tagID
                WHERE  w.titre LIKE :input OR c.name LIKE :input OR t.name LIKE :input
                AND w.status = 1";
    
      $this->pdo->query($query);
    
      $this->pdo->bind(":input", $searchTerm);
      $res = $this->pdo->resultSet();
      return $res;

    } catch (Exception $e) {
      echo $e->getMessage();
    }

}

}