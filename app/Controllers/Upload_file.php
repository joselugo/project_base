<?php

namespace App\Controllers;

class Upload_file extends BaseController
{
    /**
     * Este método se encarga de procesar la carga de imágenes al servidor.
     *
     * @param string $ruta   La ruta donde se guardarán las imágenes cargadas.
     * @param string|null $current El nombre de archivo actual (si existe).
     *
     * @return string Una cadena que contiene los nombres de archivo procesados, separados por comas.
     */
    public function add_imagen($ruta, $current = null)
    {
        $path = $ruta; // Ruta de destino para las imágenes
        $file_name = ""; // Variable para almacenar los nombres de archivo

        if (isset($_FILES['photo']['name'])) {
            // Contar la cantidad de archivos cargados
            $count_files = count($_FILES['photo']['name']);

            // Iterar a través de los archivos
            for ($key = 0; $key < $count_files; $key++) {
                // Comprobar si el archivo está seleccionado
                if (isset($_FILES['photo']['name'][$key]) && $_FILES['photo']['size'][$key] > 0) {
                    $name_origen = $_FILES['photo']['name'][$key]; // Nombre original del archivo
                    $extension = pathinfo($name_origen, PATHINFO_EXTENSION); // Extensión del archivo
                    $random_name = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10); // Nombre aleatorio para el archivo
                    $file_name .= $random_name . '.' . $extension . ","; // Concatenar el nombre del archivo a la lista

                    $send_to = $path . $random_name . '.' . $extension; // Ruta completa de destino para el archivo
                    $tmp  = $_FILES['photo']['tmp_name'][$key]; // Ruta temporal del archivo cargado

                    // Verificar si el directorio de destino existe
                    if (is_dir($path)) {
                        move_uploaded_file($tmp, $send_to); // Mover el archivo al directorio de destino
                    } else {
                        mkdir($path, 0777, true); // Crear el directorio si no existe
                        move_uploaded_file($tmp, $send_to); // Mover el archivo al directorio de destino
                    }
                }
            }
            return rtrim($file_name, ","); // Eliminar la última coma y devolver los nombres de archivo
        } else {
            return $file_name = $current; // Si no se encontraron archivos para cargar, devolver el valor actual
        }
    }
}
