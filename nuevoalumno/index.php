<?php
include_once '../api.php';

$api = new API();

if (isset($_POST['id']) && $_POST['nombre']) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    
    $api->nuevoAlumno(array('id' => $id, 'nombre' => $nombre));
} else {
    echo json_encode(array('error' => 'Faltan datos para registrar un nuevo alumno'));
}
