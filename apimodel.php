<?php

include_once 'database.php';
include_once 'alumno.php';

class APIModel extends Database
{

    function getAll()
    {
        $alumnos = array();
        $alumnos['items'] = array();


        $query = $this->connect()->query("SELECT * FROM alumnos");

        if ($query->rowCount()) {
            while ($row = $query->fetch()) {
                $alumno = new Alumno($row['id'], $row['nombre']);

                array_push($alumnos['items'], $alumno->toArray());
            }

            echo json_encode($alumnos);
        } else {
            echo json_encode(array('error' => 'No hay datos que mostrar'));
        }
    }

    function getById($id)
    {
        $alumnos = array();
        $alumnos['items'] = array();

        $query = $this->connect()->prepare("SELECT * FROM alumnos WHERE id= :id");
        $query->execute(['id' => $id]);

        if ($query->rowCount()) {
            while ($row = $query->fetch()) {
                $alumno = new Alumno($row['id'], $row['nombre']);

                array_push($alumnos['items'], $alumno->toArray('total'));
            }
            echo json_encode($alumnos);
        } else {
            echo json_encode(array('error' => 'No hay datos que mostrar'));
        }
    }

    function newItem($item)
    {
        try {
            $query = $this->connect()->prepare('INSERT INTO alumnos (id, nombre) VALUES (:id, :nombre)');
            $query->execute([
                'id' => $item->getId(),
                'nombre' => $item->getNombre()
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    function deleteItem($id)
    {
        try {
            $query = $this->connect()->prepare('DELETE FROM alumnos WHERE id=:id');
            if ($query->execute(['id' => $id]) && $query->rowCount()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo json_encode(array('error' => 'Hubo un error al eliminar el alumno'));
        }
    }

    function updateItem($id, $newItem)
    {
        try {
            $query = $this->connect()->prepare('UPDATE alumnos SET nombre=:nombre WHERE id=:id');
            if (
                $query->execute([
                    'id' => $id,
                    'nombre' => $newItem->getNombre()
                ])
                && $query->rowCount()
            ) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo json_encode(array('error' => 'Hubo un error al actualizar el alumno'));
            return false;
        }
    }
}
