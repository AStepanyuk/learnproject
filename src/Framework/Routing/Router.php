<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 04.09.2016
 * Time: 16:50
 */

namespace Framework\Routing;

use \Exception;


class Router
{
//объявление защищенных свойств класса
    protected $routes;
    protected $currentRouteName;
    protected $currentRoute;

//обработка запрса из адресной строки

    /**
     *
     */
    public function start()
    {
        $uri = ltrim ($_SERVER["REQUEST_URI"],'/');
        $questPos = strpos($uri, '?');
        if (false !== $questPos){
            $uri = substr($uri,0,$questPos);
        }
        $uri = urldecode($uri);

        foreach ($this->routes as $name => $route) {
            if ($route['url'] == $uri) {
                $matchedRoute = $route;
                $this->currentRoute = $route;
                $this->currentRouteName = $name;
                break;
            }
        }

        if (isset($matchedRoute)) {
            $this->runAction($matchedRoute['action']);
        } else {
            $this->runAction('system:error404');
        }
    }

//определение подключатора запрашиваемой страницы (action)

    /**
     * @param $actionString string короткий синтаксис для экшина в формате "controller:action"
     * @return mixed результат выполнение экшина
     * @throws Exception выбрасывает исключениеесли неправильный формат экшина или экшн не существует
     */
    function runAction($actionString)
    {
        $parts = explode(':', $actionString);
        if (count($parts) != 2) {
            throw new Exception('actionString parse error "' . $actionString . '"');
        }
        $controllerName = $parts[0];
        $actionName = $parts[1];

        $controller = $this->getController($controllerName);
        if (null === $controller) {
            throw new Exception('Controller "' . $controllerName . '" not exist');
        }
        $actionMethod = $actionName . 'Action';

        if (!method_exists($controller, $actionMethod)) {
            throw new Exception('method "' . $actionMethod . '" not found in "' . get_class($controller));
        }
        return $controller->$actionMethod();
    }

//определение контроллера
    function getController($shortName)
    {
        $className = '\\Controllers\\' . ucfirst($shortName) . 'Controller';
        if (class_exists($className)) {
            $controller = new $className();
            //$controller->setRouter($this);
            return $controller;
        }
        return null;
    }

//прием массива страниц с парой значений: url + подключатор запрашиваемой страницы (action)
    public function setConfig($routes)
    {
        $this->routes = $routes;
    }

//определение и проверка url
    function url($routeName, $params=[])
    {
        if (!isset($this->routes[$routeName])) {
            throw new Exception('can not generate URL for route "' . $routeName . '". Route not exist');
        }
        $route = $this->routes[$routeName];

        $paramString = http_build_query($params);

        $url =  '/' . $route['url'];
        if ($paramString){
            $url= $url . '?'.$paramString;
        }
        return $url;

    }

//определение текущей страницы
    function getCurrentRouteName()
    {
        return $this->currentRouteName;
    }
}