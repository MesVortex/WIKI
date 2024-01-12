<?php

class WikiController extends Controller{
  private $wikiModel;

  public function __construct(){
    $this->wikiModel = $this->model('Wiki');
  }

  public function add(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(isset($_POST['wikiName']) && isset($_POST['wikiContent']) && isset($_POST['categoryID']) && isset($_POST['userID']) && isset($_POST['tags'])){
        $title = filter_var($_POST['wikiName'], FILTER_SANITIZE_SPECIAL_CHARS); 
        $userID = filter_var($_POST['userID'], FILTER_SANITIZE_NUMBER_INT);
        $categoryID = filter_var($_POST['categoryID'], FILTER_SANITIZE_NUMBER_INT);
        $content = filter_var($_POST['wikiContent'], FILTER_SANITIZE_SPECIAL_CHARS);
        $tags = $_POST['tags'];
        
        $result = $this->wikiModel->addWiki($title, $content, $userID, $categoryID, $tags);
        if($result){
          header('Location:'. URLROOT .'/pages/account');
        }else{
          $Err = "unkown error!";
          $data = ['err' => $Err];  
          $this->view('pages/index', $data);
        }
      }
    }
  }

  public function delete(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(isset($_POST['wikiID'])){
        $wikiID = filter_var($_POST['wikiID'], FILTER_SANITIZE_NUMBER_INT);
        $result = $this->wikiModel->deleteWiki($wikiID);
        if($result){
          header('Location:'. URLROOT .'/pages/account');
        }else{
          $Err = "unkown error!";
          $data = ['err' => $Err];  
          $this->view('pages/index', $data);
        }
      }
    }
  }
}