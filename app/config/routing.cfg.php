<?php

//массив страниц с парой значений: url + подключатор запрашиваемой страницы (action)
return [
    'page_home' => [
        'action' => 'default:home',
        'url' => ''
    ],
    'page_about' => [
        'action' => 'default:about',
        'url' => 'proNas'
    ],
    'page_portfolio' => [
        'action' => 'default:portfolio',
        'url' => 'portfolio'
    ],    'page_portfolio_show' => [
        'action' => 'default:portfolioShow',
        'url' => 'portfolio/Show'
    ],
    'page_info' => [
        'action' => 'system:info',
        'url' => 'info'
    ],
    'page_contacts' => [
        'action' => 'default:contact',
        'url' => 'contacts/info'
    ],
    'page_404' => [
        'action' => 'system:error404',
        'url' => '404'
    ],
];