<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_rutas extends Model
{
  var $database;
  function __construct()
  {
    $database = \Config\Database::connect('default');
    $this->database = $database;
  }
  public function traer_rutas()
  {
    $builder = $this->database->table('permiso');
    $builder->select('*');
    $query = $builder->get();
    if ($query != false) {
      return $query->getResult();
    } else {
      return false;
    }
  }

  public function traer_hijos()
  {
    $builder = $this->database->table('permiso');
    $builder->select('modulo,id_permiso,padre,orden,descripcion,url');
    $builder->where('padre', 0);
    $query = $builder->get();
    if ($query != false) {
      return $query->getResult();
    } else {
      return false;
    }
  }

  public function create_ruta($data)
  {
    $builder = $this->database->table('permiso');
    $builder->insert($data);
    if ($this->database->affectedRows() > 0) return true;
    else return false;
  }
  public function delete_ruta($id)
  {
    $builder = $this->database->table('permiso');
    $builder->where('id_permiso', $id);
    return $builder->delete() ? true : false;
  }
}
