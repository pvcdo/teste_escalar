<?php

  namespace App\models;

  class Planos{
    protected $db;

    public function __construct(\PDO $db){
      $this->db = $db;
    }

    public function getPlanos(){
      $query = "select id, nome, valorMensal, valorAnual from planos";

      $pdo_sttm = $this->db->query($query);
      return $pdo_sttm->fetchAll(); //retorno de um array com os dados da tabela do banco. Esse array é de índices associativos e numéricos
    }

    public function getValor($id,$tipo){
      $query = "select valor$tipo from planos where id = $id";

      $pdo_sttm = $this->db->query($query);
      return $pdo_sttm->fetch(\PDO::FETCH_NUM)[0];
    }
  }

?>