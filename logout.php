<?php
require_once 'functions.php';

if(isAuth()) {
    $content = renderTemplate(
        '/templates/welcome.php',
        [
            'message' => 'Вы авторизованы. Хотите выйти?',
            'button' => 'Выйти',
            'buttonUrl' => '/logout.php?logout=true'
        ]
    );
} else {
    header('Location: /login.php');
    exit();
}

if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
    logout();
    header('Location: /');
    exit();
}

$layout_content = renderTemplate('/templates/layout.php',
    ['content' => $content,
     'title' => 'Завершение сеанса'
    ]);

print($layout_content);