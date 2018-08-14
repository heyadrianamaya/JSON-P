<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
$db = "tamales";
$host = "187.198.60.204";
$user = "remote1";
$port = 3306;
$pass = "1234";
try {
	$con = mysqli_connect($host, $user, $pass, $db, $port);
	if(!$con){
		echo "No se puede conectar a la base de datos";
	}
	$consulta = "SELECT * FROM productos2";
	$query = mysqli_query($con, $consulta);
		//$query->execute();
		$registros = "[";
		while($result = mysqli_fetch_array($query)){
			if ($registros != "[") {
				$registros .= ",";
			}
			$registros .= '{"id": "'.$result["id_producto"].'",';
            $registros .= '"name": "'.$result["nombre_producto"].'",';
            $registros .= '"cant1": "'.$result["cant_tamatan"].'",';
            $registros .= '"cant2": "'.$result["cant_plaza"].'",';
			$registros .= '"cant3": "'.$result["cant_carrera"].'",';
			$registros .= '"price": "'.$result["pre_producto"].'"}';
		}
		$registros .= "]";
        echo $registros;
} catch (Exception $e) {
	echo "Errores: ". $e->getMessage();
};