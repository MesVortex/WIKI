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
}