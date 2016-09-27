<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 24.09.2016
 * Time: 13:19
 */

namespace Helpers\ViewHelpers;


class MenuItem
{
    protected $caption;
    protected $href;
    protected $target;
    protected $icon;
    protected $class;

    /**
     * @return mixed
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param mixed $caption
     * @return MenuItem
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param mixed $href
     * @return MenuItem
     */
    public function setHref($href)
    {
        $this->href = $href;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @param mixed $target
     * @return MenuItem
     */
    public function setTarget($target)
    {
        $this->target = $target;
        return $this;
    }

    public function setBlank(){
        $this->setTarget("_blank");
    }

    /**
     * @return mixed
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param mixed $icon
     * @return MenuItem
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param mixed $class
     * @return MenuItem
     */
    public function setClass($class)
    {
        $this->class = $class;
        return $this;
    }

    public function getIconTag()
    {
     if ($this->icon) {
         return "<i class=\"fa fa-" . $this->icon . " \"></i>";
     }else {
         return "";
     }
    }

    public function getAttributeString($attr, $canBeEmpty = false){
        $value = empty($this->$attr) ? "" : $this->$attr;

        if (!empty($this->$attr) || $canBeEmpty){
            return $attr . "=\"" . $value . "\"";
        }

    }


    public function getHrefAttribute()
    {
        return $this->getAttributeString("href", true);
    }

    public function getClassAtribute()
    {
        return $this->getAttributeString("class");
    }

    public function getTargetAttribute()
    {
        return $this->getAttributeString("target");
    }

    public function getFullCaption (){
        return $this->getIconTag() . " " . htmlspecialchars($this->getCaption());
    }

    public function getAllAttributes(){
        return $this->getClassAtribute() . " " . $this->getHrefAttribute() . " " . $this->getTargetAttribute();
    }
}