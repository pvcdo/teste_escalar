<?php

  namespace App\models;

  class Tvs{
    protected $db;

    public function __construct(\PDO $db){
      $this->db = $db;
    }

    public function getTvs(){
      $query = "select id, nome from tvs";

      $pdo_sttm = $this->db->query($query);
      return $pdo_sttm->fetchAll(); //retorno de um array com os dados da tabela do banco. Esse array é de índices associativos e numéricos
    }

    public function getValor($id){
      $query = "select valor from tvs where id = $id";

      $pdo_sttm = $this->db->query($query);
      return $pdo_sttm->fetch(\PDO::FETCH_NUM)[0];
    }
  }

?>