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

    protected $routes;

    public function start()
    {

        $p = requestVar("p", "");

        foreach ($this->routes as $name => $route) {
            if ($route['url'] == $p) {
                $matchedRoute = $route;
                break;
            }
        }

        if (isset($matchedRoute)) {
            $this->runAction($matchedRoute['action']);
        } else {
            $this->runAction('system:error404');
        }

    }

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

    function getController($shortName)
    {
        $className = '\\Controllers\\' . ucfirst($shortName) . 'Controller';
        if (class_exists($className)) {
            $controller = new $className();
            $controller->setRouter($this);
            return $controller;
        }
        return null;
    }

    public function setConfig($routes)
    {
        $this->routes = $routes;
    }

    function url($routeName)
    {
        if (!isset($this->routes[$routeName])) {
            throw new Exception('can not generate URL for route "' . $routeName . '". Route not exist');
        }
        $route = $this->routes[$routeName];

        return '/?p='.$route['url'];

    }
}