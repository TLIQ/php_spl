<?php

echo '<h3>Задание 1</h3>' . '<br>';
echo 'Дан массив из n элементов, начиная с 1. Каждый следующий элемент равен (предыдущий + 1). Но в массиве гарантированно 1 число пропущено. Необходимо вывести на экран пропущенное число.
Примеры:
[1, 2 ,3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15, 16] => 11
[1, 2, 4, 5, 6] => 3
[] => 1' . '<br>' . '<hr>';


$arr = [1, 2, 3, 4, 5, 8, 9, 10];

function missingNumber(array $arr): int
{
    $controlSum = $arr[0] + $arr[count($arr) - 1];
    $i = 1;
    while (true) {
        $firstNum = $arr[$i];
        $secondNum = $arr[count($arr) - 1 - $i];
        $sum = $firstNum + $secondNum;
        if ($firstNum > $secondNum) return $firstNum - 1;
        if ($sum !== $controlSum) {
            if (($firstNum - $arr[$i - 1]) !== 1) return $firstNum - 1;
            if (($arr[count($arr) - $i] - $secondNum) !== 1) return $arr[count($arr) - $i] - 1;
        }
        $i++;
    }
    return 0;
}

echo 'Массив:';
print_r($arr);
echo '<br>' . 'Пропущенное число:' . missingNumber($arr);