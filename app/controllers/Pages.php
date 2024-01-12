<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

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
    $categories = $this->categoryModel->getLatestCategories();
    $latestWikis = $this->wikiModel->getLatestWikis();
    $data = [
      'allCategories' => $categories,
      'latestWikis' => $latestWikis
    ];
    $this->view('pages/index', $data);
  }

  public function explore(){
    $wikis = $this->wikiModel->getAllUnarchivedWikis();
    $data = [
      'allWikis' => $wikis
    ];
    $this->view('pages/explore', $data);
  }

  public function signUp(){
    $this->view('pages/signup');
  }

  public function login(){
    $this->view('pages/login');
  }

  public function addWiki(){
    $categories = $this->categoryModel->getAllCategories();
    $tags = $this->tagModel->getAllTags();
    $data = [
      'allCategories' => $categories,
      'allTags' => $tags
    ];

    $this->view('author/addWiki', $data);
  }

  public function wikiPage(){   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(isset($_POST['wikiID'])){
        $wikiID = filter_var($_POST['wikiID'], FILTER_SANITIZE_NUMBER_INT);
        $wiki = $this->wikiModel->getWiki($wikiID);
        if($wiki){
          $data = [
            'currentWiki' => $wiki
          ];
          $this->view('pages/wikiPage', $data);  
        }
      }
    }
  }

  public function account(){
    if(isset($_SESSION['userID'])){
      $wikis = $this->wikiModel->getAuthorWikis($_SESSION['userID']);
      if($wikis){
        $data = [
          'authorWikis' => $wikis
        ];
        $this->view('author/account', $data);
      }
    }else{
      echo 'no session';
    }
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

  public function tagsDash(){
    $tags = $this->tagModel->getAlltags();
    $data = [
      'allTags' => $tags
    ];
    $this->view('admin/tags', $data);
  }
  
  public function wikisDash(){
    $wikis = $this->wikiModel->getAllwikis();
    $data = [
      'allWikis' => $wikis
    ];
    $this->view('admin/wikis', $data);
  }

}