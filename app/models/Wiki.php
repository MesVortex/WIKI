<?php

class Wiki {
  private $pdo;

  public function __construct(){
    $this->pdo = Database::getInstance();
  }

  public function countWikis(){
    $query = "SELECT COUNT(wiki.ID) as wikiCount FROM wiki";
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

  public function showWiki(){
    $query = "";
    $result = $this->pdo->directQueryMultiple($query);
  }

}