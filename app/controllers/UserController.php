<?php

class UserController extends Controller{
  private $userModel;

  public function __construct(){
    $this->userModel = $this->model('User');
  }

  public function register(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(isset($_POST['fullName']) && isset($_POST['email']) && isset($_POST['pwd']) && isset($_POST['role'])){
        if($_POST['pwd'] === $_POST['repeat-pwd']){
          $encrypted_pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
          $err = $this->userModel->signUp($_POST['fullName'], $_POST['email'], $encrypted_pwd, $_POST['role']);
          if(!$err){
            $accErr = "account already exists";
            $data = ['err' => $accErr];
            $this->view('pages/signup', $data);
          }else{
            $data = ['success' => 'Signed Up Succefully'];
            $this->view('pages/login', $data);
          }
        }else{
          $pwdErr = "Password Doesn't Match";
          $data = ['err' => $pwdErr];
          $this->view('pages/signup', $data);
        }  
      }
    }
  }

  public function signIn(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(isset($_POST['email']) && isset($_POST['pwd'])){
        $userInfo = $this->userModel->login($_POST['email']);
        // check if user is found
        if($userInfo){
          // check password match
          if(password_verify($_POST['pwd'], $userInfo->mdp)){
            $data = [
              'username' => $userInfo->username,
              'userID' => $userInfo->ID
            ];
            //check role
            if($userInfo->role == 2){
              $this->view('pages/index', $data);
            }else{
              $this->view('pages/admin', $data);
            }
          }else{
            echo 'mdp ghalat';
          }
        }else{
          echo 'user not found';
        }
      }else{
        echo 'empty inputs';
      }
    }else{
      echo 'here';
    }
  }
}