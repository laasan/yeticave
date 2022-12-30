<?php
require_once 'functions.php';

if(isAuth()) {
    header('Location: /profile.php');
    exit();
}

$requiredFields = ['email', 'password', 'name'];
$arRes = array_fill_keys($requiredFields, '');
$errors = [];

$content = renderTemplate(
    'registration.php',
    [
        'arRes' => $arRes,
        'errors' => $errors
    ]
);

$layout_content = renderTemplate('/templates/layout.php',
    ['content' => $content,
     'title' => 'Регистрация'
    ]);

print($layout_content);