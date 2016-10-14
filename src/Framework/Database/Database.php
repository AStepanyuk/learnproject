<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 14.10.2016
 * Time: 14:03
 */

namespace Framework\Database;


class Database
{
    private $connection = null;

    protected $config = [
        "db_name" => null,
        "db_host" => "localhost",
        "db_user" => "root",
        "db_pass" => "",
    ];

    /**
     * @param array $config
     */
    public function setConfig(array $config)
    {
        $this->config = array_merge($config);
    }

    static $instanse = null;

    /**
     * @return Database
     */
    static function getInstanse()
    {
        if (null === self::$instanse){
            self::$instanse = new Database();
        }
        return self::$instanse;
    }

    function connect()
    {
        $this->connection = mysqli_connect(
            $this->config["db_host"],
            $this->config["db_user"],
            $this->config["db_pass"],
            $this->config["db_name"])
        or die ("Не удалось соединиться с базой данных");

    }

    /**
     * @return null
     */
    public function getConnection()
    {
        return $this->connection;
    }

    public function query($sql)
    {
        $result = mysqli_query($this->connection, $sql);
        return $result;
    }

    public function getAllRows($result)
    {
        $rows = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getOneRow($result)
    {
        return mysqli_fetch_assoc($result);
    }


}