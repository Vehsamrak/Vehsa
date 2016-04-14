<?php

namespace Vehsamrak\Vehsa;

use Vehsamrak\Vehsa\Exception\ConfigParameterNotFound;

/**
 * Application configuration
 * Usage: Vehsamrak\Vehsa\Config::get('database_type');
 * @author Vehsamrak
 */
class Config
{

    public static function get($key)
    {
        $config = require(__DIR__ . '/../../../../src/config.php');

        if (!isset($config[$key])) {
        	throw new ConfigParameterNotFound;
        }

        return $config[$key] ;
    }
}
