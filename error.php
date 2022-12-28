<?php
require_once 'functions.php';

const HTTP_STATUS_CODE = [
    403 => 'У вас нет прав для просмотра этой страницы.',
    404 => 'Страница не найдена.',
    500 => 'Техническое обслуживание.'
];

$id = (int)$_SERVER['REDIRECT_STATUS'];
// Если нет в списке то 404
$id = $id ?? 404;
// Все 5xx ошибки показываем как 500
$id = $id > 500 ? 500 : $id;

$indexContent = renderTemplate(
    '/templates/error.php',
    [
        'code'  => $id,
        'message' => HTTP_STATUS_CODE[$id]
    ]
);

$layout_content = renderTemplate('/templates/layout.php',
    ['content' => $indexContent,
     'is_auth' => isAuth(),
     'title' => 'Авторизация',
     'email' => $email,
     'errors' => $errors,
     'user_name' => getName(),
     'user_avatar' => getAvatar(),
     'categories' => $categories
    ]);

print($layout_content);