<?php
require_once 'functions.php';
require_once 'data.php';


$historyItems = getItemsHistory();

$content = renderTemplate(
    '/templates/history.php',
    [
        'history' => $historyItems,
        'items' => $items,
    ]
);

$layout_content = renderTemplate('/templates/layout.php',
    ['content' => $content,
     'title' => 'История просмотров',
     'is_auth' => $is_auth,
     'user_name' => $user_name,
     'user_avatar' => $user_avatar,
     'categories' => $categories]);

print($layout_content);