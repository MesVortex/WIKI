<?php

class Pages extends Controller{
  private $userModel;
  private $tagModel;
  private $categoryModel;
  private $wikiModel;

  public function __construct(){
    $this->userModel = $this->model('user');
    $this->tagModel = $this->model('tag');
    $this->categoryModel = $this->model('category');
    $this->wikiModel = $this->model('wiki');
  }

  public function index(){
    $this->view('pages/index');
  }

  public function signUp(){
    $this->view('pages/signup');
  }

  public function login(){
    $this->view('pages/login');
  }

  public function admin(){
    $data = [
      'usersCount' => $this->userModel->countUsers(),
      'categoriesCount' => $this->categoryModel->countCategories(),
      'tagsCount' => $this->tagModel->countTags(),
      'wikisCount' => $this->wikiModel->countWikis()
    ];
    $this->view('admin/dashboard', $data);
  }
  
  public function categoriesDash(){
    $categories = $this->categoryModel->getAllCategories();
    $data = [
      'allCategories' => $categories
    ];
    $this->view('admin/categories', $data);
  }

}