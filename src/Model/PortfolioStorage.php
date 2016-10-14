<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 14.10.2016
 * Time: 16:20
 */

namespace Model;


class PortfolioStorage
{

    public function getAllVisible()
    {
        $db = \App::getDatabase();

        $sql = "SELECT * FROM `portfolio_items` where `is_visible` = 1";
        $result = $db->query($sql);

        $portfolios = $db->getAllRows($result);
        return $portfolios;

    }

    public function getById($id)
    {

        $db = \App::getDatabase();

        $sql = "SELECT * FROM `portfolio_items` where `id` = $id";
        $result = $db->query($sql);

        return $db->getOneRow($result);

    }
}