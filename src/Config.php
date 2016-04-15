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

    /**
     * Config singleton
     * @var array
     */
    private static $config;

    public static function get($key)
    {
        if (!self::$config) {
            self::$config = require(__DIR__ . '/../../../../src/config.php');
        }

        if (!isset(self::$config[$key])) {
            throw new ConfigParameterNotFound;
        }

        return self::$config[$key] ;
    }
}
