<?php

//определяем признака текущейстраницы
$class = ($route_name == $current_rout_name) ? "current" : '';

//получение иконки если она задана
$icon = (isset ($menuItemConfig['icon'])) ? $menuItemConfig['icon'] : false;

//создание объекта ПункМеню
$menuItem = new \Helpers\ViewHelpers\MenuItem();

//установка объекту соответствующие свойства
$menuItem->setCaption($menuItemConfig ['caption'])
    ->setHref($this->router->url($route_name))
    ->setIcon($icon)
    ->setClass($class);

//
if (!empty ($menuItemConfig['blank'])){
    $menuItem->setBlank();
}
//полсе выводим ссылку необходимые атрибутами
?>

<a
    <?php echo $menuItem->getAllAttributes() ?>
>
    <?php echo $menuItem->getFullCaption() ?>
</a>

