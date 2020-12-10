<?php
require_once('configs/User-pdo.php');
$Fabrice = new User();

echo "INSCRIPTION <br />";
$Fabrice->register('User 15', 'mages', 'jeremy@dejoux', 'jeremy', 'yondaime');
var_dump($Fabrice);
echo "<br />";

 ?>
