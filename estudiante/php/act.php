<?php 



function search()
{
  $mysqli = getConnexion();
  $search = $mysqli->real_escape_string($_POST["search"]);
  
  $query = "SELECT Respuesta from quizzpron where IdCurso='$idcurso' AND NumLec='$unidad' LIMIT $cont, 1";
	echo($query);
  $res = $mysqli->query($query);
  $res = utf8_encode($res);
  while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
	  if($row["Respuesta"]===$search){	
		  echo "<div class='alert alert-primary' role='alert'>".$row[Respuesta]."</div>";
	  } 
	  else{echo("<div class='alert alert-primary' role='alert'>no mames</div>");}
    
	
  }
 
}

search();
?>