<?php

class TagController extends Controller{
  private $tagModel;

  public function __construct(){
    $this->tagModel = $this->model('Tag');
  }

  public function add(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(isset($_POST['tagName'])){
        $result = $this->tagModel->addTag($_POST['tagName']);
        if($result){
          header('Location:'. URLROOT .'/pages/tagsDash');
        }else{
          $Err = "unkown error!";
          $data = ['err' => $Err];  
          $this->view('admin/tags', $data);
        }
      }
    }
  }

  public function delete(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(isset($_POST['tagID'])){
        $result = $this->tagModel->deleteTag($_POST['tagID']);
        if($result){
          header('Location:'. URLROOT .'/pages/tagsDash');
        }else{
          $Err = "unkown error!";
          $data = ['err' => $Err];  
          $this->view('admin/tags', $data);
        }
      }
    }
  }

  public function modify(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(isset($_POST['tagID']) && isset($_POST['newTagName'])){
        $result = $this->tagModel->modifyTag($_POST['tagID'], $_POST['newTagName']);
        if($result){
          header('Location:'. URLROOT .'/pages/tagsDash');
        }else{
          $Err = "unkown error!";
          $data = ['err' => $Err];  
          $this->view('admin/tags', $data);
        }
      }
    }
  }


}