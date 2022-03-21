<?php

  namespace PROJ\Init;

  abstract class Bootstrap{
    private $routes;

    public function __construct(){
      $this->initRoutes();
      $this->run($this->getUrl());
    }

    public function getRoutes(){
      return $this->routes;
    }

    public function setRoutes(array $routes){
      $this->routes = $routes;
    }

    abstract protected function initRoutes();

    public function run($url){
      foreach($this->getRoutes() as $key => $route){
        if($url === $route['route']){
  
          $class = "\\App\\controllers\\".$route['controller'];
          $controller = new $class;
          
          $action = $route['action'];
          $controller->$action();
        }
      }
    }
  
    public function getUrl(){
      return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH); //pegando qual é o caminho que estamos requisitando para o servidor, ignorando os parâmetros e outros acessórios
    }
  }