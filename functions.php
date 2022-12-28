<?php
function show_price($price) {
    $price = ceil($price);
    if ($price < 1000) {
        return $price . ' ' . '<b class="rub">р</b>';
    } else {
        $thousands = floor($price / 1000);
        return $thousands . ' ' . substr($price,-3,3) . ' ' . '<b class="rub">р</b>';
    }        
}

function renderTemplate($page_url, $data_array) {
    $pathTemplate = __DIR__. $page_url;
    if(empty($page_url || !file_exists($pathTemplate))) {
        return '';
    }

    extract($data_array, EXTR_OVERWRITE);

    ob_start();
    include $pathTemplate;

    return ob_get_clean();
}

date_default_timezone_set("Europe/Moscow");

function getLeftTime($midnight) {
    if (!$midnight) {
        $midnight = mktime(0, 0, 0, date('n'), date('j') + 1, date('Y'));
    }

    $left = $midnight - time();
    // $left = $midnight; // - time();

    return floor($left / 3600) . ':'. floor($left % 3600 / 60);
    // return floor($left / 86400) . ' days ' . floor($left / 86400 / 3600) . ':'. floor($left / 86400 % 3600 / 60);
}

function getItemsHistory() {
    $history = $_COOKIE['items-history'] ?? [];

    $history = empty($history) ? [] : unserialize($history, ['allowed_classes' => false]);
    return $history;
}

function addItemsHistory($id) {
    $history = getItemsHistory();

    $history[] = $id;
    $history = array_unique($history, SORT_NUMERIC);

    setcookie('items-history', serialize($history), time() + 7 * 86400);
}

function hasError() {
    global $errors;
    return (count($errors));
}

function checkError($field) {
    global $errors;
    return !empty($errors[$field]) ? 'form__item--invalid' : '';
}

// for user auth
function checkEmail(string $email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function searchUser(string $email) {
    global $users;

    $result = null;
    foreach ($users as $key => $user) {
        if($user['email'] === $email) {
            $user['id'] = $key;
            $result = $user;
            break;
        }
    }
    return $result;
}

function getUser(int $id) {
    global $users;
    return isset($users[$id]) ? $users[$id] : [];
}

function checkPassword(string $password, string $hash) {
    return password_verify($password, $hash);
}

function auth(int $id) {
    $user = getUser($id);
    $_SESSION['user'] = $user['name'];
    $_SESSION['avatar'] = $user['avatar'] ?? 'img/user.png';
}

function isAuth() {
    return !empty($_SESSION['user']);
}

function logout() {
    unset($_SESSION['user']);
    unset($_SESSION['avatar']);
}

function getName() {
    return $_SESSION['user'] ?? '';
}

function getAvatar() {
    return $_SESSION['avatar'] ?? '';
}