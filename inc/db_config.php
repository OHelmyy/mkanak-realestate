<?php
$hname='localhost';
$uname='root';
$pass='';
$db='mkanakdb';

$con =mysqli_connect($hname,$uname,$pass,$db);

if (!$con) {
  die("Connection failed: ". mysqli_connect_error());
}
?>
