<?php
require_once 'functions.php';

if(isAuth()) {
    $indexContent = renderTemplate(
        '/templates/welcome.php',
        [
            'message' => 'Вы авторизованы. Хотите выйти?'
        ]
    );
} else {
    header('Location: /login.php');
    exit();
}

$layout_content = renderTemplate('/templates/layout.php',
    ['content' => $indexContent,
     'title' => 'Авторизация'
    ]);

print($layout_content);