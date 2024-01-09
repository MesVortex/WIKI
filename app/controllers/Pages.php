<?php

class Pages extends Controller{

  public function __construct(){
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
    $this->view('pages/dashboard');
  }

}