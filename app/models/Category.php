<?php

class Category {
  private $pdo;

  public function __construct(){
    $this->pdo = Database::getInstance();
  }

  public function countCategories(){
    $query = "SELECT COUNT(categorie.ID) as categoryCount FROM categorie";
    $result = $this->pdo->directQuery($query);
    return $result->categoryCount;
  }

  public function getAllCategories(){
    $query = "SELECT * FROM categorie";
    $result = $this->pdo->directQueryMultiple($query);
    return $result;
  }

  public function addCategory($name){
    $query = "INSERT INTO categorie(name) VALUES(:name)";
    $this->pdo->query($query);
    $this->pdo->bind(':name', $name);
    return $this->pdo->execute();
  }

  public function deleteCategory($id){
    $query = "DELETE FROM categorie WHERE categorie.ID = :id";
    $this->pdo->query($query);
    $this->pdo->bind(':id', $id);
    return $this->pdo->execute();
  }

  public function modifyCategory($id, $name){
    $query = "UPDATE categorie SET categorie.name = :name WHERE categorie.ID = :id";
    $this->pdo->query($query);
    $this->pdo->bind(':id', $id);
    $this->pdo->bind(':name', $name);
    return $this->pdo->execute();
  }
}