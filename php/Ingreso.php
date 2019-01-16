<?php
include("config.php");
/*$data = json_decode(file_get_contents('php://input'),true);
$numero=$data["numero"];
$nombre=$data["nombre"];
$Fecha_nacimiento=$data["Fecha_nacimiento"];
$sexo=$data["sexo"];
$raza=$data["raza"];*/
$numero=$_POST["numero"];
$nombre=$_POST["nombre"];
$Fecha_nacimiento=$_POST["fechaNacim"];
$sexo=$_POST["sexo"];
$raza=$_POST["raza"];
$estado=$_POST["estado"];
$check = getimagesize($_FILES["myimage"]["tmp_name"]);//booleano
if ($check!==false) {
			$image=$_FILES['myimage']['tmp_name'];
			$imgContent = addslashes(file_get_contents($image));
}
$mysqli = new mysqli($db_hostname, $db_username, $db_password,$db_name);
if ($mysqli->connect_errno) {
	echo "No se ha podido conectar";
}else{//CUANDO SE HA CONECTADO A LA BASE DE DATOS CORRECTAMENTE
	if($image) {//CUANDO CHECK ES TRUE Y POR LO TANTO $image existe
		$insert1="INSERT INTO imagenes (numero, imagen) VALUES ('".$numero."','".$imgContent."') ";
		$ejecutar1= $mysqli->query($insert1);
		if ($ejecutar1) {
			$insert2="INSERT INTO vacunos (numero, nombre, fecha_nacimiento_estimada,sexo, raza,estado ) VALUES ('".$numero."','".$nombre."','".$Fecha_nacimiento."','".$sexo."','".$raza."','".$estado."')";
			$ejecutar2= $mysqli->query($insert2);
		}
		if (!$ejecutar1||!$ejecutar2) {//ERROR EN ALGUNA DE LAS QUERYS
			echo "Error mientras se estaba ingresando el animal: <br>";
			echo "$mysqli->error($insert1)<br>";
			echo "$mysqli->error($insert2)<br>";
		}
		else{
			echo "Se ha ingresado el animal correctamente";
		}
	}
	else{//CUANDO CHECK ES FALSE
		echo "No se ha podido ingresar el animal";
	}
	$mysqli->close(); // cierra la conexión a la base de datos
}
	
?>