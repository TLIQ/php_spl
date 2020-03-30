<h1>Задание 1. </h1>
<h3>Написать аналог «Проводника» в Windows для директорий на сервере при помощи итераторов.</h3>
 <?php

    if (isset($_GET['url'])) {
        $path = $_GET['url'];
    } else {
        $path = $_SERVER['DOCUMENT_ROOT'];
    }

    $splObjects = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($path),
        RecursiveIteratorIterator::CHILD_FIRST,
        false
    );

    $realPath = realpath('.');

    foreach ($splObjects as $splObject) {

        $getPath = explode($path . '/', $splObject);
        $currentPath = implode($getPath);

        if ($splObject->getFileName() !== '.') {


            if ($path != '/'
                && $currentPath == $splObject->getFileName()
                && $splObject->getFileName() !== 'index.php'
            ) {
                $url = '/?url=' . $splObject->getFileName();

                if ($realPath !== $path) {
                    $url = '/?url=' . $path . '/' . $splObject->getFileName();

                    if ($splObject->getFileName() == '..') {
                        $parseUrl = explode('/', $path);
                        array_pop($parseUrl);
                        if ($parseUrl) {
                            $url = '/?url=' . implode('/', $parseUrl);
                        } else {
                            $url = '/';
                        }
                    };
                }

                if ($splObject->isFile()) {
                    echo $splObject->getFileName() . '<br>';
                } else {
                    echo "<a href='{$url}'>{$splObject->getFileName()}</a><br>";
                }
            }
        }
    }

    ?>

<h1>Задание 2.</h1>
<h3>Простоые делители числа 13195 - это 5, 7, 13 и 29. Каков самый большой делитель числа 600851475143, являющийся простым  числом?</h3>

<?php
$array = [];
$n = 600851475143;
//начальное простое число
$start = 3;
//простые числа 3, 5, 7, 11, 13, 17, 19, 23, 29, 31..
//ищем делитель
function divisor($number, $first)
{
    for ($i = $first; $i * $i <= $number; $i += 2) {
        if ($number % $i == 0) {
            return $i;
        }
    }
    return $number;
}

//выполняем деление
while ($n > 1) {
    $arr = divisor($n, $start);
    $n /= $arr;
    $array[] = $arr;
}

echo  end($array);



?>