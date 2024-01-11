<?php

class CategoryController extends Controller{
  private $categoryModel;

  public function __construct(){
    $this->categoryModel = $this->model('Category');
  }

  public function add(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(isset($_POST['categoryName'])){
        $result = $this->categoryModel->addCategory($_POST['categoryName']);
        if($result){
          header('Location:'. URLROOT .'/pages/categoriesDash');
        }else{
          $Err = "unkown error!";
          $data = ['err' => $Err];  
          $this->view('admin/categories', $data);
        }
      }
    }
  }

  public function delete(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(isset($_POST['categoryID'])){
        $result = $this->categoryModel->deleteCategory($_POST['categoryID']);
        if($result){
          header('Location:'. URLROOT .'/pages/categoriesDash');
        }else{
          $Err = "unkown error!";
          $data = ['err' => $Err];  
          $this->view('admin/categories', $data);
        }
      }
    }
  }

  public function modify(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(isset($_POST['categoryID']) && isset($_POST['newCategoryName'])){
        $result = $this->categoryModel->modifyCategory($_POST['categoryID'], $_POST['newCategoryName']);
        if($result){
          header('Location:'. URLROOT .'/pages/categoriesDash');
        }else{
          $Err = "unkown error!";
          $data = ['err' => $Err];  
          $this->view('admin/categories', $data);
        }
      }
    }
  }


}