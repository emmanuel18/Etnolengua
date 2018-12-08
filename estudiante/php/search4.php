<?php 
if(!isset($_POST['search'])) exit('No se recibió el valor a buscar');

require_once 'conexion.php';

function search()
{
  $mysqli = getConnexion();
  $search = $mysqli->real_escape_string($_POST['search']);
  $query = "SELECT sound FROM palabras WHERE esp = '$search'";
  $res = $mysqli->query($query);
  
  while ($row = mysqli_fetch_array($res)) {
	  if(empty($row["sound"])){
		echo("<p></p>");
	}else{
		  echo "
      	<h3>Escuchar</h3>
          <audio src='../$row[sound]' controls></audio>
	     ";
	  }
  }
 
}

search();