<?php

$class = ($route_name == $current_rout_name) ? "current" : '';
$icon = (isset ($menuItemConfig['icon'])) ? $menuItemConfig['icon'] : false;

$menuItem = new \Helpers\ViewHelpers\MenuItem();
$menuItem->setCaption($menuItemConfig ['caption'])
    ->setHref($this->router->url($route_name))
    ->setIcon($icon)
    ->setClass($class);

if (!empty ($menuItemConfig['blank'])){
    $menuItem->setBlank();
}

?>

<a
    <?php echo $menuItem->getAllAttributes() ?>
>
    <?php echo $menuItem->getFullCaption() ?>
</a>

