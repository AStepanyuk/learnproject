<?php

$current_rout_name = $this->router->getCurrentRouteName();

$menu = [
    "page_home" => ['caption' => "Главная", 'icon'=> 'home'],
    "page_contacts" => ['caption' => "Контакты",],
    "page_portfolio" => ['caption' => "Портфолио",],
    "page_about" => ['caption' => "О нас", 'blank' => false],
    "page_info" => ['caption' => "О php", 'blank' => true, 'icon' => 'info-circle'],
];

?>

<div class="menu">
    <?php foreach ($menu as $route_name => $menuItemConfig) { ?>
        <?php include "menu_item.html.php" ?>
    <?php } ?>

</div>