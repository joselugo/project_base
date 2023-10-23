<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_configuracion extends Model
{
    var $database;
    function __construct()
    {
        $database = \Config\Database::connect('default');
        $this->database = $database;
    }

    function get_cron_pantalla()
    {
        $builder = $this->database->table('tblconfiguration');
        $builder->where('setting', 'cron_pantalla');
        $query = $builder->get();
        if ($query != false) {
            $row = $query->getRow();
            return $row->value;
        } else return false;
    }

    function get_cron_factura()
    {
        $builder = $this->database->table('tblconfiguration');
        $builder->where('setting', 'cron_factura');
        $query = $builder->get();
        if ($query != false) {
            $row = $query->getRow();
            return $row->value;
        } else return false;
    }

    function get_cron_corte()
    {
        $builder = $this->database->table('tblconfiguration');
        $builder->where('setting', 'cron_corte');
        $query = $builder->get();
        if ($query != false) {
            $row = $query->getRow();
            return $row->value;
        } else return false;
    }
    public function get_configuracion(array $ids)
    {
        $builder = $this->database->table('tblconfiguration');
        $builder->select('*');
        foreach ($ids as $key => $value) {
            $key == 0 ? $builder->where('id', $value) : $builder->orWhere('id', $value);
        }
        $query = $builder->get();
        $values = $query->getResultArray();
        $values = array_column($values, "value");
        return $values ?: false;
    }
    public function get_configuracion_name(array $ids)
    {
        $valores = array();
        $builder = $this->database->table('tblconfiguration');
        $builder->select('*');
        foreach ($ids as $key => $value) {
            $key == 0 ? $builder->where('id', $value) : $builder->orWhere('id', $value);
        }
        $query = $builder->get();
        $values = $query->getResultArray();
        foreach ($values as $key => $value) {
            $valores[$value['setting']] = $value['value'];
        }
        return $valores ?: false;
    }
    public function update_batch(array $data, string $columna)
    {
        $builder = $this->database->table('tblconfiguration');
        $builder->updateBatch($data, $columna);
        $result = $this->database->affectedRows();
        return $result ? true : false;
    }
    public function get_pasarelas()
    {
        $builder = $this->database->table('pasarelaotros');
        $builder->select('*');
        $builder->orderBy('id ASC');
        $query = $builder->get();
        return $query ? $query->getResult() : false;
    }
    public function new_pasarela_otros(array $data)
    {
        $builder = $this->database->table('pasarelaotros');
        $builder->insert($data);
        $result = $this->database->affectedRows();
        $id = $this->database->insertID();
        return $result ? $id : false;
    }
    public function get_pasarela_otro(string $id)
    {
        $builder = $this->database->table('pasarelaotros');
        $builder->select('*');
        $builder->where('id', $id);
        $query = $builder->get();
        return $query ? $query->getRow() : false;
    }
    public function update_pasarela_otro(string $id, array $data)
    {
        $builder = $this->database->table('pasarelaotros');
        $builder->where('id', $id);
        $builder->update($data);
        $result = $this->database->affectedRows();
        return $result > 0 ? true : false;
    }
    public function delete_pasarela_otros($id)
    {
        $builder = $this->database->table('pasarelaotros');
        $builder->where('id', $id);
        return $builder->delete() ? true : false;
    }
    public function get_departamentos()
    {
        $builder = $this->database->table('departamentos');
        $builder->select('id,dp,dsp,maildp');
        $builder->orderBy('id ASC');
        $query = $builder->get();
        return $query ? $query->getResult() : false;
    }
    public function get_departamento(string $id)
    {
        $builder = $this->database->table('departamentos');
        $builder->select('*');
        $builder->where('id', $id);
        $query = $builder->get();
        return $query ? $query->getRow() : false;
    }
    public function insert_new_departamento($data)
    {
        $builder = $this->database->table('departamentos');
        $builder->insert($data);
        $result = $this->database->affectedRows();
        $id = $this->database->insertID();
        return $result ? $id : false;
    }
    public function update_departamento(string $id, array $data)
    {
        $builder = $this->database->table('departamentos');
        $builder->where('id', $id);
        $builder->update($data);
        $result = $this->database->affectedRows();
        return $result > 0 ? true : false;
    }
    public function delete_departamento($id)
    {
        $builder = $this->database->table('departamentos');
        $builder->where('id', $id);
        return $builder->delete() ? true : false;
    }
    public function consulta_cambios_masivos(int $nodo, int $perfil, int $dia)
    {
        $builder = $this->database->table('tblservicios s');
        $builder->select('count(s.id) clientes');
        $builder->join('tblavisouser a', 'a.cliente=s.idcliente');
        if ($nodo <> 0) $builder->where('s.nodo', $nodo);
        if ($perfil <> 0) $builder->where('s.idperfil', $perfil);
        if ($dia <> 0) $builder->where('a.diapago', $dia);
        $query = $builder->get();
        return $query ? $query->getRow() : false;
    }
    public function consulta_cambios_masivos_idcliente(int $nodo, int $perfil, int $dia)
    {
        $builder = $this->database->table('tblservicios s');
        $builder->select('s.idcliente');
        $builder->join('tblavisouser a', 'a.cliente=s.idcliente');
        if ($nodo <> 0) $builder->where('s.nodo', $nodo);
        if ($perfil <> 0) $builder->where('s.idperfil', $perfil);
        if ($dia <> 0) $builder->where('a.diapago', $dia);
        $builder->groupBy('s.idcliente');
        $query = $builder->get();
        return $query ? $query->getResult() : false;
    }
    public function update_batch_avisouser(array $data, string $columna)
    {
        $builder = $this->database->table('tblavisouser');
        $builder->updateBatch($data, $columna);
        $result = $this->database->affectedRows();
        return $result ? true : false;
    }
    public function get_zonas()
    {
        $builder = $this->database->table('zonas z');
        $builder->select('z.*,
        (SELECT COUNT(u.id) from usuarios2 u INNER JOIN tblservicios t ON t.idcliente=u.id WHERE u.estado="ACTIVO" AND t.emisor=z.id) activos,
        (SELECT COUNT(u.id) from usuarios2 u INNER JOIN tblservicios t ON t.idcliente=u.id WHERE u.estado="SUSPENDIDO" AND t.emisor=z.id) suspendidos');
        $builder->orderBy('id ASC');
        $query = $builder->get();
        return $query ? $query->getResult() : false;
    }
    public function insert_new_zona($data)
    {
        $builder = $this->database->table('zonas');
        $builder->insert($data);
        $result = $this->database->affectedRows();
        $id = $this->database->insertID();
        return $result ? $id : false;
    }
    public function delete_zona($id)
    {
        $builder = $this->database->table('zonas');
        $builder->where('id', $id);
        return $builder->delete() ? true : false;
    }
    public function get_zona($id)
    {
        $builder = $this->database->table('zonas');
        $builder->select('*');
        $builder->where('id', $id);
        $query = $builder->get();
        return $query ? $query->getRow() : false;
    }
    public function update_zona($id, $data)
    {
        $builder = $this->database->table('zonas');
        $builder->where('id', $id);
        $builder->update($data);
        $result = $this->database->affectedRows();
        return $result > 0 ? true : false;
    }
    public function get_sms()
    {
        $builder = $this->database->table('smsconfig');
        $builder->select('*');
        $builder->where('id', 2);
        $query = $builder->get();
        return $query ? $query->getRow() : false;
    }
    public function update_sms($id, $data)
    {
        $builder = $this->database->table('smsconfig');
        $builder->where('id', $id);
        $builder->update($data);
        $result = $this->database->affectedRows();
        return $result > 0 ? true : false;
    }
    public function save_google($id, $data)
    {
        $builder = $this->database->table('tblconfiguration');
        $builder->where('id', $id);
        $builder->update($data);
        $result = $this->database->affectedRows();
        return $result > 0 ? true : false;
    }
    public function delete_sucursal($id)
    {
        $builder = $this->database->table('sucursal');
        $builder->where('id', $id);
        return $builder->delete() ? true : false;
    }
    public function delete_relacion_sucursal_nodo($id)
    {
        $builder = $this->database->table('tblsucursalesnodo');
        $builder->where('idsucursal', $id);
        return $builder->delete() ? true : false;
    }
}
