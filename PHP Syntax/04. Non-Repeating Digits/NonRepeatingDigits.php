<?php
$n = 145;
$maxNum = 987;

if ($n < 102){
    echo 'no';
    return;
}

if ($n < 987){
    $maxNum = $n;
}

for ($i = 102; $i <= $maxNum; $i++) {
    $numStr = strval($i);
    $firstDigit = (int)$numStr[0];
    $secondDigit = (int)$numStr[1];
    $thirdDigit = (int)$numStr[2];

    if (($firstDigit != $secondDigit) && ($firstDigit != $thirdDigit) && ($secondDigit != $thirdDigit)){
        if ($i != $maxNum){
            echo $firstDigit . $secondDigit . $thirdDigit . ', ';
        } else{
            echo $firstDigit . $secondDigit . $thirdDigit . ' ';
        }
    }
}

?>