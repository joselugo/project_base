<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_global extends Model
{
    /**
     * Instancia de la base de datos.
     *
     * @var object
     */
    var $database;

    /**
     * Constructor de la clase Model_global.
     */
    public function __construct()
    {
        $database = \Config\Database::connect('default');
        $this->database = $database;
    }

    /**
     * Obtiene datos de una tabla en la base de datos.
     *
     * @param string $table       Nombre de la tabla.
     * @param string $select      Columnas a seleccionar.
     * @param array  $conditions  Condiciones de selección.
     *
     * @return mixed Retorna un objeto con los datos seleccionados o false si no se encuentran resultados.
     */
    public function get_data(string $table, string $select, array $conditions)
    {
        // Crea un constructor de consultas para la tabla especificada.
        $builder = $this->database->table($table);
        $builder->select($select);
        $builder->where($conditions);
        $query = $builder->get();
        return $query ? $query->getRow() : false;
    }

    /**
     * Crea un nuevo registro en la tabla especificada.
     *
     * @param string $table Nombre de la tabla.
     * @param mixed  $create Datos a insertar.
     *
     * @return bool Devuelve true si la inserción fue exitosa, de lo contrario, false.
     */
    public function create(string $table, $create)
    {
        $builder = $this->database->table($table);
        $builder->insert($create);
        if ($this->database->affectedRows() > 0) return true;
        else return false;
    }

    /**
     * Actualiza registros en la tabla especificada basados en las condiciones dadas.
     *
     * @param string $table       Nombre de la tabla.
     * @param array  $conditions  Condiciones de actualización.
     * @param mixed  $update      Datos de actualización.
     *
     * @return bool Devuelve true si la actualización fue exitosa, de lo contrario, false.
     */
    public function update_table(string $table, array $conditions, $update)
    {
        $builder = $this->database->table($table);
        $builder->where($conditions);
        $builder->update($update);
        if ($this->database->affectedRows() > 0) return true;
        else return false;
    }

    /**
     * Elimina registros de la tabla especificada basados en las condiciones dadas.
     *
     * @param string $table       Nombre de la tabla.
     * @param array  $conditions  Condiciones de eliminación.
     *
     * @return bool Devuelve true si la eliminación fue exitosa, de lo contrario, false.
     */
    public function delete_row(string $table, array $conditions)
    {
        $builder = $this->database->table($table);
        $builder->where($conditions);
        return $builder->delete() ? true : false;
    }

    /**
     * Obtiene nombres de columnas duplicadas en una tabla basados en un conjunto de campos y valores.
     *
     * @param string $table   Nombre de la tabla.
     * @param array  $fields  Campos y valores para buscar duplicados.
     *
     * @return array Arreglo de nombres de columnas duplicadas.
     */
    public function getDuplicates(string $table, $fields)
    {
        $builder = $this->database->table($table);
        $builder->select('*');
        $duplicates = [];
        foreach ($fields as $field => $value) {
            $builder->orWhere($field, $value);
        }
        $query = $builder->get();
        if ($query && $query->resultID->num_rows > 0) {
            $row = $query->getRow();
            foreach ($fields as $field => $value) {
                if ($row->$field === $value) {
                    $duplicates[] = $field;
                }
            }
        }
        return $duplicates;
    }

    /**
     * Cuenta el número de registros en una tabla basados en condiciones dadas.
     *
     * @param string $table       Nombre de la tabla.
     * @param array  $conditions  Condiciones de conteo.
     *
     * @return int El número de registros que coinciden con las condiciones.
     */
    public function count_rows(string $table, array $conditions)
    {
        $builder = $this->database->table($table);
        $builder->select('COUNT(*) as total');
        $builder->where($conditions);
        $query = $builder->get();
        $result = $query->getRow();

        if ($result) {
            return $result->total;
        } else {
            return 0;
        }
    }

    /**
     * Realiza operaciones antes de eliminar un registro en una tabla, como verificar restricciones de clave foránea.
     *
     * @param mixed  $id         ID del registro a eliminar.
     * @param string $tabla      Nombre de la tabla.
     * @param string $query      Consulta para verificar restricciones.
     * @param array  $whereFK    Condiciones para verificar restricciones de clave foránea.
     * @param string $columna_id Nombre de la columna ID.
     *
     * @return bool Devuelve true si se permite la eliminación o false si existen restricciones de clave foránea.
     */
    public function before_delete($id, $tabla, $query, $whereFK = array(), $columna_id)
    {
        $builder = $this->database->table($tabla);
        $builder->select($query);
        foreach ($whereFK as $key) {
            if ($key != 0) {
                $builder->where($key);
                $count = count($whereFK);
            }
        }
        if ($count > 0) {
            return false;
        } else {
            $builder = $this->database->table($tabla);
            $builder->where($columna_id,  $id);
            return $builder->delete() ? true : false;
        }
    }
}
