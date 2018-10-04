<?php 
if(!isset($_POST['search'])) exit('No se recibió el valor a buscar');

require_once 'conexion.php';

function search()
{
  $mysqli = getConnexion();
  $search = $mysqli->real_escape_string($_POST['search']);
  $query = "SELECT video FROM palabras WHERE esp = '$search'";
  $res = $mysqli->query($query);
  
  while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
    echo " 
	<h3>Pronunciación</h3>
	<video  width='350px' controls>
		<source src='../$row[video]' type='video/mp4'>					  
	</video>
	";
	
  }
 
}

search();