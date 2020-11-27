<?php

// Mostrar o maior dos números, o menor e a média.
// Esta função aceita N números
function OrderAndAverage(...$nums) {
    asort($nums);

    $menor = $nums[array_key_first($nums)];
    $maior = $nums[array_key_last($nums)];
    $media = 0;

    foreach ($nums as $numero) {
        $media += $numero;
    }

    $len = count($nums);
    $media = $media / $len;

    echo "O Menor número é $menor <br>
        O Maior número é $maior<br>
        A média é $media<br>
        Foram inseridos um total de $len números<br>";    
}

OrderAndAverage(46, 2, 5, 1, 43, 3, 13, 75, 32, 14);