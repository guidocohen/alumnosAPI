<?php
include_once '../api.php';

$api = new API();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $api->obtenerAlumnoPorId($id);
} else {
    echo json_encode(array('error' => 'Falta un ID para buscar al alumno'));
}
