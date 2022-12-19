<?php
// ставки пользователей, которыми надо заполнить таблицу
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];

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
