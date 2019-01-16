<?php

include("config.php");
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
	}
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
	}*/
	$mysqli->close(); // cierra la conexión a la base de datos
}
	
?>