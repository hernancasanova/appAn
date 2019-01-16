<?php
	include("config.php");
	$mysqli = new mysqli($db_hostname, $db_username, $db_password,$db_name);
	$sql="SELECT * FROM vacunos WHERE numero=".$_POST['number'];//Se obtiene un único animal
	$resultado= $mysqli->query($sql);
	if ($resultado!="") {
		$AnimData=mysqli_fetch_array($resultado);
		$numero=$AnimData["numero"];
		$nombre=$AnimData["nombre"];
		$fecha_nacimiento=$AnimData["fecha_nacimiento_estimada"];
		$sexo=$AnimData["sexo"];
		$raza=$AnimData["raza"];
		$estado=$AnimData["estado"];
	}else{
		echo "Animal no encontrado";
	}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Despliega Datos</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
	<img id="ImgAnimalSelec" src="ObtieneImagen.php?id=<?php echo $_POST['number']; ?>" width="400px" height="380px"  / >
	<div id="InfoAnimal">
		<strong>Nombre:</strong> <?php echo $nombre; ?><br>
		<strong>Número: </strong><?php echo $numero; ?><br>
		<strong>Fecha Nacimiento estimada: </strong><?php echo $fecha_nacimiento; ?><br>
		<strong>Sexo: </strong><?php echo $sexo; ?><br>
		<strong>Raza:</strong> <?php echo $raza; ?><br>
		<strong>Estado:</strong> <?php echo $estado; ?><br>
	</div>
	<script type="text/javascript">
		
	</script>
</body>
</html>