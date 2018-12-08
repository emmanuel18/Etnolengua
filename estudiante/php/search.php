<?php 
if(!isset($_POST['search'])) exit('No se recibió el valor a buscar');

require_once 'conexion.php';

function search()
{
  $mysqli = getConnexion();
  $search = $mysqli->real_escape_string($_POST["search"]);
  
  $query = "SELECT * FROM palabras WHERE esp = '$search' OR mixe = '$search'";
  $res = $mysqli->query($query);
  while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
	  if($row["mixe"]===$search){		  
		  echo "$row[esp]";
	  }elseif($row["esp"]===$search){		  
		  echo "$row[mixe]";
	  }
	  else{
		  echo "$row[esp]";
	  }
    
	
  }
 
}

search();