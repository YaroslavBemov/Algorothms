<?php

//Простые делители числа 13195 - это 5, 7, 13 и 29. Каков самый большой делитель числа 600851475143, являющийся простым числом?

$start = microtime(true);
$before = memory_get_usage();

function getPrimes($max_number) {
    $primes = [];
    $is_composite = [];
    for ($i = 4; $i <= $max_number; $i += 2) {
        $is_composite[$i] = true;
    }
    $next_prime = 3;
    while ($next_prime <= (int)sqrt($max_number)) {
        for ($i = $next_prime * 2; $i <= $max_number; $i += $next_prime) {
            $is_composite[$i] = true;
        }
        $next_prime += 2;
        while ($next_prime <= $max_number && isset($is_composite[$next_prime])) {
            $next_prime += 2;
        }
    }
    for ($i = 2; $i <= $max_number; $i++) {
        if (!isset($is_composite[$i]))
            $primes[] = $i;
    }
    return $primes;
}

function getDiv($number) {

    if (!is_int($number)) {
        return 'It is not number.';
    }

    $div = (int)sqrt($number);
    $primes = getPrimes($div);
    $count = count($primes) - 1;

    for ($i = $count; $i >= $primes[0]; $i--) {
        if ($number % $primes[$i] === 0) {
            return $primes[$i];
        }
    }

    return 'Nothing';
}

$result = getDiv(600851475143);
var_dump($result);

echo PHP_EOL;
echo microtime(true) - $start;
echo PHP_EOL;
echo memory_get_usage() - $before;
echo PHP_EOL;
