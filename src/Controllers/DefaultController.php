<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 04.09.2016
 * Time: 14:17
 */

namespace Controllers;

//дефолтный контроллер с подключатором запрашиваемой страницы (action)

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

    function portfolioAction()
    {
        $db = \App::getDatabase();
        $db->connect("learn_project");

        $sql = "SELECT * FROM `portfolio_items` where `is_visible` = 1";
        $result = $db->query($sql);

        $portfolios = $db->getAllRows($result);

        include "../app/views/portfolio.html.php";
    }

    function portfolioShowAction()
    {
        $id = requestVar('id');

        $db = \App::getDatabase();

        $sql = "SELECT * FROM `portfolio_items` where `id` = $id";
        $result = $db->query($sql);

        $portfolio = $db->getOneRow($result);


        include "../app/views/portfolio_show.html.php";
    }


}