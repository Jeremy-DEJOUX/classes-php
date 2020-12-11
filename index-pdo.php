<?php
require_once('configs/User-pdo.php');
$Fabrice = new User();

echo "INSCRIPTION <br />";
// $Fabrice->register('User 22', 'mages', 'jeremy@dejoux', 'jeremy', 'yondaime');
// var_dump($Fabrice);
echo "<br />";

echo "CONNEXION <br />";
$Fabrice->connect('User 60', 'mages');
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

echo "NOUVEAU";
$Fabrice->update('User 40', 'mages', 'jeremy@dejoux', 'jeremy', 'yondaime');
var_dump($Fabrice);
echo "<br />";

echo "UTILISATEUR CONNECTE";
// $Fabrice->isConnected();
// var_dump($Fabrice);
echo "<br />";


echo "REFRESH";
var_dump($Fabrice->refresh());
 ?>
