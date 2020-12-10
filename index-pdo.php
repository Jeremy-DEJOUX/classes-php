<?php
require_once('configs/User-pdo.php');
$Fabrice = new User();

echo "INSCRIPTION <br />";
// $Fabrice->register('User 16', 'mages', 'jeremy@dejoux', 'jeremy', 'yondaime');
// var_dump($Fabrice);
echo "<br />";

echo "CONNEXION <br />";
$Fabrice->connect('User 16', 'mages');
var_dump($Fabrice);
echo "<br />";
 ?>
