<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sort</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<h1>Сортировка слиянием</h1>
<?php

//Сортировка слиянием
function mergeSort(array $arr) {
    $count = count($arr);
    if ($count <= 1) {
        return $arr;
    }
 
    $left  = array_slice($arr, 0, (int)($count/2));
    $right = array_slice($arr, (int)($count/2));
 
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

function print_array($array): void {
    echo "<pre>[";
    echo implode(", ", $array);
    echo "]</pre>";
}

if (isset($_GET['array'])) {
    $array = explode(",", $_GET["array"]);
    echo "<p>Считанный массив</p>";
    print_array($array);
    $array = mergeSort($array);
    echo "<p>Отсортированный массив</p>";
    print_array($array);
} else {
    echo "<p>Задайте числа, разделённые запятыми в параметре array, чтобы отсортировать их</p>
<pre>
    http:localhost/sort.php?array=4,2,5, ...
</pre>";
}
?>
</body>
</html>