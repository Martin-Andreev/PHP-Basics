<?php
$keyStr = $_GET['keys'];
$text = $_GET['text'];

$keyPattern = "/^([A-Za-z\_]+)\d.*\d([A-Za-z\_]+)$/";
$sum = 0;
$found = false;

preg_match_all($keyPattern, $keyStr, $matches);

if (empty($matches[0])){
    echo "<p>A key is missing</p>";
    exit();
}else{
    $startKey = $matches[1][0];
    $endKey = $matches[2][0];
}

$textPattern = '/' . $startKey . '(.*?|)' . $endKey . '/';

preg_match_all($textPattern, $text, $values);

$values = $values[1];

foreach ($values as $value) {
    if (is_numeric($value)){
        $sum += floatval($value);
        $found = true;
    }
}

if ($sum == 0){
    echo "<p>The total value is: <em>nothing</em></p>";
}else{
    echo "<p>The total value is: <em>" . $sum ."</em></p>";
}