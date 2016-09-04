<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 04.09.2016
 * Time: 14:32
 */

namespace Controllers;


class SystemController
{
    function setRouter($router)
    {
        $this->router = $router;
    }

    function infoAction()
    {
        phpinfo();
    }

    function error404Action()
    {
        echo "<h1>404</h1>";
    }
}