<?php
	include("config.php");
	//$mysqli = new mysqli($db_hostname, $db_username, $db_password,$db_name);
	if (isset($_GET["id"])) {
		$mysqli = new mysqli($db_hostname, $db_username, $db_password,$db_name);
		$sql="SELECT imagen FROM imagenes WHERE numero=".$_GET['id'];
		$resultado= $mysqli->query($sql);
		$imgData=mysqli_fetch_array($resultado);
		header("Content-type: image/png");
		echo $imgData["imagen"];
	}
	else{
		echo "Variable no definida";
		$mysqli->close(); // cierra la conexión a la base de datos
	}
?>