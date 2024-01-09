<?php

class User {
  private $pdo;

  public function __construct(){
    $this->pdo = Database::getInstance();
  }

  public function signUp($name, $email, $password, $role){
    $query = "INSERT INTO user(username, email, mdp, role) VALUES(:name, :email, :password, :role)";
    $this->pdo->query($query);
    $this->pdo->bind(':name', $name);
    $this->pdo->bind(':email', $email);
    $this->pdo->bind(':password', $password);
    $this->pdo->bind(':role', $role);
    return $this->pdo->execute();
  }

  public function login($email){
    $query = "SELECT * FROM user as u WHERE u.email = :email";
    $this->pdo->query($query);
    $this->pdo->bind(':email', $email);
    $this->pdo->execute();
    if($this->pdo->rowCount() > 0){
      $userFound = $this->pdo->single();
      return $userFound;
    }else{
      return false;
    }
  }
}