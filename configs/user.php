<?php

  class User{
    private $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;

    public function register($login, $password, $email, $firstname, $lastname){
      $bdd = mysqli_connect('localhost', 'root', '', 'classes');
      $error = null;
      $login = mysqli_escape_string($bdd,htmlspecialchars(trim($login)));
      $password = mysqli_escape_string($bdd,htmlspecialchars(trim($password)));
      $email = mysqli_escape_string($bdd,htmlspecialchars(trim($email)));
      $firstname = mysqli_escape_string($bdd,htmlspecialchars(trim($firstname)));
      $lastname = mysqli_escape_string($bdd,htmlspecialchars(trim($lastname)));

      if (!empty($login) AND !empty($password) AND !empty($email) AND !empty($firstname) AND !empty($lastname)) {
        $lenght_login = strlen($login);
        $lenght_password = strlen($password);
        $lenght_email = strlen($email);
        $lenght_firstname = strlen($firstname);
        $lenght_lastname = strlen($lastname);

        if ($lenght_login <= 255 AND $lenght_password <=255 AND $lenght_email <= 255 AND $lenght_firstname <= 255 AND $lenght_lastname <= 255) {
          $query = mysqli_query($bdd, "SELECT id FROM utilisateurs WHERE login = '$login'");
          $count = mysqli_num_rows($query);

          if (!$count) {
            $crypted_password = password_hash($password, PASSWORD_BCRYPT);
            $insert = mysqli_query($bdd, "INSERT INTO utilisateurs(login, password, email, firstname, lastname) VALUES('$login', '$crypted_password', '$email', '$firstname', '$lastname')");

            if ($insert) {
              $this->login = $login;
              $this->password = $crypted_password;
              $this->email = $email;
              $this->firstname = $firstname;
              $this->lastname = $lastname;
            }
          }
          else {
            $error = "Le login existe deja";
          }
        }
      }
      echo $error;
    }

    public function connect($login, $password){
      $bdd = mysqli_connect('localhost', 'root', '', 'classes');
      $error = null;
      $login = mysqli_escape_string($bdd, htmlspecialchars(trim($login)));
      $password = mysqli_escape_string($bdd, htmlspecialchars(trim($password)));

      if (!empty($login) AND !empty($password)) {
        $query = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE login = '$login'");
        $count = mysqli_num_rows($query);

        if ($count) {
          $result = mysqli_fetch_assoc($query);

          if (password_verify($password, $result['password'])) {
            $this->login = $login;
            $this->password = $result['password'];
            $this->email = $result['email'];
            $this->firstname = $result['firstname'];
            $this->lastname = $result['lastname'];
          }
        }
      }
      return $error;
    }



    public function disconnect(){
      unset($this->login, $this->password, $this->email, $this->firstname, $this->lastname);
      // $this->login = null;
      // $this->password = null;
      // $this->email = null;
      // $this->firstname = null;
      // $this->lastname = null;
      echo "vous êtes déonnecté";
    }


    public function delete(){
      $bdd = mysqli_connect('localhost', 'root', '', 'classes');
      $login = $this->login;
      $query = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE login = '$login'");
      if ($query) {
        $delete = mysqli_query($bdd, "DELETE FROM utilisateurs WHERE login = '$login'");
      }
      else {
        echo "l'utilsiateur n'exite pas";
      }
      echo "l'utilisateur n'exite plus";
    }

    public function update($login, $password, $email, $firstname, $lastname){
      $old_login = $this->login;
      $bdd = mysqli_connect('localhost', 'root', '', 'classes');
      $error = null;
      $login = mysqli_escape_string($bdd,htmlspecialchars(trim($login)));
      $password = mysqli_escape_string($bdd,htmlspecialchars(trim($password)));
      $email = mysqli_escape_string($bdd,htmlspecialchars(trim($email)));
      $firstname = mysqli_escape_string($bdd,htmlspecialchars(trim($firstname)));
      $lastname = mysqli_escape_string($bdd,htmlspecialchars(trim($lastname)));

      if (!empty($login) AND !empty($password) AND !empty($email) AND !empty($firstname) AND !empty($lastname)) {
        $lenght_login = strlen($login);
        $lenght_password = strlen($password);
        $lenght_email = strlen($email);
        $lenght_firstname = strlen($firstname);
        $lenght_lastname = strlen($lastname);

        if ($lenght_login <= 255 AND $lenght_password <=255 AND $lenght_email <= 255 AND $lenght_firstname <= 255 AND $lenght_lastname <= 255) {
          $query = mysqli_query($bdd, "SELECT id FROM utilisateurs WHERE login = '$old_login'");

          if ($query) {
            $crypted_password = password_hash($password, PASSWORD_BCRYPT);
            $update = mysqli_query($bdd, "UPDATE utilisateurs SET login = '$login', password = '$crypted_password', email = '$email', firstname = '$firstname', lastname = '$lastname' WHERE login = '$old_login'");
            if ($update) {
              $this->login = $login;
              $this->password = $crypted_password;
              $this->email = $email;
              $this->firstname = $firstname;
              $this->lastname = $lastname;
            }
          }
        }
      }
    }


    public function isConnected(){
      if ($this->login) {
        echo "<br />Un Utilisateur est connecté";
      }
      else {
        echo "Pas d'utilisateur connecté";
      }
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
      $bdd = mysqli_connect('localhost', 'root', '', 'classes');
      $user = $this->login;
      $query = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE login = '$user'");
      $count = mysqli_num_rows($query);

      if ($count) {
        $result = mysqli_fetch_assoc($query);
          $this->login = $result['login'];
          $this->password = $result['password'];
          $this->email = $result['email'];
          $this->firstname = $result['firstname'];
          $this->lastname = $result['lastname'];
        }
          return [$this->login, $this->password, $this->email, $this->firstname, $this->lastname];
      }
    }

?>
