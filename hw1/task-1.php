<?php

//Проверить баланс скобок в выражении, игнорируя любые внуренние символы. В решении по возможности использовать SplStack.
//Примеры:
//"Это тестовый вариант проверки (задачи со скобками). И вот еще скобки: {[][()]}" - true
//((a + b)/ c) - 2 - true
//"([ошибка)" - false
//"(") - false
//
//1.1* В задаче выше учитывать, что двойные и одинарные кавычки работают как в файле .php, т.е. контент внутри рассматривается исключительно как текст (даже скобки)

$start = microtime(true);
$before = memory_get_usage();

function str_split_unicode($str, $length = 1) {
    $tmp = preg_split('~~u', $str, -1, PREG_SPLIT_NO_EMPTY);
    if ($length > 1) {
        $chunks = array_chunk($tmp, $length);
        foreach ($chunks as $i => $chunk) {
            $chunks[$i] = join('', (array)$chunk);
        }
        $tmp = $chunks;
    }
    return $tmp;
}

function checkBrackets($string) {
    if (!$string) {
        return 'String is empty';
    }

    $stack = new SplStack();
    $brackets = ['{', '}', '[', ']', '(', ')', '"'];
    $array = str_split_unicode($string);
    $result = '';

    foreach ($array as $value) {
        $key = array_search($value, $brackets);
        if (is_int($key)) {
            if (!($key & 1)) {
                $stack->push($value);
            } elseif ($stack->isEmpty()) {
                return 'Not balanced';
            } elseif ($stack->top() == $brackets[$key - 1]) {
                $stack->pop();
            }
        }
    }

    $result = $stack->isEmpty() ? 'Balanced' : 'Not balanced';

    return $result;
}

echo (checkBrackets('Это тестовый вариант проверки (задачи со скобками). И вот еще скобки: {[][()]}')) . PHP_EOL;
echo (checkBrackets('((a + b)/ c) - 2')) . PHP_EOL;
echo (checkBrackets('([ошибка)')) . PHP_EOL;
echo (checkBrackets('(")"')) . PHP_EOL;

echo microtime(true) - $start;
echo PHP_EOL;
echo memory_get_usage() - $before;
echo PHP_EOL;