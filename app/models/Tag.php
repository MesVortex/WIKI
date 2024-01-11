<?php

class Tag {
  private $pdo;

  public function __construct(){
    $this->pdo = Database::getInstance();
  }

  public function countTags(){
    $query = "SELECT COUNT(tag.ID) as tagCount FROM tag";
    $result = $this->pdo->directQuery($query);
    return $result->tagCount;
  }

  public function getAllTags(){
    $query = "SELECT * FROM tag";
    $result = $this->pdo->directQueryMultiple($query);
    return $result;
  }

  public function addTag($name){
    $query = "INSERT INTO tag(name) VALUES(:name)";
    $this->pdo->query($query);
    $this->pdo->bind(':name', $name);
    return $this->pdo->execute();
  }

  public function deleteTag($id){
    $query = "DELETE FROM tag WHERE tag.ID = :id";
    $this->pdo->query($query);
    $this->pdo->bind(':id', $id);
    return $this->pdo->execute();
  }

  public function modifytag($id, $name){
    $query = "UPDATE tag SET tag.name = :name WHERE tag.ID = :id";
    $this->pdo->query($query);
    $this->pdo->bind(':id', $id);
    $this->pdo->bind(':name', $name);
    return $this->pdo->execute();
  }
}