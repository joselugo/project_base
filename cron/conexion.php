<?php
function conectar()
{
  $credencial = credencial();
  $conexion = mysqli_connect($credencial['server'], $credencial['user'], $credencial['password'], $credencial['database'] );
  if ($conexion->connect_error) {
    die($conexion->connect_error);
  } else {
    return $conexion;
  }
  return $conexion;
}



function credencial(){
$data['user'] = "root";
$data['password'] = "JoseLugo19";
$data['server']= "localhost";
$data['database'] = "escolar";

return $data;
}
