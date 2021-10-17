<?php declare(strict_types = 1);
/**
 * Bootstrapping for namespace \P7DataStructure
 *
 * @package P7DataStructure
 * @author Sven Schrodt<sven@schrodt-service.net>
 * @link https://github.com/svenschrodt/P7DataStructure
 * @version 0.1
 * @since 2020-10-17
 */


// Enabling full error reporting for dev environment -->
//@TODO environment check
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

define('P7DS_APP_NS', '\\P7DataStructure');
define('P7DS_APP_LIB_DIR', 'P7DataStructure');
define('P7DS_FILE_NOT_FOUND', 'Not found a file called: ');

/**
 * Auto loading for project classes
 */
spl_autoload_register(function ($className) {

    // Check if namespace of class to be instantiated is belonging to us (P7UnitCheck)
    if (substr($className, 0, strlen(P7DS_APP_LIB_DIR)) === P7DS_APP_LIB_DIR) {
        $file = 'src/' . str_replace('\\', '/', $className) . '.php';
        // Check if destination class file exists
        if (file_exists($file)) {

            // including class file once
            require_once $file;
        } else { // throw exception, if not
            throw new \ErrorException(P7DS_FILE_NOT_FOUND .  "{$file} \n class: {$className}");
        }
    }

});