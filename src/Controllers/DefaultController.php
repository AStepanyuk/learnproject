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

        include "../app/views/home.html.php";
    }

    function contactAction()
    {
        include "../app/views/contacts.html.php";
    }

    function aboutAction()
    {
        include "../app/views/about.html.php";
    }

}