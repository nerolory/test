<?php
/*
    Решил использовать mb_substr(), а не mb_strimwidth(),
    т.к. Если $appends использовать третьим параметров в mb_strimwidth(),
    то строка обрезается ещё и на число символов, указанных в $appends.
    А в задаче указывалось обрезать на $length и добавлять в конце $appends.
    Ну и так как 4-ый параметр mb_strimwidth() не используется,
    Я решил использовать mb_substr()
    Если использование mb_strimwidth() лучше, то я исправлю.
    Так же я использовал rtrim() для удаления пробела в конце строки, если он есть.
*/


// Задаем функцию, которая обрезает все символы дальше 12-го, и добавляет в конце указанный текст (по умолчанию "...").
function cutString($line, $length = 12, $appends = '...'):string
{
    // Проверяем длину строки
    if (strlen($line) > $length) {
        return rtrim(mb_substr($line, 0, $length)) . $appends;
    } else {
        return $line;
    }
}

// Создаю массив строк. text
$arrayStrings = [
    "hello world, i am Аlex",
    "Привет мир, я Алекс",
    "Просто еще одна строка"
];

// создаю пустой массив для записи обрезанных строк.
$newArrayStrings = [];

// Через цикл получаю из массива строки, обрезаю их. Записываю результат в новый массив.
foreach ($arrayStrings as $array) {
    $newArrayStrings[] = cutString($array, 14);
}

// Вывод нового массива через var_dump()
var_dump($newArrayStrings);
