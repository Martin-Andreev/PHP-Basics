<?php
$text = $_GET['text'];
$red = toHex($_GET['red']);
$green = toHex($_GET['green']);
$blue = toHex($_GET['blue']);
$n = $_GET['nth'];

$color = "#" . $red . $green . $blue;

echo "<p>";
for ($i = 0, $count = 1; $i < strlen($text); $i++, $count++) {
    $char = htmlspecialchars($text[$i]);
    if ($count % $n == 0){
        echo "<span style=\"color: $color\">$char</span>";
    }else{
        echo $char;
    }
}
echo "</p>";

function toHex($number){
    $hex = dechex($number);

    if (strlen($hex) < 2){
        $hex = "0" . $hex;
    }

    return $hex;
}