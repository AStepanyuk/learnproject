<?php
use Framework\Database\Database;

/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 14.10.2016
 * Time: 15:14
 */
class App
{
    private static $database = null;

    /**
     * @return Database
     */
    static function getDatabase()
    {
        if (null === self::$database) {
            $db = new Database();

            $dbConfigs = include '../app/config/database.cfg.php';
            $db->setConfig($dbConfigs);
            $db->connect("learn_project");
            self::$database = $db;
        }
        return self::$database;
    }
}