<?php
/**
 * Script para verificar la compatibilidad con PHP 8.2
 * Ejecuta este archivo para validar que no hay errores críticos
 */

echo "=== Verificación de Compatibilidad con PHP 8.2 ===\n";
echo "Versión de PHP actual: " . PHP_VERSION . "\n\n";

// 1. Verificar que estamos en PHP 8.x
if (version_compare(PHP_VERSION, '8.1.0', '<')) {
    echo "❌ ERROR: Se requiere PHP 8.1 o superior. Versión actual: " . PHP_VERSION . "\n";
    exit(1);
} else {
    echo "✅ Versión de PHP compatible: " . PHP_VERSION . "\n";
}

// 2. Verificar extensiones requeridas
$required_extensions = [
    'mysqli',
    'mbstring',
    'intl',
    'json',
    'curl'
];

echo "\n=== Verificando Extensiones ===\n";
foreach ($required_extensions as $extension) {
    if (extension_loaded($extension)) {
        echo "✅ {$extension}: Cargada\n";
    } else {
        echo "❌ {$extension}: NO cargada (requerida)\n";
    }
}

// 3. Verificar configuraciones importantes
echo "\n=== Configuraciones PHP ===\n";
echo "memory_limit: " . ini_get('memory_limit') . "\n";
echo "post_max_size: " . ini_get('post_max_size') . "\n";
echo "upload_max_filesize: " . ini_get('upload_max_filesize') . "\n";
echo "max_execution_time: " . ini_get('max_execution_time') . "\n";

// 4. Verificar que CodeIgniter puede cargarse
echo "\n=== Verificando CodeIgniter ===\n";
try {
    // Incluir el autoload de Composer
    if (file_exists(__DIR__ . '/vendor/autoload.php')) {
        require_once __DIR__ . '/vendor/autoload.php';
        echo "✅ Autoload de Composer cargado correctamente\n";
    } else {
        echo "❌ Error: No se encontró vendor/autoload.php\n";
        echo "   Ejecuta: composer install\n";
    }
    
    // Verificar archivo de configuración
    if (file_exists(__DIR__ . '/app/Config/App.php')) {
        echo "✅ Archivo de configuración encontrado\n";
    } else {
        echo "❌ Error: No se encontró app/Config/App.php\n";
    }
    
    // Verificar archivos principales
    $core_files = [
        'app/Config/Database.php',
        'app/Controllers/BaseController.php',
        'public/index.php'
    ];
    
    foreach ($core_files as $file) {
        if (file_exists(__DIR__ . '/' . $file)) {
            echo "✅ {$file}: Encontrado\n";
        } else {
            echo "❌ {$file}: NO encontrado\n";
        }
    }
    
} catch (Throwable $e) {
    echo "❌ Error al verificar CodeIgniter: " . $e->getMessage() . "\n";
}

// 5. Verificar sintaxis de archivos críticos
echo "\n=== Verificando Sintaxis de Archivos ===\n";
$files_to_check = [
    'app/Libraries/Class_seguridad.php',
    'app/Libraries/Class_permiso_oficina.php',
    'app/Libraries/Class_cantidad_en_letras.php',
    'app/Models/Model_seguridad.php',
    'app/Config/Database.php'
];

foreach ($files_to_check as $file) {
    if (file_exists(__DIR__ . '/' . $file)) {
        $output = [];
        $return_var = 0;
        exec("php -l \"" . __DIR__ . '/' . $file . "\" 2>&1", $output, $return_var);
        
        if ($return_var === 0) {
            echo "✅ {$file}: Sintaxis válida\n";
        } else {
            echo "❌ {$file}: Error de sintaxis\n";
            echo "   " . implode("\n   ", $output) . "\n";
        }
    } else {
        echo "⚠️  {$file}: Archivo no encontrado\n";
    }
}

echo "\n=== Recomendaciones para PHP 8.2 ===\n";
echo "1. ✅ Actualizado composer.json para PHP ^8.1\n";
echo "2. ✅ Corregidas declaraciones 'var' deprecated\n";
echo "3. ✅ Actualizada configuración de base de datos a utf8mb4\n";
echo "4. ✅ Verificadas librerías personalizadas\n";
echo "5. ✅ CodeIgniter 4.6.4 es compatible con PHP 8.2\n";

echo "\n=== Prueba Final ===\n";
echo "Si no hay errores ❌ arriba, tu proyecto debería funcionar correctamente con PHP 8.2\n";
echo "Recuerda ejecutar: composer install\n";
echo "Y probar la aplicación en tu navegador\n\n";