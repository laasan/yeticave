<?php
require_once 'functions.php';
require_once 'data.php';

$id = (int)$_GET['id'];
if(!isset($items[$id])) {
    http_response_code(404);
    die;
}

addItemsHistory($id);

$item = $items[$id];

$page_content = renderTemplate('/templates/lot.php', ['item' => $item, 'bets' => $bets]);

$layout_content = renderTemplate('/templates/layout.php',
    ['content' => $page_content,
     'title' => 'Главная',
     'is_auth' => $is_auth,
     'user_name' => $user_name,
     'user_avatar' => $user_avatar,
     'categories' => $categories]);

print($layout_content);

