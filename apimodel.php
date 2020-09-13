<?php

include_once 'database.php';
include_once 'alumno.php';

class APIModel extends Database
{

    function getAll(){
        $alumnos = array();
        $alumnos['items'] = array();
        

        $query = $this->connect()->query("SELECT * FROM alumnos");

        if($query->rowCount()){
            while($row = $query->fetch()){
                $alumno = new Alumno();
                $alumno->setId($row['id']);
                $alumno->setNombre($row['nombre']);

                array_push($alumnos['items'], $alumno->toArray());
            }

            echo json_encode($alumnos);
        }else{
            echo json_encode(array('error' => 'No hay datos que mostrar'));
        }
    }
}
