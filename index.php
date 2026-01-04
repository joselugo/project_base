<?php

use CodeIgniter\CodeIgniter;

/*
 *---------------------------------------------------------------
 * CHECK PHP VERSION
 *---------------------------------------------------------------
 */

$minPHPVersion = '8.1';
if (phpversion() < $minPHPVersion) {
    die("Your PHP version must be {$minPHPVersion} or higher to run CodeIgniter. Current version: " . phpversion());
}
unset($minPHPVersion);

/*
 *---------------------------------------------------------------
 * SET THE CURRENT DIRECTORY
 *---------------------------------------------------------------
 */

// Path to the front controller (this file)
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Ensure the current directory is pointing to the front controller's directory
chdir(__DIR__);

/*
 *---------------------------------------------------------------
 * DEFINE APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 */

// Load environment variables from .env file
if (is_file(FCPATH . '.env')) {
    $env = parse_ini_file(FCPATH . '.env');
    if (isset($env['CI_ENVIRONMENT'])) {
        define('ENVIRONMENT', $env['CI_ENVIRONMENT']);
    } else {
        define('ENVIRONMENT', 'development');
    }
} else {
    define('ENVIRONMENT', 'development');
}

/*
 *---------------------------------------------------------------
 * LOAD OUR PATHS CONFIG FILE
 *---------------------------------------------------------------
 */

$pathsPath = FCPATH . 'app' . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'Paths.php';
require realpath($pathsPath) ?: $pathsPath;

$paths = new Config\Paths();

// Define path constants
define('APPPATH', realpath($paths->appDirectory) . DIRECTORY_SEPARATOR);
define('SYSTEMPATH', realpath($paths->systemDirectory) . DIRECTORY_SEPARATOR);
define('ROOTPATH', realpath(FCPATH) . DIRECTORY_SEPARATOR);
define('WRITEPATH', realpath($paths->writableDirectory) . DIRECTORY_SEPARATOR);

/*
 *---------------------------------------------------------------
 * LOAD COMPOSER AUTOLOADER
 *---------------------------------------------------------------
 */

require_once ROOTPATH . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

/*
 *---------------------------------------------------------------
 * LOAD CONSTANTS AND FRAMEWORK
 *---------------------------------------------------------------
 */

// Load app constants
if (is_file(APPPATH . 'Config' . DIRECTORY_SEPARATOR . 'Constants.php')) {
    require_once APPPATH . 'Config' . DIRECTORY_SEPARATOR . 'Constants.php';
}

// Load system functions
require_once SYSTEMPATH . 'Common.php';

// Load our autoloader and register it
require_once SYSTEMPATH . 'Config' . DIRECTORY_SEPARATOR . 'AutoloadConfig.php';
require_once APPPATH . 'Config' . DIRECTORY_SEPARATOR . 'Autoload.php';
require_once APPPATH . 'Config' . DIRECTORY_SEPARATOR . 'Modules.php';

$loader = \CodeIgniter\Config\Services::autoloader();
$loader->initialize(new \Config\Autoload(), new \Config\Modules());
$loader->register();

/*
 *---------------------------------------------------------------
 * LAUNCH THE APPLICATION
 *---------------------------------------------------------------
 */

$app = new CodeIgniter(new Config\App());
$app->initialize();
$context = is_cli() ? 'php-cli' : 'web';
$app->setContext($context);

$app->run();
