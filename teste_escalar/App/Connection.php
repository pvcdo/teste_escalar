<?php

  namespace App;

  class Connection{ 
    public static function getDb(){ //dessa forma quando formos usar esse método não precisamos instanciar a classe, já podemos usar o método diretamente.
      try {
        $conn = new \PDO(
          'mysql:host=localhost;dbname=teste_escalar',
          'root',
          'Mysql#1'
        );
        return $conn;
      } catch (\PDOException $e) {
        echo "Erro!!!!!!!!!!".$e;
      }
    }
  }

?>