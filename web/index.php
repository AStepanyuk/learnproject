<?php

error_reporting(E_ALL);

header("Content-type: text/html; charset=utf-8");

function requestVar($key, $default = null)
{
    if (isset($_GET[$key])) {
        return $_GET[$key];
    } else {
        return $default;
    }
}

function loadClassFile($name)
{
    $name = str_replace('\\', '/', $name);

    $file = "../src/" . $name . ".php";

    if (file_exists($file)) {
        require_once $file;
    }
}

spl_autoload_register('loadClassFile');


$routes = include "../app/config/routing.cfg.php";

$router = new \Framework\Routing\Router();
$router->setConfig($routes);

$router->start();






