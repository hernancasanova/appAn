<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Despliega Imagen</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
	<img id="ImgAnimalSelec" src="ObtieneImagen.php?id=<?php echo $_POST['number']; ?>" width="300px" height="300px"  / >
	<div id="InfoAnimal">
		Nombre:<br>;
		Número:<br>
		Fecha nacimiento estimada: <br>
		Estado: <br>
	</div>
</body>
</html>