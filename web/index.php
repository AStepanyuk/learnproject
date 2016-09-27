<?php

//включаем вывод всех ошибок
error_reporting(E_ALL);

//для корректного отображения содержимого + utf-8
header("Content-type: text/html; charset=utf-8");

//определение введеного запроса в адресную строку
function requestVar($key, $default = null)
{
    if (isset($_GET[$key])) {
        return $_GET[$key];
    } else {
        return $default;
    }
}

//подключение контроллеров
function loadClassFile($name)
{
    $name = str_replace('\\', '/', $name);

    $file = "../src/" . $name . ".php";

    if (file_exists($file)) {
        require_once $file;
    }
}

//регистрация функции загрузчика
spl_autoload_register('loadClassFile');

//указываем массив страниц с парой значений: url + подключатор запрашиваемой страницы (action)
$routes = include "../app/config/routing.cfg.php";

//создаем класс Router, передаем ему вышеуказанный массив и начинаем обработку запрса из адресной строки
$router = new \Framework\Routing\Router();
$router->setConfig($routes);
$router->start();






