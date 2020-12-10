<?php

class User{
  private $id;
  public $login;
  private $password;
  public $email;
  public $firstname;
  public $lastname;

  public function register($login, $password, $email, $firstname, $lastname){
    $bdd = new PDO('mysql:host=localhost;dbname=classes;charset=utf8', 'root', '');
    $error = null;

    if (!empty($login) AND !empty($password) AND !empty($email) AND !empty($firstname) AND !empty($lastname)) {
      $lenght_login = strlen($login);
      $lenght_password = strlen($password);
      $lenght_email = strlen($email);
      $lenght_firstname = strlen($firstname);
      $lenght_lastname = strlen($lastname);

      if ($lenght_login <= 255 AND $lenght_password <=255 AND $lenght_email <= 255 AND $lenght_firstname <= 255 AND $lenght_lastname <= 255) {
        $count = $bdd->prepare("SELECT COUNT(*) FROM utilisateurs WHERE login = :login");
        $count->execute(array(':login' => $login));
        $num_rows = $count->fetchColumn();

        if (!$num_rows) {
          $crypted_password = password_hash($password, PASSWORD_BCRYPT);
          $insert = $bdd->prepare("INSERT INTO utilisateurs(login, password, email, firstname, lastname) VALUES(:login, :crypted_password, :email, :firstname, :lastname)");
          $insert->execute(array(
            ':login' => $login,
            ':crypted_password' => $crypted_password,
            ':email' => $email,
            ':firstname' => $firstname,
            ':lastname' => $lastname,
          ));

          if ($insert) {
            $this->login = $login;
            $this->password = $crypted_password;
            $this->email = $email;
            $this->firstname = $firstname;
            $this->lastname = $lastname;
          }
          else {
            $error = "ERROR";
          }
        }
        else {
          $error = "Le login exite déja";
        }
      }
      else {
        $error = "Tout doit faire au max 255 caractères";
      }
    }
    else {
      $error = "Tout doit être remplie";
    }
    echo $error;
    return [$this->login,$this->password, $this->email, $this->firstname, $this->lastname,];
  }





  public function connect($login, $password){
    $bdd = new PDO('mysql:host=localhost;dbname=classes;charset=utf8', 'root', '');
    $error = null;

    if (!empty($login) AND !empty($password)) {
      $count = $bdd->prepare("SELECT COUNT(*) FROM utilisateurs WHERE login = :login");
      $count->execute(array(
        ':login' => $login
      ));
      $num_rows = $count->fetchColumn();

      if ($num_rows) {
        $result = $bdd->prepare("SELECT * FROM utilisateurs WHERE login = :login");
        $result->execute(array(
          ':login' => $login
        ));

        while ($donnees = $result->fetch()) {
          if (password_verify($password, $donnees['password'])) {
            $this->id = $donnees['id'];
            $this->login = $login;
            $this->password = $donnees['password'];
            $this->email = $donnees['email'];
            $this->firstname = $donnees['firstname'];
            $this->lastname = $donnees['lastname'];
          }
        }
      }
    }
    return [$this->id, $this->login, $this->password, $this->email, $this->firstname, $this->lastname];
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
