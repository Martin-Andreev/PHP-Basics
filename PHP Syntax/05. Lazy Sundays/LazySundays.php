<?php
$year = date("Y");
$month = date("m");
$monthDays = date("t");

for ($day = 1; $day <= $monthDays; $day++) {
    $date = "$year/$month/$day";

    if (date('N', strtotime($date)) >= 7){
        echo date("jS F, Y", mktime(0, 0, 0, $month, $day, $year)) . "\n";
    };
}
?>