<?php

namespace sarassoroberto\usm\model;

use \PDO;
use sarassoroberto\usm\config\local\AppConfig;
use sarassoroberto\usm\entity\Interessi;

class InteresseModel{

    private $conn;
    public function __construct()
    {
        try {
            $this->conn = new PDO('mysql:dbname=' . AppConfig::DB_NAME . ';host=' . AppConfig::DB_HOST, AppConfig::DB_USER, AppConfig::DB_PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function create(Interessi $interesse){
        try{
            $pdostm = $this->conn->prepare('INSERT INTO interesse (nome)
            VALUES (:nome);');
            $pdostm->bindValue(':nome', $interesse->getNome(),PDO::PARAM_STR);
            $pdostm->execute();
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }

    public function readAll()
    {
        $pdostm = $this->conn->prepare('SELECT * FROM interesse;');
        $pdostm->execute();
        return $pdostm->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Interessi::class,['']);
    }

    public function readOne($interesse_id){
        try {
            $sql = "Select * from interesse where interesseId=:interesse_id";
            $pdostm = $this->conn->prepare($sql);
            $pdostm->bindValue(':interesse_id',$interesse_id, PDO::PARAM_INT);
            $pdostm->execute();
            $result = $pdostm->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Interessi::class, ['']);
            return count($result) === 0 ? null : $result[0];
        } catch (\Throwable $th) {
            //throw $th;
            echo "qualcosa è andato storto";
            echo " " . $th->getMessage();
        }
    }

    public function update($interesse){

        $sql = "UPDATE interesse set nome=:nome WHERE interesseId=:interesse_id;";
        $pdostm = $this->conn->prepare($sql);
        $pdostm->bindValue(':nome', $interesse->getNome(), PDO::PARAM_STR);
        $pdostm->execute(); 
        if ($pdostm->rowCount() === 0) {
            return false;
        } else if ($pdostm->rowCount() === 1) {
            return true;
        }
    }
}