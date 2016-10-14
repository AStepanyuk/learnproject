<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 04.09.2016
 * Time: 14:17
 */

namespace Controllers;

//дефолтный контроллер с подключатором запрашиваемой страницы (action)

use Framework\View\View;
use Model\PortfolioStorage;

class DefaultController
{


    function homeAction()
    {
        \App::getView()->render("home.html.php");
    }

    function contactAction()
    {
        \App::getView()->render("contacts.html.php");
    }

    function aboutAction()
    {
        \App::getView()->render("about.html.php");
    }

    function portfolioAction()
    {
        $portfolioStorage = new PortfolioStorage();

        $portfolios = $portfolioStorage->getAllVisible();

        \App::getView()->render("portfolio.html.php", [
            "porfolio"=> $portfolios]);
    }


    function portfolioShowAction()
    {
        $id = requestVar('id');
        $portfolioStorage = new PortfolioStorage();
        $portfolio = $portfolioStorage->getById($id);


        \App::getView()->render("portfolio_show.html.php", [
            "portfolio" => $portfolio,
        ]);
    }


}