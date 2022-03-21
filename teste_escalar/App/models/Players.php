<?php

  namespace App\models;

  class Players{
    protected $db;

    public function __construct(\PDO $db){
      $this->db = $db;
    }

    public function getPlayers(){
      $query = "select id, nome, valor from players";

      $pdo_sttm = $this->db->query($query);
      return $pdo_sttm->fetchAll(); //retorno de um array com os dados da tabela do banco. Esse array é de índices associativos e numéricos
    }

    public function getValor($id){
      $query = "select valor from players where id = $id";

      $pdo_sttm = $this->db->query($query);
      return $pdo_sttm->fetch(\PDO::FETCH_NUM)[0];
    }
  }

?>