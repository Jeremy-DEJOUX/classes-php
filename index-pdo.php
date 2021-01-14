<?php
require_once('configs/User-pdo.php');
$Fabrice = new User();

echo "INSCRIPTION <br />";
$Fabrice->register('User 100', 'mages', 'jeremy@dejoux', 'jeremy', 'yondaime');
var_dump($Fabrice);
echo "<br />";

echo "CONNEXION <br />";
$Fabrice->connect('User 100', 'mages');
var_dump($Fabrice);
echo "<br />";

echo "DECONNEXION <br />";
// $Fabrice->disconnect();
// var_dump($Fabrice);
echo "<br />";

echo "SUPRESSION <br />";
// $Fabrice->delete();
// var_dump($Fabrice);
echo "<br />";

// echo "NOUVEAU";
// $Fabrice->update('User 40', 'mages', 'jeremy@dejoux', 'jeremy', 'yondaime');
// var_dump($Fabrice);
// echo "<br />";

echo "UTILISATEUR CONNECTE";
var_dump($Fabrice->isConnected());
// var_dump(TRUE);
echo "<br />";


// echo "REFRESH";
// var_dump($Fabrice->refresh());
 ?>
