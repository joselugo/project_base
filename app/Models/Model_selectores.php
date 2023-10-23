<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_selectores extends Model
{
    /**
     * Instancia de la base de datos.
     *
     * @var object
     */
    var $database;

    /**
     * Constructor de la clase Model_selectores.
     */
    function __construct()
    {
        $database = \Config\Database::connect('default');
        $this->database = $database;
    }

    /**
     * Obtiene todas las sucursales disponibles.
     *
     * @return mixed Retorna un conjunto de opciones HTML para todas las sucursales o false si no se encuentran resultados.
     */
    function get_all_sucursales()
    {
        $builder = $this->database->table('sucursal');
        $builder->select('*');
        $builder->orderBy('id', 'ASC');
        $query = $builder->get();
        if ($query != false) {
            $row = $query->getResult();
            $option = "";
            foreach ($row as $items) {
                $option .= "<option value='" . $items->id . "'>" . $items->sucursal . "</option>";
            }
            return $option;
        } else {
            return false;
        }
    }

    /**
     * Obtiene todas las sucursales disponibles para un usuario específico.
     *
     * @param array $where Condiciones adicionales.
     *
     * @return mixed Retorna un conjunto de opciones HTML para todas las sucursales o false si no se encuentran resultados.
     */
    function get_all_sucursales_by_user($where)
    {
        $builder = $this->database->table('sucursal');
        $builder->select('*');
        $builder->where($where);
        $builder->orderBy('id', 'ASC');
        $query = $builder->get();
        if ($query != false) {
            $row = $query->getResult();
            $option = "";
            foreach ($row as $items) {
                $option .= "<option value='" . $items->id . "'>" . $items->sucursal . "</option>";
            }
            return $option;
        } else {
            return false;
        }
    }

    /**
     * Obtiene todos los roles disponibles.
     *
     * @return mixed Retorna un conjunto de opciones HTML para todos los roles o false si no se encuentran resultados.
     */
    function get_all_roles()
    {
        $builder = $this->database->table('rol');
        $builder->select('*');
        $builder->orderBy('id', 'ASC');
        $query = $builder->get();
        if ($query != false) {
            $row = $query->getResult();
            $option = "";
            foreach ($row as $items) {
                $option .= "<option value='" . $items->id . "'>" . $items->rol . "</option>";
            }
            return $option;
        } else {
            return false;
        }
    }

    /**
     * Obtiene todos los tipos de documentos disponibles.
     *
     * @return mixed Retorna un conjunto de opciones HTML para todos los tipos de documentos o false si no se encuentran resultados.
     */
    function get_all_tipo_documentos()
    {
        $builder = $this->database->table('tipodocumento');
        $builder->select('*');
        $builder->orderBy('id', 'ASC');
        $query = $builder->get();
        if ($query != false) {
            $row = $query->getResult();
            $option = "";
            foreach ($row as $items) {
                $option .= "<option value='" . $items->id . "'>" . strtoupper($items->nombre) . "</option>";
            }
            return $option;
        } else {
            return false;
        }
    }

    /**
     * Obtiene todos los operadores disponibles.
     *
     * @return mixed Retorna un conjunto de opciones HTML para todos los operadores o false si no se encuentran resultados.
     */
    function get_all_operadores()
    {
        $builder = $this->database->table('login l');
        $builder->select('l.id,l.username');
        $builder->orderBy('l.username', 'ASC');
        $query = $builder->get();
        if ($query != false) {
            $row = $query->getResult();
            $option = "";
            foreach ($row as $items) {
                $option .= "<option value='" . $items->id . "'>" . $items->username . "</option>";
            }
            return $option;
        } else {
            return false;
        }
    }

    /**
     * Obtiene todas las columnas de la tabla 'usuarios2'.
     *
     * @return mixed Retorna un conjunto de opciones HTML para todas las columnas de la tabla 'usuarios2' o false si no se encuentran resultados.
     */
    public function get_all_columns()
    {
        $builder = $this->database->table('information_schema.columns');
        $builder->select('column_name');
        $builder->where('table_name', 'usuarios2');
        $builder->where('table_schema', 'escolar');
        $query = $builder->get();
        if ($query != false) {
            $row = $query->getResult();
            $option = "";
            foreach ($row as $items) {
                $option .= "<option value='" . $items->column_name . "'>" . $items->column_name . "</option>";
            }
            return $option;
        } else {
            return false;
        }
    }

    /**
     * Obtiene todas las tablas de la base de datos 'escolar'.
     *
     * @return mixed Retorna un conjunto de opciones HTML para todas las tablas de la base de datos 'escolar' o false si no se encuentran resultados.
     */
    public function get_all_tables()
    {
        $builder = $this->database->table('information_schema.tables');
        $builder->select('table_name');
        $builder->where('table_schema', 'escolar');
        $query = $builder->get();
        if ($query != false) {
            $row = $query->getResult();
            $option = "";
            foreach ($row as $items) {
                $option .= "<option value='" . $items->table_name . "'>" . $items->table_name . "</option>";
            }
            return $option;
        } else {
            return false;
        }
    }

    /**
     * Obtiene opciones HTML para un campo de selección simple.
     *
     * @param string $table       Nombre de la tabla.
     * @param string $columID     Nombre de la columna que contiene el ID.
     * @param string $columnNAME  Nombre de la columna que contiene el nombre.
     * @param mixed  $fk          Valor seleccionado (opcional).
     * @param mixed  $condition   Condiciones adicionales (opcional).
     *
     * @return mixed Retorna un conjunto de opciones HTML o false si no se encuentran resultados.
     */
    public function get_select_simple($table, $columID, $columnNAME, $fk = null, $condition = null)
    {
        $builder = $this->database->table($table);
        $builder->select('*');
        if ($condition != null) {
            $builder->where($condition);
        }
        $query = $builder->get();
        if ($query != false) {
            $rows = $query->getResult();
            $option = "";
            foreach ($rows as $row) {
                if ($row->$columID == $fk) {
                    $option .= " <option value='" . $row->$columID . "' selected>" . $row->$columnNAME . "</option>";
                } else {
                    $option .= " <option value='" . $row->$columID . "'>" . $row->$columnNAME . "</option>";
                }
            }
            return $option;
        } else {
            return false;
        }
    }

    /**
     * Obtiene opciones HTML para un campo de selección múltiple basado en valores de otra tabla.
     *
     * @param string $table      Nombre de la tabla.
     * @param string $valueFK    Nombre de la columna que contiene el valor a comparar.
     * @param array  $condition  Condiciones para filtrar los valores de la tabla.
     * @param string $table2     Nombre de la segunda tabla.
     * @param string $nameID     Nombre de la columna ID de la segunda tabla.
     * @param string $columnName Nombre de la columna que contiene el nombre en la segunda tabla.
     *
     * @return mixed Retorna un conjunto de opciones HTML para un campo de selección múltiple o false si no se encuentran resultados.
     */
    public function get_select_multiple(string $table, string $valueFK, array $condition, $table2, string $nameID, string $columnName)
    {
        $builder = $this->database->table($table);
        $builder->select($valueFK);
        $builder->where($condition);
        $query = $builder->get();
        // Obtener nombres de la tabla 2 donde fk coincide
        $builder = $this->database->table($table2);
        $table2_query = $builder->get();
        $options = '';
        if ($table2_query->getResult() && $query->getResult()) {
            $row = $query->getRow();
            $valueFK = $row->valueFK;
            $valueFK_array = explode(',', $valueFK);
            foreach ($table2_query->getResult() as $name) {
                $selected = (in_array($name->nameID, $valueFK_array)) ? 'selected' : '';
                $options .= "<option value='{$name->nameID}' $selected>{$name->columnName}</option>";
            }
        } elseif ($table2_query->getResult()) {
            foreach ($table2_query->getResult() as $name) {
                $options .= "<option value='{$name->nameID}'>{$name->columnName}</option>";
            }
        }
        return $options;
    }
}
