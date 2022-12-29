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
     'is_auth' => isAuth(),
     'user_name' => getName(),
     'user_avatar' => getAvatar(),
     'categories' => $categories]);

print($layout_content);