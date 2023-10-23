<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_ajustes extends Model
{
	var $database;
	function __construct()
	{
		$database = \Config\Database::connect('default');
		$this->database = $database;
	}


	public function get_cloud($tipo)
	{
		$builder = $this->database->table('cloud');
		$builder->select('*');
		$builder->where('tipo', $tipo);
		$query = $builder->get();
		if ($query != false)	return $query->getRow();
		else return false;
	}

	public function update_cloud($data, $tipo)
	{

		$builder = $this->database->table('cloud');
		$builder->where('tipo', $tipo);
		if ($builder->update($data)) return true;
		else return false;
	}
	public function save_nodo_sucursal($data)
	{
		$builder = $this->database->table('tblsucursalesnodo');
		$builder->insert($data);
		$result = $this->database->affectedRows();
		$id = $this->database->insertID();
		return $result ? $id : false;
	}
	public function delete_nodo_sucursal($idsucursal)
	{
		$builder = $this->database->table('tblsucursalesnodo');
		$builder->where('idsucursal', $idsucursal);
		return $builder->delete() ? true : false;
	}
}
