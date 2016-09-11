<?php

$current_rout_name = $this->router->getCurrentRouteName();

$menu = [
    "page_home" => ['caption' => "Главная", 'icon'=> 'home'],
    "page_contacts" => ['caption' => "Контакты",],
    "page_about" => ['caption' => "О нас",],
    "page_info" => ['caption' => "О php", 'blank' => true, 'icon' => 'info-circle'],
];

?>

<div class="menu">
    <?php foreach ($menu as $route_name => $menuItem) { ?>
        <?php
        $href = $this->router->url($route_name);
        $caption = $menuItem ['caption'];
        $blank = isset ($menuItem['blank']) && $menuItem ['blank'];

        $class = ($route_name == $current_rout_name)?"current":'';
        $icon = (isset ($menuItem['icon'])) ? $menuItem['icon'] : false;

        ?>

        <a
            class="<?php echo $class ?>"
            href="<?php echo $href ?>"
            <?php if ($blank) { echo "target='_blank'";} ?>
        >
            <?php if ($icon){?>
            <i class="fa fa-<?php echo $icon?>" aria-hidden="true"></i>
            <?php } ?>
            <?php echo $caption; ?>
        </a>
    <?php } ?>

</div>