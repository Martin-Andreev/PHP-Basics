<?php
$startDate = date("d-m-Y G:i:s");
$endDate = date("31-12-Y 23:59:59");

$firstTime=strtotime($startDate);
$secondTime=strtotime($endDate);

$differenceInSeconds=($secondTime-$firstTime)-3600;
$secondsLeft=$differenceInSeconds%60;

$hours=round(($differenceInSeconds/(60*60)));
$hoursLeft=$hours%24;

$minutesLeft=((($differenceInSeconds/60))%60);
$minutes = round((($differenceInSeconds/60) - 1));

$days=($hours-$hoursLeft)/24;


echo "Hours until new year: ".implode(' ',explode(',',number_format($hours,0))) . "<br/>\n";
echo "Minutes until new year: ".implode(' ',explode(',',number_format($minutes,0))) . "<br/>\n";
echo "Seconds until new year: ".implode(' ',explode(',',number_format($differenceInSeconds,0))) . "<br/>\n";

echo "Days : Hours : Minutes : Seconds $days:$hoursLeft:$minutesLeft:$secondsLeft";

?>