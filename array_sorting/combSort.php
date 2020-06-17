<?php

function compSort(array &$array) {
    if (!is_array($array)) {
        return false;
    }

    $cntArr = count($array);

    for ($i = 0; $i < $cntArr-1; $i++) {
        for ($j = 0; $j < $i+1; $j++) {
            $compIndex = ($cntArr - 1) - ($i - $j);
            if ($array[$j] > $array[$compIndex]) {
                list($array[$j], $array[$compIndex]) = [$array[$compIndex], $array[$j]];
            }
        }
    }
    return true;
}

$array = [];
for ($i = 0; $i < 100; $i++) {
    $array[$i] = rand(1, 100);
}
echo implode(', ', $array) . "\n";
compSort($array);
echo implode(', ', $array);