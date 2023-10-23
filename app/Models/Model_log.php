<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_log extends Model
{
    /**
     * Instancia de la base de datos.
     *
     * @var object
     */
    var $database;

    /**
     * Constructor de la clase Model_log.
     */
    public function __construct()
    {
        $database = \Config\Database::connect('default');
        date_default_timezone_set('America/Mexico_City');
        $this->database = $database;
    }

    /**
     * Obtiene todos los registros de logs del sistema.
     *
     * @return mixed Retorna un objeto con los registros de logs o false si no se encuentran resultados.
     */
    public function get_all_log()
    {
        $builder = $this->database->table('logsistema');
        $builder->select('*');
        $builder->orderBy('id', "DESC");
        $query = $builder->get();
        if ($query != false) return $query->getResult();
        else return false;
    }

    /**
     * Obtiene todos los registros de logs del sistema relacionados con un cliente específico.
     *
     * @param int   $id     ID del cliente.
     * @param array $where  Condiciones adicionales.
     *
     * @return mixed Retorna un objeto con los registros de logs o false si no se encuentran resultados.
     */
    public function get_all_log_by_clientes($id, $where)
    {
        $builder = $this->database->table('logsistema l');
        $builder->select('l.*,lo.username,u.nombre nombrecliente');
        $builder->join("usuarios2 u", "u.id=l.idcliente");
        $builder->join("tblservicios t", "t.idcliente=l.idcliente");
        $builder->join("login lo", "l.operador=lo.id");
        $builder->where($where);
        $builder->where("l.idcliente", $id);
        $builder->orderBy('l.id', "DESC");
        $query = $builder->get();
        if ($query != false) return $query->getResult();
        else return false;
    }

    /**
     * Inserta un registro de log en la tabla de logs del sistema.
     *
     * @param int    $id_cliente ID del cliente.
     * @param string $tipo       Tipo de log.
     * @param string $log        Mensaje de log.
     * @param string $username   Nombre de usuario del operador.
     *
     * @return bool Devuelve true si la inserción fue exitosa, de lo contrario, false.
     */
    public  function insert_log($id_cliente, $tipo, $log, $username)
    {
        date_default_timezone_set('America/Mexico_City');
        $data = ['idcliente' => $id_cliente, 'log' => $log, 'operador' => $username, 'fechalog' => date("Y-m-d H:i:s"), 'tipo' => $tipo];
        $builder = $this->database->table('logsistema');
        $query = $builder->insert($data);

        if ($this->database->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Inserta un registro de log en la tabla de logs de acceso al sistema.
     *
     * @param int    $id    ID del administrador.
     * @param string $user  Nombre de usuario.
     * @param string $ip    Dirección IP.
     * @param string $error Detalles del acceso.
     *
     * @return bool Devuelve true si la inserción fue exitosa, de lo contrario, false.
     */
    public  function insert_log_login($id, $user, $ip, $error)
    {
        date_default_timezone_set('America/Mexico_City');
        $data = ['idadmin' => $id, 'fecha' => date("Y-m-d H:i:s"), 'ipadmin' => $ip, 'error' => $error];
        $builder = $this->database->table('loglogin');
        $query = $builder->insert($data);

        if ($this->database->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Obtiene el último ID de la tabla de cotizaciones.
     *
     * @return mixed Retorna el último ID o false si no se encuentra resultado.
     */
    function get_ultimo_id()
    {
        $builder = $this->database->table('cotizaciones');
        $builder->select("MAX(id) as ultimo");
        $query = $builder->get();
        if ($query != false) return $query->getRow();
        else return false;
    }

    /**
     * Obtiene el nombre de un cliente basado en su ID.
     *
     * @param int $id ID del cliente.
     *
     * @return mixed Retorna el nombre del cliente o false si no se encuentra resultado.
     */
    public function get_nombre_cliente($id)
    {
        $builder = $this->database->table('usuarios2');
        $builder->select('nombre');
        $builder->where('id', $id);
        $query = $builder->get();
        return $query ? $query->getResult() : false;
    }

    /**
     * Obtiene registros de logs del sistema en un rango de fechas dado.
     *
     * @param string $inico Fecha de inicio (formato: 'Y-m-d' o 'd-m-Y').
     * @param string $final Fecha de fin (formato: 'Y-m-d' o 'd-m-Y').
     *
     * @return mixed Retorna un objeto con los registros de logs o false si no se encuentran resultados.
     */
    public function get_log_date(String $inico, String $final)
    {
        if (strpos($inico, '/')) {
            $inico = str_replace('/', '-', $inico);
            $final = str_replace('/', '-', $final);
            $inico = date('Y-m-d', strtotime($inico));
            $final = date('Y-m-d', strtotime($final));
        }
        $builder = $this->database->table('logsistema l');
        $builder->select('l.fechalog fecha,l.log,o.nombre operador,u.nombre cliente');
        $builder->join('usuarios2 u', 'l.idcliente=u.id', 'left');
        $builder->join('login o', 'l.operador=o.id', 'left');
        $builder->where("fechalog BETWEEN '$inico' AND '$final'");
        $builder->where("l.tipolog<>", "1");
        $builder->orderBy('fechalog DESC');
        $query = $builder->get();
        return $query ? $query->getResult() : false;
    }

    /**
     * Obtiene registros de logs de acceso al sistema en un rango de fechas dado.
     *
     * @param string $inico Fecha de inicio (formato: 'Y-m-d' o 'd-m-Y').
     * @param string $final Fecha de fin (formato: 'Y-m-d' o 'd-m-Y').
     *
     * @return mixed Retorna un objeto con los registros de logs o false si no se encuentran resultados.
     */
    public function get_log_acceso(String $inico, String $final)
    {
        if (strpos($inico, '/')) {
            $inico = str_replace('/', '-', $inico);
            $final = str_replace('/', '-', $final);
            $inico = date('Y-m-d', strtotime($inico));
            $final = date('Y-m-d', strtotime($final));
        }
        $builder = $this->database->table('loglogin l');
        $builder->select('o.nombre operador,l.fecha,l.error detalle,l.ipadmin ip');
        $builder->join('login o', 'o.id=l.idadmin', 'left');
        $builder->where("l.fecha BETWEEN '$inico' AND '$final'");
        $builder->orderBy('l.id DESC');
        $query = $builder->get();
        return $query ? $query->getResult() : false;
    }
}
