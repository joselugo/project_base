<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_oficina extends Model
{
  var $database;
  public function __construct()
  {
    $database = \Config\Database::connect('default');
    $this->database = $database;
  }
  public function get_sucursales()
  {
    $builder = $this->database->table('sucursal');
    $builder->select('id,sucursal,direccion,ubicacion,telefono,rfc');
    $builder->orderBy('id ASC');
    $query = $builder->get();
    return $query ? $query->getResult() : false;
  }
  public function get_sucursal($idsucursal)
  {
    $builder = $this->database->table('sucursal');
    $builder->select('*');
    $builder->where('id', $idsucursal);
    $query = $builder->get();
    return $query ? $query->getResult() : false;
  }
  public function update_sucursal($id, $data)
  {
    $builder = $this->database->table('sucursal');
    $builder->where('id', $id);
    $builder->update($data);
    $result = $this->database->affectedRows();
    return $result > 0 ? true : false;
  }
  public function new_sucursal($data)
  {
    $builder = $this->database->table('sucursal');
    $builder->insert($data);
    $result = $this->database->affectedRows();
    $id = $this->database->insertID();
    return $result ? $id : false;
  }
  public function get_sucursal_nodos($idsucursal)
  {
    $builder = $this->database->table('tblsucursalesnodo');
    $builder->select('idnodo');
    $builder->where('idsucursal', $idsucursal);
    $builder->orderBy('id ASC');
    $query = $builder->get();
    return $query ? $query->getResult() : false;
  }
}
