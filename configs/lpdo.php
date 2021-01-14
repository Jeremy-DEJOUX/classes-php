<?php
  class lpdo{
    private $bdd;
    private $query;
    private $result;





    public function constructeur($host, $username, $password, $db){
      $bdd = mysqli_connect("$host", "$username", "", "$db");
      if ($bdd) {
        echo "Succées <br />";
        $this->bdd = $bdd;
      }
      else {
        echo "Connexion echoué";
      }
    }

    public function connect($host, $username, $password, $db){
      if ($this->bdd) {
        $bdd = $this->bdd;
        $close = mysqli_close($bdd);
        if ($close) {
          $bdd = mysqli_connect("$host", "$username", "", "$db");
          echo "Connexion réouverte";
          $this->bdd = $bdd;
        }
        else {
          echo "Connexion fermé";
        }
      }
      else {
        echo "Aucune connexion à une base de données existe";
      }
    }

    public function destructeur(){
      $bdd = $this->bdd;
      if ($bdd) {
        $close = mysqli_close($bdd);
        if ($close) {
          echo "Connexion detruit";
          $this->bdd = null;
        }
        else {
          echo "Connexion toujours ouverte";
        }
      }
      else {
        echo "Connexion innexistante";
      }
    }

    public function close(){
      $bdd = $this->bdd;
      if ($bdd) {
        $close = mysqli_close($bdd);
        if ($close) {
          echo "Connexion detruit";
          $this->bdd = null;
        }
        else {
          echo "Connexion toujours ouverte";
        }
      }
      else {
        echo "Connexion innexistante";
      }
    }

    public function execute($query){
      $bdd = $this->bdd;
      $select = mysqli_query($bdd,$query);
      $affichage = mysqli_fetch_assoc($select);
      $this->query = $query;
      $this->result = var_dump($affichage);
      // $this->result = $result;
      return $this->result;
    }

    public function getLastQuery(){
      if ($this->query) {
        $query = $this->query;
        return $query;
      }
      else {
        echo "Aucune querry n'a étais effectué";
        return FALSE;
      }
    }

    public function getLastResult(){
      if ($this->query) {
        $result = $this->result;
        return $result;
      }
    }

    public function getTables(){

    }

    public function getFields($table){

    }


  }

 ?>
