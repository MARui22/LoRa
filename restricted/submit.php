<?php

if(isset($_POST["temperature"]) && isset($_POST["humidite"])){
  $my_file = 'log_temp.csv';
  $handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);
  $data = "\n" . '\'' . date('H:i') . '\','.$_POST["temperature"] . ',' . $_POST["humidite"];
  fwrite($handle, $data);
}else{
  echo ("Aucune donnée envoyée.");
}

?>

