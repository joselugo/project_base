<?php

namespace App\Controllers;

class Debug extends BaseController
{
    public function session()
    {
        if ($this->isLoggedIn()) {
            echo "<h2>Session Debug</h2>";
            echo "<h3>All Session Data:</h3>";
            echo "<pre>";
            var_dump(session()->get());
            echo "</pre>";
            
            echo "<h3>Specific Variables:</h3>";
            echo "iduser19: " . (session()->has('iduser19') ? session('iduser19') : 'NOT SET') . "<br>";
            echo "token19: " . (session()->has('token19') ? session('token19') : 'NOT SET') . "<br>";
            echo "id_usuario8291: " . (session()->has('id_usuario8291') ? session('id_usuario8291') : 'NOT SET') . "<br>";
            echo "nombre: " . (session()->has('nombre') ? session('nombre') : 'NOT SET') . "<br>";
            echo "sucursales: " . (session()->has('sucursales') ? session('sucursales') : 'NOT SET') . "<br>";
        } else {
            echo "<h2>No session found</h2>";
            echo "User not logged in or session expired.";
        }
    }
}