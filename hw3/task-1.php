<?php

//Дан массив из n элементов, начиная с 1. Каждый следующий элемент равен (предыдущий + 1). Но в массиве гарантированно 1 число пропущено.
//Необходимо вывести на экран пропущенное число. Сложность не выше O(logn).
//Примеры:
//[1, 2 ,3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15, 16] => 11
//[1, 2, 4, 5, 6] => 3
//[] => 1

//function binarySearch ($list, $item) {
//    $low = 0;
//    $high = count($list) - 1;
//
//    while ($low <= $high) {
//        $mid = intdiv($low + $high, 2);
//        $guess = $list[$mid];
//
//        if ($guess == $item) {
//            return $mid;
//        } elseif ($item < $guess) {
//            $high = $mid - 1;
//        } else {
//            $low = $mid + 1;
//        }
//    }
//    return "None";
//}

$myList = [1, 2, 4, 5, 6];

function searchMissed($list) {
    $low = 0;
    $high = count($list) - 1;
    $result = 1;

    while ($low < $high) {
        $mid = intdiv(($low + $high), 2);

        if ($list[$mid] == $mid + 1) {
            if ($list[$mid + 1] - $list[$mid] == 2) {
                $result = $list[$mid] + 1;
                break;
            }
            $low = $mid + 1;

        } else {
            if ($list[$mid] - $list[$mid - 1] == 2) {
                $result = $list[$mid] - 1;
                break;
            }
            $high = $mid - 1;
        }
    }
    return $result;
}

echo searchMissed($myList) . PHP_EOL;