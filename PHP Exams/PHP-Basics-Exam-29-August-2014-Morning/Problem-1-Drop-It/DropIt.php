<?php
$text = $_GET['text'];
$minFontSize = intval($_GET['minFontSize']);
$maxFontSize = intval($_GET['maxFontSize']);
$step = intval($_GET['step']);

$currentSize = $minFontSize;
$ascending = true;
for ($i = 0; $i < strlen($text); $i++) {
    $ch = $text[$i];

    if (ord($ch) % 2 == 0){
        echo "<span style='font-size:$currentSize;text-decoration:line-through;'>" . htmlspecialchars($ch) . "</span>";
    }else{
        echo "<span style='font-size:$currentSize;'>$ch</span>";
    }
    if ($currentSize >= $maxFontSize){
        $ascending = false;
    }else if($currentSize <= $minFontSize){
        $ascending = true;
    }
    if (ctype_alpha($ch)){
           if ($ascending){
               $currentSize += $step;
           }else{
               $currentSize -= $step;
           }
    }
    $lastSize = &$currentSize;
}
