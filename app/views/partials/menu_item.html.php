<?php

//оипределение параметра текущейстраницы
$class = ($route_name == $current_rout_name) ? "current" : '';

//определение заданости параметра иконки
$icon = (isset ($menuItemConfig['icon'])) ? $menuItemConfig['icon'] : false;

//создание класса ПункМеню
$menuItem = new \Helpers\ViewHelpers\MenuItem();

//задание своствам класса соответствующих параметров
$menuItem->setCaption($menuItemConfig ['caption'])
    ->setHref($this->router->url($route_name))
    ->setIcon($icon)
    ->setClass($class);

//
if (!empty ($menuItemConfig['blank'])){
    $menuItem->setBlank();
}
//посе выводим атрибуты необходимые для ссылки
?>

<a
    <?php echo $menuItem->getAllAttributes() ?>
>
    <?php echo $menuItem->getFullCaption() ?>
</a>

