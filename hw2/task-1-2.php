<?php

//1. Определить сложность следующих алгоритмов:
//      - Поиск элемента массива с известным индексом           - O(n)
//      - Дублирование одномерного массива через foreach        - O(n)
//      - Рекурсивная функция нахождения факториала числа       - O(n)
//      - Удаление элемента массива с известным индексом        - O(n)

//2.Определить сложность следующих алгоритмов. Сколько произойдет итераций?

//  1)  O(n*n)

$n = 10000;
$array[] = [];

for ($i = 0; $i < $n; $i++) {
    for ($j = 1; $j < $n; $j *= 2) {
        $array[$i][$j] = true;
    }
}
//  2)  O(n*n)

$n = 10000;
$array[] = [];

for ($i = 0; $i < $n; $i += 2) {
    for ($j = $i; $j < $n; $j++) {
        $array[$i][$j] = true;
    }
}

//  3)  O(n*n*n)

$n = 10000;
$array[] = [];
foo(n);

function foo() {
    while (n > 0) {
        for ($j = sqrt(n); $j < $n; $j++) {
            n--;
            foo(n);
        }
    }
}
