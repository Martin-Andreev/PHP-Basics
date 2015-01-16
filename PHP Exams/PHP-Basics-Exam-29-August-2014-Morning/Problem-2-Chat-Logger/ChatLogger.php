<?php
date_default_timezone_set('UTC');

$currentDate = $_GET['currentDate'];
$messages = $_GET['messages'];

$msg = preg_split("/\r?\n/", $messages);

$messagesList = [];

foreach ($msg as $line) {
    $arrLine = preg_split("/\s+\/\s+/", $line, -1, PREG_SPLIT_NO_EMPTY);

    $currMessage = trim($arrLine[0]);
    $dateSent = trim($arrLine[1]);

    $dateAsInt = strtotime($dateSent);

    $messagesList[$dateAsInt] = $currMessage;
}

ksort($messagesList);

foreach ($messagesList as $message) {
    echo "<div>" . htmlspecialchars($message) ."</div>\n";
}

$lastMsg = end($messagesList);

$lastMsg = end($messagesList);
$lastDate = end(array_keys($messagesList));
$currentDate = strtotime($currentDate);

$lastActiveSec = $currentDate - $lastDate;
$lastActive = "";

$currD = date("d/m/Y",$currentDate);
$lastD = date("d/m/Y",$lastDate);

$yesterday = date("d/m/Y",$currentDate - 86400);

if ($lastActiveSec < 60){
    $lastActive = "a few moments ago";
}else if($lastActiveSec < 3600){
    $lastActive = intval($lastActiveSec / 60) . " minute(s) ago";
}else if($currD == $lastD){
    $lastActive = intval($lastActiveSec / 3600) . " hour(s) ago";
}else if((date("d/m/Y",$currentDate - $lastActiveSec)) == $yesterday){
    $lastActive = "yesterday";
}else{
    $lastD = date("d-m-Y", $lastDate);
    $lastActive = $lastD;
}

echo "<p>Last active: <time>" . htmlspecialchars($lastActive) . "</time></p>";
