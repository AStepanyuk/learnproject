<?php

$current_rout_name = $this->router->getCurrentRouteName();

$menu = [
    "page_home" => ['caption' => "Главная",],
    "page_contacts" => ['caption' => "Контакты",],
    "page_about" => ['caption' => "О нас",],
    "page_info" => ['caption' => "О php", 'blank' => true],
];

?>

<div class="menu">
    <?php foreach ($menu as $route_name => $menuItem) { ?>
        <?php
        $href = $this->router->url($route_name);
        $caption = $menuItem ['caption'];
        $blank = isset ($menuItem['blank']) && $menuItem ['blank'];
        $class = '';
        if ($route_name == $current_rout_name) {
            $class = 'current';
        }
        ?>

        <a
            class="<?php echo $class ?>"
            href="<?php echo $href ?>"
            <?php if ($blank) { echo "target='_blank'";} ?>
        >
            <?php echo $caption; ?>
        </a>
    <?php } ?>

</div>