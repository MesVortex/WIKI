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

  public function edit(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(isset($_POST['newWikiName']) && isset($_POST['newWikiContent']) && isset($_POST['newCategoryID']) && isset($_POST['newTags'])){
        $newTitle = filter_var($_POST['newWikiName'], FILTER_SANITIZE_SPECIAL_CHARS); 
        $wikiID = filter_var($_POST['wikiID'], FILTER_SANITIZE_NUMBER_INT);
        $newCategoryID = filter_var($_POST['newCategoryID'], FILTER_SANITIZE_NUMBER_INT);
        $newContent = filter_var($_POST['newWikiContent'], FILTER_SANITIZE_SPECIAL_CHARS);
        $newTags = $_POST['newTags'];
        
        $result = $this->wikiModel->editWiki($newTitle, $newContent, $newCategoryID, $newTags, $wikiID);
        if($result){
          header('Location:'. URLROOT .'/pages/account');
        }else{
          $Err = "unkown error!";
          $data = ['err' => $Err];
          $this->view('pages/index', $data);
        }
      }else{
        echo "empty fields";
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

  public function archive(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(isset($_POST['wikiID'])){
        $wikiID = filter_var($_POST['wikiID'], FILTER_SANITIZE_NUMBER_INT);
        $result = $this->wikiModel->archiveWiki($wikiID);
        if($result){
          header('Location:'. URLROOT .'/pages/wikisDash');
        }else{
          $Err = "unkown error!";
          $data = ['err' => $Err];  
          $this->view('pages/index', $data);
        }
      }
    }
  }
}