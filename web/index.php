<?php

//включаем вывод всех ошибок
error_reporting(E_ALL);

//для корректного отображения содержимого + utf-8
header("Content-type: text/html; charset=utf-8");

//объява ф-ции для упрощения полуения параметра из адр.стр.
function requestVar($key, $default = null)
{
    if (isset($_GET[$key])) {
        return $_GET[$key];
    } else {
        return $default;
    }
}

//ф-ция для подключение файлов по имени класса
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



App::getRouter()->start();






