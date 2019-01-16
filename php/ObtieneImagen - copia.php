<?php

/*include("config.php");
$mysqli = new mysqli($db_hostname, $db_username, $db_password,$db_name);
$result=array();
if ($mysqli->connect_errno) {
	echo "No se ha podido conectar";
}else{
	$sql="SELECT * FROM vacuno";
	$ejecutar1= $mysqli->query($sql);
	//$datos=$mysqli->$ejecutar1;
	//if (mysql_num_rows($ejecutar1)>0) {
	if ($ejecutar1->num_rows>0) {
		echo "<table id='tab1'><thead><tr><th>Numero</th><th>Nombre</th><th>Fecha nacimiento</th><th>Sexo</th><th>Raza</th></tr></thead><tbody>";
		while($row=$ejecutar1->fetch_assoc()){
			//array_push($result, $row["numero"],$row["nombre"]);
			echo "<tr><td>".$row["numero"]."</td><td>".$row["nombre"]."</td><td>".$row["fecha_nacimiento"]."</td><td>".$row["sexo"]."</td><td>".$row["raza"]."</td></tr>";
		}	
		echo "</tbody></table>";
	}
	else{
		echo "No existen registros";
	}*/
    /*$NUnits=count($data['units']);
	for ($i=0; $i <$NUnits; $i++) { 
		$id_unidad=$data['units'][$i]['id'];
        $name_unidad=$data['units'][$i]['name'];
		$insert2="INSERT INTO ent_unit (unit_id, course_id, unit_name) VALUES ('".$id_unidad."','".$id_course."','".$name_unidad."')";
		$ejecutar2=$mysqli->query($insert2);
		$id_unidad=$mysqli->insert_id;
		$NTopics=count($data['units'][$i]['topics']);
		for ($j=0; $j <$NTopics ; $j++) { 
			$id_topico=$data['units'][$i]['topics'][$j]["id"];
            $name_topico=$data['units'][$i]['topics'][$j]['name'];
			$insert3="INSERT INTO ent_topic (topic_id, unit_id, topic_name) VALUES ('".$id_topico."','".$id_unidad."','".$name_topico."')";
			$ejecutar3=$mysqli->query($insert3);
		}
	}
	$mysqli->close(); // cierra la conexión a la base de datos
}*/
	


	/*include("config.php");
	$mysqli = new mysqli($db_hostname, $db_username, $db_password,$db_name);
	$select1 = "SELECT * FROM products WHERE id = $id";
	$ejecutar1= $mysqli->query($select1);
	$result=mysqli_fetch_array($sth);
	echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';*/

	include("config.php");
	if (isset($_GET["id"])) {
		$numero=$_GET["id"];
		echo "Número de animal buscado: $numero<br>";
		$mysqli = new mysqli($db_hostname, $db_username, $db_password,$db_name);
		if ($mysqli->connect_errno) {
			echo "No se ha podido conectar";
		}else{
			//$sql="SELECT image FROM imagenes WHERE id=".$numero."";
			$sql="SELECT imagen FROM imagenes WHERE id=$numero";
			$resultado= $mysqli->query($sql);
			echo "valor de resultado<br>";
			var_dump($resultado);
			echo "<br>Resultado de la búsqueda:";
			//$datos=$mysqli->$ejecutar1;
			//if (mysql_num_rows($ejecutar1)>0) {
			if ($resultado->num_rows>0) {
				echo "<br>Numero de filas: $resultado->num_rows<br>";
				//Renderizado de la imagen
				//$result=mysqli_fetch_array($resultado);
				//echo "contenido result: <br>";
				//var_dump($result);
				//echo "<br>EL contenido de la variable result es: ";//imprime Array
				//echo '<img src="data:image/jpg;base64,'.base64_encode( $result['imagen'] ).'" style="width:128px;height:128px"/>';
				//$imgData = $resultado->fetch_assoc();
				$imgData=mysqli_fetch_array($resultado);
				var_dump($imgData);//Deberia ser igual a $resultado
				echo "Contenido: <br>";
				header("Content-type: image/png");
				echo $imgData["imagen"];
				//echo "<img src='".$imgData['imagen']."' width='175' height='200' />";
				//echo "<br><br>Content: ".$imgData['imagen'];
				//echo '<img src="data:imagen/jpeg;base64,'.base64_encode( $imgData['imagen'] ).'" style="width:128px;height:128px"/>';
				//echo '<img src="'.$result['imagen'].'" alt="HTML5 Icon" style="width:128px;height:128px">';
	        	//echo "<img src=".$imgData['imagen']."  width="300px" height="200px" class="img-responsive" />";
	        	//echo "<img src=".$imgData['imagen']."/>";//NO FUNCIONA
	        	//echo'<img height="300" width="300" src="data:image;base64,'.$imgData['imagen'].'">';//NO FUNCIONA
	        	//echo '<div style="background-color:black; text-align:center; padding: 5px;"><br><img src="data:image/jpeg;base64,'.base64_encode( $imgData['imagen'] ).'"/><div>';
	        	//echo '<img src="data:image/jpeg;base64,'.base64_encode($imgData->load()) .'" />';
	        	//echo $imgData["imagen"];
	        	//print $imgData["imagen"];
	        	//echo '<img src="data:image/jpeg;base64,<?php echo base64_encode($content); 
	        	//echo '<img src="data:image/jpeg;base64,<?php echo base64_encode($imgData); 
			}else{
				echo "<br>Animal no encontrado";
			}
		}
		$mysqli->close(); // cierra la conexión a la base de datos
	}
	else{
		echo "Variable no definida";
		//echo "isset($_GET['image_id'])";
	}
?>