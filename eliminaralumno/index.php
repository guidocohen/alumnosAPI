<?php

include_once '../api.php';

    $api = new API();

    if(isset($_GET['id'])){
        $id     = $_GET['id'];
        $res = $api->eliminarAlumno($id);

        if($res){
            echo json_encode(array('response' => 'Alumno eliminado correctamente'));
        }else{
            echo json_encode(array('response' => 'Error al eliminar alumno'));
        }
    }else{
        echo json_encode(array('response' => 'Falta un ID para eliminar al alumno'));
    }
    


?>
    