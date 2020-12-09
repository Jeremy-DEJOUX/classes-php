<?php
  require_once('configs/User.php');

  echo "INSCRIPTION";
  $Jeremy = new User();
  // $Jeremy->register('Jeremy', 'azerty', 'jeremy@dejoux', 'jeremy', 'yondaime');
  // var_dump($Jeremy);
  // echo "<br /> <br />";

  echo "CONNEXION";
  $Jeremy->connect('Jeremy', 'azerty');
  var_dump($Jeremy);
  echo "<br /> <br />";

  // echo "DECONNEXION";
  // $Jeremy->disconnect();
  // var_dump($Jeremy);
  // echo "<br /> <br />";

  // echo "DELETE";
  // $Jeremy->delete();
  // var_dump($Jeremy);
  // echo "<br /> <br />";


  echo "UPDATE";
  $Jeremy->update('Minato','12345', 'yondaime@', 'namikaze', 'minato');
  var_dump($Jeremy);
  echo "<br /> <br />";
 ?>
