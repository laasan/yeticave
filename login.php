<?php
require_once 'functions.php';
require_once 'userdata.php';
require_once 'data.php';

$email = '';
$errors = [];
$requiredFields = ['email', 'password'];

if (isset($_GET['login']) && $_GET['login'] === 'true') {
    logout();
    header('Location: /');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    foreach ($requiredFields as $field) {
        if (empty($field)) {
            $errors[$field] = 'Поле не заполнено';
        }
    }

    if (!count($errors)) {

        if(!checkEmail($_POST['email'])) {
            $errors['email'] = 'Указан не корректный E-mail';
        } else {
            $arUser = searchUser($_POST['email']);
            if(!empty($arUser) && checkPassword($_POST['password'], $arUser['password'])) {
                auth($arUser['id']);
            }
            $errors['password'] = 'Введите пароль';
            $errors['form'] = 'Указан неверный логин или пароль';
        }
    }
    $email = $_POST['email'];
    unset($arRes);
}
echo "auth: ". isAuth() ." ";
echo "user: ". $_SESSION['user'] ." ";
if(isAuth()) {
    $indexContent = renderTemplate(
        '/templates/welcome.php',
        [
            'message' => 'Добро пожаловать, ' . getName() . '!'
        ]
    );
} else {
    $indexContent = renderTemplate(
        '/templates/login.php',
        [
            'email' => $email,
            'errors' => $errors
        ]
    );
}

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