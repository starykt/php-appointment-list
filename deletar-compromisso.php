<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: index.php");
}

$login = $_SESSION["login"];
$name = isset($_GET["name"]) ? $_GET["name"] : "";
$place = isset($_GET["place"]) ? $_GET["place"] : "";
$datetime = isset($_GET["datetime"]) ? $_GET["datetime"] : "";


$arquivo = file_get_contents("compromissos.json");
$array = json_decode($arquivo);

for ($i = 0; $i < count($array); $i++) {
  $row = $array[$i];
  if (
    $row->login == $login &&
    $row->place == $place &&
    $row->datetime == $datetime &&
    $row->name == $name
  ) {
    unset($array[$i]);
  }
}
$file = fopen("compromissos.json", "w");
fwrite($file, json_encode($array));


header("Location: compromissos.php");
