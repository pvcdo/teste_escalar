<?php

  namespace App\controllers;

  use App\Connection;
  use App\models\Tvs;
  use App\models\Players;
  use App\models\Planos;
  
  class ResumoController{

    public function pagina(){
      session_start();

      [$ii,$mensalidade] = $this->orcamento();
      [$lista_tvs, $lista_players,$lista_planos] = $this->resumo();
      require_once '../App/views/resumo/index.phtml' ;
    }

    public function resumo(){
      $conn = Connection::getDb();

      $tvs = new Tvs($conn);
      $lista_tvs = $tvs->getTvs();

      $players = new Players($conn);
      $lista_players = $players->getPlayers(); 

      $planos = new Planos($conn);
      $lista_planos = $planos->getPlanos();

      return [$lista_tvs, $lista_players,$lista_planos];

    }

    public function orcamento(){
      
      $qtd_tvs = $_SESSION['qtd_tvs'];
      $valores_tvs = $_SESSION['valores_tvs'];

      $totalTvs = $this->total($qtd_tvs,$valores_tvs);

      $qtd_players = $_SESSION['qtd_players'];
      $valores_players = $_SESSION['valores_players'];

      $totalPlayers = $this->total($qtd_players,$valores_players);

      $qtd_planos = $_SESSION['plano']['qtd-planos'];
      $valor_plano = $_SESSION['valor_plano']['valor'];

      $mensalidade = $qtd_planos * $valor_plano;

      $mo = $_SESSION['valor-mao-obra'];

      $ii = $totalTvs + $totalPlayers + $mensalidade + $mo;

      return [$ii,$mensalidade];
    }

    public function total($arr_qtd , $arr_vals){
      $acc = 0;
      foreach($arr_qtd as $i => $valor){
        $acc += $valor * $arr_vals[$i];
      }
      return $acc;
    }
  }

  