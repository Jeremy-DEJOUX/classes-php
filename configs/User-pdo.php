<?php

class User{
  private $id;
  public $login;
  public $email;
  public $firstname;
  public $lastname;

  public function register($login, $password, $email, $firstname, $lastname){

  }

  public function connect($login, $password){

  }

  public function disconnect(){

  }

  public function delete(){

  }

  public function update($login, $password, $email, $firstname, $lastname){

  }

  public function isConnected(){

  }

  public function getAllInfos(){
    return [$this->login, $this->password, $this->email, $this->firstname, $this->lastname];
  }

  public function getLogin(){
    return [$this->login];
  }

  public function getEmail(){
    return [$this->email];
  }

  public function getFirstname(){
    return [$this->firstname];
  }

  public function getLastname(){
    return [$this->lastname];
  }

  public function refresh(){
    
  }
}











 ?>
