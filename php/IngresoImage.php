<?php
	include("config.php"); 
	$mysqli = new mysqli($db_hostname, $db_username, $db_password,$db_name);
	if ($mysqli->connect_errno) {
		echo "No se ha podido conectar";
	}else{
		/*if(array_key_exists('file', $_FILES)){
    		if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
       			echo 'upload was successful';
    		} else {
       			die("Upload failed with error code " . $_FILES['file']['error']);
    		}
		}*/
		var_dump($_POST);
		//var_dump($_FILES);
		$numero=$_POST["numero"];
		//$check=true;
		$check = getimagesize($_FILES["myimage"]["tmp_name"]);
		//$check = getimagesize($_FILES["myimage"]["error"]);//getimagesize(31.jpg): failed to open stream: No such file or directory
		//$check = getimagesize($_FILES["myimage"]["tmp_name"]);//getimagesize(): Filename cannot be empty
		//$check = getimagesize($_FILES["myimage"]);//getimagesize(0): failed to open stream: No such file or directory
		//set_time_limit(0);
		$start_memory = memory_get_usage();
		//echo "Valor de check:<br>";
		//var_dump($check);
		if ($check!==false) {
			$image=$_FILES['myimage']['tmp_name'];
			$imgContent = addslashes(file_get_contents($image));//ilegible
			echo "<br>Tamaño de la imagen: <br>";
			echo memory_get_usage() - $start_memory."<br>";
			//$image=$_FILES['myimage']['name'];
			//$image=$_FILES['myimage']['tmp_name'];
			//$image=$_FILES["myimage"]["size"];
			//echo "<br>Valor de image: $image<br>";
			//$imgContent = file_get_contents($image);//ilegible
			//$imgContent = mysqli_escape_string($mysqli,(file_get_contents($image)));//ilegible
			//$imgContent = file_get_contents(addslashes($image));//tambien ilegible	
			//echo "<br>$imgContent<br>";
			//$imgContent = addslashes(file_get_contents($image));//echo "$imgContent = addslashes(file_get_contents($image))" ilegible
			//$imgContent = mysql_real_escape_string(file_get_contents($image));//echo "$imgContent = addslashes(file_get_contents($image))" ilegible
			//$imgContent = file_get_contents($image);//ilegible al igual que el anterior
			//$imgContent=file_get_contents($image);//file_get_content al parecer recibe como parametro un directorio
			//echo "valor de imgContent: <br>";	
			//var_dump($imgContent);
			//echo "<br>Valor de imageContent: $imgContent";
			//$insert1="INSERT INTO imagenes (id, imagen ) VALUES ('".$numero."','".$imgContent."')";
			if ($image!=="") {
				//$insert1="INSERT INTO imagenes (id, imagen ) VALUES ('".$numero."','".$imgContent."')";
				$insert1="INSERT INTO imagenes (imagen ) VALUES ('".$imgContent."')";//id AUTO_INCREMENT
				//$insert1="INSERT INTO imagenes (id, imagen ) VALUES ('".$numero."','".$image."')";
				$ejecutar1= $mysqli->query($insert1);
				if($ejecutar1){
					echo "Imagen almacenada satisfactoriamente";
				}else{
					echo "No se pudo almacenar la imagen<br>";
					echo "$mysqli->error($insert1)<br>";
				}
			}else{
				echo "Nombre de imagen vacio";
			}
		}
		else{
			echo "Por favor selecciona una imagen para subir";
		}
		$mysqli->close(); 
	}
	
	/*foreach ($variable as $_FILES => $value) {
		echo "".$_FILES[$variable]."";
	}*/
	/*echo "$_FILES['myimage']['tmp_name']";
	
	foreach ($_FILES as $valor) {
		echo "$valor <br>";
	}*/

	/*if ($_FILES["btnSelecFoto"]["error"] > 0)
  	{
  		echo "Error: " . $_FILES["myimage"]["error"] . "<br>";
  	}
	else
  	{
  		echo "Upload: " . $_FILES["myimage"]["name"] . "<br>";
  		echo "Type: " . $_FILES["myimage"]["type"] . "<br>";
  		echo "Size: " . ($_FILES["myimage"]["size"] / 1024) . " kB<br>";
  		echo "Stored in: " . $_FILES["myimage"]["tmp_name"];
  	}*/




  	//$db = mysqli_connect("localhost","root","","DbName"); 
?>