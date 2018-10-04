<?php 
function getConnexion()
{
  $mysqli = new Mysqli('localhost', 'etnoleng_emmanue', 'estrada_18', 'etnoleng_mixe');
  if($mysqli->connect_errno) exit('Error en la conexion: ' . $mysqli->connect_errno);
  $mysqli->set_charset('utf8');
  return $mysqli;
}