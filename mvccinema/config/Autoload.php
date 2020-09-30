<?php

/**
 * Class Autoloader
 */
class Autoloader
{

    /**
     * Enregistre notre autoloader
     */
    public static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    public static function autoload($class)
    {
        if (file_exists(_MODEL_ . 'bo/' . $class . '.php')) {
            require _MODEL_ . 'bo/' . $class . '.php';
        }
        if (file_exists(_MODEL_ . 'dal/' . $class . '.php')) {
            require _MODEL_ . 'dal/' . $class . '.php';
        }
    }
}

// Load Twig autoloader
require_once './view/web/tools/vendor/autoload.php';
