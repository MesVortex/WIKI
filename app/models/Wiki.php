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

}