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
            $db->connect();
            self::$database = $db;
        }
        return self::$database;
    }

    private static $router = null;


    static function getRouter()
    {
        if (null === self::$router) {

            //создаем объект Router, передаем ему вышеуказанный массив и начинаем обработку запрса из адресной строки
            $router = new \Framework\Routing\Router();
            //указываем массив страниц с парой значений: url + подключатор запрашиваемой страницы (action)
            $routes = include "../app/config/routing.cfg.php";

            $router->setConfig($routes);
            self::$router = $router;
        }
        return self::$router;

    }

    private static $view = null;

    /**
     * @return \Framework\View\View
     */
    static function getView()
    {
        if (null === self::$view) {
            $view = new \Framework\View\View();
            $view->setTplPath("../app/views/");
            $view->addGlobals([
                    "footer_text" => "<hr> (c)2016",
                    "path" => function ($routeName, $params) {
                        return App::getRouter()->url($routeName, $params);
                    }
                ]
            );
            self::$view = $view;
        }
        return self::$view;

    }


}