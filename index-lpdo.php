<?php
require_once('configs/lpdo.php');

echo "Construct";
$Minato = new lpdo();
$Minato->constructeur('localhost', 'root', '', 'classes');
var_dump($Minato);
echo "<br />";

echo "Connexion";
$Minato->connect('localhost', 'root', '', 'classes');
var_dump($Minato);
echo "<br />";

// echo "DESTRUCT";
// $Minato->destructeur();
// var_dump($Minato);
// echo "<br />";

echo "CLOSE";
$Minato->close();
var_dump($Minato);
echo "<br />";



 ?>
