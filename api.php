<?php

include_once 'apimodel.php';
include_once 'alumno.php';

class API extends APIModel{

    function nuevoAlumno($datos){
        $nuevoAlumno = new Alumno($datos['id'], $datos['nombre']);
        
        return $this->newItem($nuevoAlumno);
    }

    function obtenerAlumnos(){
        return $this->getAll();
    }

    function obtenerAlumnoPorId($id){
        return $this->getById($id);
    }

    function actualizarAlumno($id, $nombre){
        $nuevoAlumno = new Alumno($id, $nombre);
        
        return $this->updateItem($id, $nuevoAlumno);
    }
        
    function eliminarAlumno($id){
        return $this->deleteItem($id);
    }
}

?>