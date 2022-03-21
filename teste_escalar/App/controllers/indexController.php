<?php

  namespace App\controllers;

  class IndexController{
    public function inicio(){
      require_once '../App/views/index/index.phtml' ;
    }
  }