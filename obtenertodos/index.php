<?php
    include_once '../api.php';
    include_once '../alumno.php';

    $api = new API();

    $api->obtenerAlumnos();
?>