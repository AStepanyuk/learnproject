<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 04.09.2016
 * Time: 14:32
 */

namespace Controllers;

//системный контроллер с результатом запрашиваемой страницы
class SystemController
{


    function infoAction()
    {
        phpinfo();
    }

    function error404Action()
    {
        echo "<h1>404</h1>";
    }
}