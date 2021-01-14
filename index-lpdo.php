<?php
require_once('configs/lpdo.php');

echo "<b>Construct :</b> <br />";
$Minato = new lpdo();
$Minato->constructeur('localhost', 'root', '', 'classes');
echo "<br /> <br />";

echo "<b>Connexion :</b> <br />";
$Minato->connect('localhost', 'root', '', 'classes');
echo "<br /> <br />";

// echo "DESTRUCT <br />";
// $Minato->destructeur();
// echo "<br />";
//
// echo "CLOSE <br />";
// $Minato->close();
// echo "<br />";


echo "EXECUTE <br />";
$login = "User 60";
$Minato->execute("SELECT * FROM utilisateurs WHERE login = 'User 40'");
echo "<br />";


echo "LASTQUERRY <br />";
$Minato->getLastQuery();
echo "<br />";


echo "LASTRESULT <br />";
$Minato->getLastResult();
echo "<br />";




 ?>
