<?php
function mergeSort(array $array) {
    $count = count($array);

    if ($count <= 1) {
        return $array;
    }

    $left = array_slice($array, 0, (int)($count / 2));
    $right = array_slice($array, (int)($count / 2));

    $left = mergeSort($left);
    $right = mergeSort($right);

    return merge($left, $right);
}

function merge(array $left, array $right) {
    $ret = array();

    while (count($left) > 0 && count($right) > 0) {
        if ($left[0] < $right[0]) {
            array_push($ret, array_shift($left));
        } else {
            array_push($ret, array_shift($right));
        }
    }

    array_splice($ret, count($ret), 0, $left);
    array_splice($ret, count($ret), 0, $right);

    return $ret;
}
