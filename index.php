<?php
  require_once('configs/User.php');

  echo "INSCRIPTION";
  $Jeremy = new User();
  $Jeremy->register('Test', 'jeremy2', 'jeremy', 'jeremy', 'jeremy');
  var_dump($Jeremy);
  echo "<br /> <br />";

  echo "CONNEXION";
  $Jeremy = new User();
  $Jeremy->connect('Test', 'jeremy2');
  var_dump($Jeremy);
  echo "<br /> <br />";

  echo "DECONNEXION";
  $Jeremy = new User();
  $Jeremy->disconnect();
  var_dump($Jeremy);
  echo "<br /> <br />";


 ?>
