<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

require "./conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents("php://input");
    $objEmpleado = json_decode($json);

    $sql = "UPDATE usuario SET usuario='$objEmpleado->usuario', contrasena='$objEmpleado->contrasena', email='$objEmpleado->email' WHERE idUsuario='$objEmpleado->idUsuario'";
    
    if ($mysqli->query($sql) === TRUE) {
        $jsonRespuesta = array('msg' => 'OK');
        echo json_encode($jsonRespuesta);
    } else {
        $jsonRespuesta = array('msg' => 'Error al actualizar');
        echo json_encode($jsonRespuesta);
    }
}
?>
