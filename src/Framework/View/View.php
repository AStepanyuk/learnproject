<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 14.10.2016
 * Time: 17:03
 */

namespace Framework\View;


class View
{
    private $tplPath = "../app/views/";
    protected $globals = [];

    public function render($tamplate, $parameters = [])
    {
        extract(array_merge($this->globals, $parameters));

        include $this->fullPath($tamplate);
    }

    private function fullPath($tamplate)
    {
        return $this->tplPath . $tamplate;
    }

    public function setTplPath($string)
    {
        $this->tplPath = $string;
    }

    public function addGlobals(array $array =[])
    {
        $this->globals = array_merge($this->globals, $array);
    }
}