<?php
require_once 'functions.php';

$is_auth = (bool) rand(0, 1);

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';
$categories = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];
$items = [
    [
        'Название' => '2014 Rossignol District Snowboard',
        'Категория' => 'Доски и лыжи',
        'Цена' => 10999,
        'URL_img' => 'img/lot-1.jpg'
    ],
    [
        'Название' => 'DC Ply Mens 2016/2017 Snowboard',
        'Категория' => 'Доски и лыжи',
        'Цена' => 159999,
        'URL_img' => 'img/lot-2.jpg'
    ],
    [
        'Название' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'Категория' => 'Крепления',
        'Цена' => 8000,
        'URL_img' => 'img/lot-3.jpg'
    ],
    [
        'Название' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'Категория' => 'Ботинки',
        'Цена' => 10999,
        'URL_img' => 'img/lot-4.jpg'
    ],
    [
        'Название' => 'Куртка для сноуборда DC Mutiny Charocal',
        'Категория' => 'Одежда',
        'Цена' => 7500,
        'URL_img' => 'img/lot-5.jpg'
    ],
    [
        'Название' => 'Маска Oakley Canopy',
        'Категория' => 'Разное',
        'Цена' => 5400,
        'URL_img' => 'img/lot-6.jpg'
    ],
];



$page_content = renderTemplate('/templates/index.php', ['items' => $items]);

$layout_content = renderTemplate('/templates/layout.php',
    ['content' => $page_content,
     'title' => 'Главная',
     'is_auth' => $is_auth,
     'user_name' => $user_name,
     'user_avatar' => $user_avatar,
     'categories' => $categories]);

print($layout_content);
