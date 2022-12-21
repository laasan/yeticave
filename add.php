<?php
require_once 'functions.php';
require_once 'data.php';

function hasError() {
    global $errors;
    return (count($errors));
}

function checkError($field) {
    global $errors;
    return !empty($errors[$field]) ? 'form__item--invalid' : '';
}

$selectTemp = [];
$errors = [];

$requiredFields = ['lot-name', 'category', 'message', 'lot-rate', 'lot-step', 'lot-date'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    foreach ($requiredFields as $field) {
        $value = htmlspecialchars($_POST[$field]);
        $selectTemp[$field] = $value;
    }
}

$page_content = renderTemplate('/templates/add.php', ['categories' => $categories, 'selectTemp' => $selectTemp]);

$layout_content = renderTemplate('/templates/layout.php',
    ['content' => $page_content,
     'title' => 'Главная',
     'is_auth' => $is_auth,
     'user_name' => $user_name,
     'user_avatar' => $user_avatar,
     'categories' => $categories]);

print($layout_content);