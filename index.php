<?php
require_once 'functions.php';
require_once 'data.php';


$page_content = renderTemplate('/templates/index.php', ['items' => $items]);

$layout_content = renderTemplate('/templates/layout.php',
    ['content' => $page_content,
     'title' => 'Главная',
     'is_auth' => isAuth(),
     'user_name' => getName(),
     'user_avatar' => getAvatar(),
     'categories' => $categories]);

print($layout_content);
