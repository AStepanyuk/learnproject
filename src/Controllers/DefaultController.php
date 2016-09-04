<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 04.09.2016
 * Time: 14:17
 */

namespace Controllers;


class DefaultController
{
    function setRouter($router)
    {
        $this->router = $router;
    }

    function homeAction()
    {
        echo "Главная";
    }

    function contactAction()
    {
        echo "Контакты";
        $homeHref = $this->router->url('page_home');
        echo " <a href='{$homeHref}'>На главную</a>";
    }
}