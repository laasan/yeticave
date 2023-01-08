<?php
require_once 'functions.php';
require_once 'form.php';
require_once 'file.php';

use function form\validate as formValidate;
use function file\upload as fileUpload;

// каталог для загрузки пользовательских изображений
define('USER_UPLOAD_DIR', '/upload');
// каталог загрузки аватарок пользователя
define('AVATARS_UPLOAD_DIR', USER_UPLOAD_DIR . '/avatars/');
// каталог загрузки лотов
define('LOTS_UPLOAD_DIR', USER_UPLOAD_DIR . '/lots/');

if(isAuth()) {
    header('Location: /logout.php');
    exit();
}

$arRes = [];
$errors = [];
$requiredFields = ['email', 'password', 'name', 'message'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    [$arRes, $errors] = formValidate($_POST, $requiredFields);

    // Загрузка аватарки если указана
    if (!empty($_FILES['avatar']['tmp_name'])) {
        [$avatar, $error] = fileUpload($_FILES['avatar'], AVATARS_UPLOAD_DIR);
        if(!empty($error)) {
            $errors['avatar'] = $error;
        } elseif (!empty($avatar)) {
            $arRes ['avatar'] = $avatar;
        }
    }
} else {
    $arRes = array_fill_keys($requiredFields, '');
    $arRes['avatar'] = '';
}

$content = renderTemplate(
    '/templates/registration.php',
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