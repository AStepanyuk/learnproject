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
        $connect = mysqli_connect("localhost", "root", "", "learn_project") or die ("Не удалось соединиться с базой данных");

        $sql = "SELECT * FROM `portfolio_items` where `is_visible` = 1";
        $result = mysqli_query($connect, $sql);

        $portfolios =[];

        while ( $row = mysqli_fetch_assoc($result)){
            //var_dump( $row);
            $portfolios[] = $row;
        }

        include "../app/views/portfolio.html.php";
    }

    function portfolioShowAction(){
        $id = requestVar('id');

        $connect = mysqli_connect("localhost", "root", "", "learn_project") or die ("Не удалось соединиться с базой данных");

        $sql = "SELECT * FROM `portfolio_items` where `id` = $id";
        $result = mysqli_query($connect, $sql);

        $portfolio = mysqli_fetch_assoc($result);

        include "../app/views/portfolio_show.html.php";
    }

    function portfolioTestAction()
    {
        $portfolios =[
            [
                'id'=>1,
                'name'=>"Первый",
                'description'=>"Новый проект",
                'image'=>"http://lorempixel.com/400/200"
            ],
            [
                'id'=>2,
                'name'=>"Второй",
                'description'=>"loremPixel",
                'image'=>"http://lorempixel.com/400/200/sports/1"
            ],
        ];
        include "../app/views/portfolio.html.php";
    }
}