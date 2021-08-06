<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
      if(isLoggedIn()){
        redirect('contacts/store');
      }

      $data = [
        'title' => 'My Product management',
        'description' => 'This is the first page of my product management application'
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'App to manage Product.'
      ];

      $this->view('pages/about', $data);
    }
  }