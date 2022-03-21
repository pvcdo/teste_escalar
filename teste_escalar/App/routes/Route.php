<?php

namespace App\routes;

use PROJ\Init\Bootstrap;

class Route extends Bootstrap{

  protected function initRoutes(){
    $routes['inicio'] = [
      'route' => '/',
      'controller' => 'IndexController',
      'action' => 'inicio'
    ];

    $routes['resumo'] = [
      'route' => '/resumo',
      'controller' => 'ResumoController',
      'action' => 'pagina'
    ];

    $routes['orcamento'] = [
      'route' => '/orcamento',
      'controller' => 'OrcamentoController',
      'action' => 'orcamento'
    ];

    $routes['orcamento_reiniciar'] = [
      'route' => '/orcamento/reiniciar',
      'controller' => 'OrcamentoController',
      'action' => 'reiniciar'
    ];

    $routes['orcamento_tv'] = [
      'route' => '/orcamento/tv',
      'controller' => 'OrcamentoController',
      'action' => 'orcamento_tv'
    ];

    $routes['orcamento_players'] = [
      'route' => '/orcamento/players',
      'controller' => 'OrcamentoController',
      'action' => 'orcamento_players'
    ];

    $routes['orcamento_detalhes'] = [
      'route' => '/orcamento/detalhes',
      'controller' => 'OrcamentoController',
      'action' => 'orcamento_detalhes'
    ];
    

    $this->setRoutes($routes);
  }

}

?>