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
        $contactUrl = $this->router->url('page_contacts');
        include "../app/views/home.html.php";
    }

    function contactAction()
    {
        $homeHref = $this->router->url('page_home');
        include "../app/views/contacts.html.php";
    }
}