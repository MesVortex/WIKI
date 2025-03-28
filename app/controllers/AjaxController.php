<?php

class AjaxController extends Controller{
  private $wikiModel;

  public function __construct(){
    $this->wikiModel = $this->model('Wiki');
  }

  public function search() {
    header('Content-Type: application/json');
      
    $data = file_get_contents('php://input');
    $dataDecoded = json_decode($data);
    $searchResults = $this->wikiModel->searchWiki($dataDecoded->input);
    $jsonEncoded = json_encode($searchResults);
    echo $jsonEncoded;

  
  }
}