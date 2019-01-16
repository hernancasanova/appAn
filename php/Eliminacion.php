<?php

include("config.php");
$data = json_decode(file_get_contents('php://input'),true); 
$valor=$_POST["num_elim"];
$mysqli = new mysqli($db_hostname, $db_username, $db_password,$db_name);
//$mysqli = new mysqli("localhost", "root", "","an");
if ($mysqli->connect_errno) {
	echo "No se ha podido conectar";
}else{
	$insert1="DELETE FROM vacuno WHERE numero=".$valor."";
	$ejecutar1= $mysqli->query($insert1);
	//$id_course=$mysqli->insert_id;
	if (!$ejecutar1) {
		echo "Animal no encontrado";
	}
	else{
		echo "Animal eliminado";
	}
	$mysqli->close(); // cierra la conexión a la base de datos
}
	
?>