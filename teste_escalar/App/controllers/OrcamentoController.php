<?php

  namespace App\controllers;

  use App\Connection;
  use App\models\Tvs;
  use App\models\Players;
  use App\models\Planos;

  
  class OrcamentoController{

    public function orcamento(){

      session_start();

      $url = $_GET['url'];

      foreach ($_POST as $key => $value) {
        if($value == null){
          $value = 0;
        }
        if($url === 'tvs') {
          $tv[$key] = $value;
          $_SESSION['qtd_tvs'] = $tv;
        }
        if($url === 'players') {
          $player[$key] = $value;
          $_SESSION['qtd_players'] = $player;
        }
        if($url === 'detalhes') {
          if($key === 'plano' || $key === 'qtd-planos'){
            $plano[$key] = $value;
            $_SESSION['plano'] = $plano;
          }else{
            $_SESSION[$key] = $value;
          }
        }
      }
      
      if($url === 'tvs') {
        foreach($_POST as $i => $valor){
          $exp = explode("-",$i);
          $id = $exp[count($exp)-1];
          $conn = Connection::getDb();
          $tvs = new Tvs($conn);
          $valor = $tvs->getValor($id);
          $tv_valor[$i] = $valor;
          $_SESSION['valores_tvs'] = $tv_valor;
        }

        header('Location: /orcamento/players');
      }
      
      if($url === 'players') {
        /*echo '<pre>';
        print_r($_POST);
        echo '</pre>';*/

        foreach($_POST as $i => $valor){
          $exp = explode("-",$i);
          $id = $exp[count($exp)-1];
          $conn = Connection::getDb();
          $players = new Players($conn);
          $valor = $players->getValor($id);
          $player_valor[$i] = $valor;
          $_SESSION['valores_players'] = $player_valor;
        } 
        header('Location: /orcamento/detalhes');

        /*echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';*/
      }

      if($url === 'detalhes') {
        foreach($_POST as $i => $valor){
          if($i === 'plano'){
            $id = $valor;
            $conn = Connection::getDb();
            $planos = new Planos($conn);
            $valorPlano = $planos->getValor($id,$_POST['forma-pagamento']);
            $plano_valor['valor'] = $valorPlano;
            $_SESSION['valor_plano'] = $plano_valor;
          }
        }  
        header('Location: /resumo');
      }
    }

    public function reiniciar(){
      session_start();
      session_destroy();
      header('Location: /');
    }

    public function orcamento_tv(){
      $conn = Connection::getDb(); //estou usando diretamente o método da classe Conn, sem instanciar essa classe, já que o método getDb é static. À propósito, este método cria uma conexão com o banco de dados.

      $tvs = new Tvs($conn);

      $lista_tvs = $tvs->getTvs();
      require_once '../App/views/orcamento/tvs.phtml' ;
    }

    public function orcamento_players(){
      $conn = Connection::getDb();

      $players = new Players($conn);

      $lista_players = $players->getPlayers();
      require_once '../App/views/orcamento/players.phtml' ;
    }

    public function orcamento_detalhes(){
      $conn = Connection::getDb();

      $planos = new Planos($conn);

      $lista_planos = $planos->getPlanos();
      require_once '../App/views/orcamento/detalhes.phtml' ;
    }

  }