<?php
// Задаем асоциативный многомерный массив с пунктами меню.
$menu = [
    [
        'title' => 'Главная',
        'sort' => 1,
        'path' => '/'
    ],
    [
        'title' => 'Новости',
        'sort' => 21,
        'path' => '/news/'
    ],
    [
        'title' => 'Каталог товаров',
        'sort' => 33,
        'path' => '/catalog/'
    ],
    [
        'title' => 'О нас',
        'sort' => 14,
        'path' => '/about/'
    ],
    [
        'title' => 'Обратная связь',
        'sort' => 55,
        'path' => '/feedback/'
    ]
];

// Задаем функцию сортировки массива с пунктами меню. По умолчанию сортировка идет по индексу (ключ sort) в порядке возрастания.
function arraySort(array $array, $key = 'sort', $sort = SORT_ASC): array
{
    // вызывем функцию  usor(), в качестве колбэк функции используем анонимную функцию с использованием дополнительных аргументов через use
    usort($array, function ($item1, $item2) use ($key, $sort) {
        // Используем в качестве условия сортировки константы SORT_ASC и SORT_DESC.
        return $sort == SORT_ASC ? $item1[$key] <=> $item2[$key] : $item2[$key] <=> $item1[$key];
    });
    // возвращаем массив.
    return $array;
}

var_dump(arraySort($menu));
