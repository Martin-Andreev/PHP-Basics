<?php
date_default_timezone_set('UTC');

$text = $_GET['text'];

$pattern = "/\s*([A-Za-z\s-]+)\s*\%\s*([A-Za-z\s-.]+)\s*;\s*(\d{2}\-\d{2}\-\d{4})\s*-\s*(.*\S)\s*/";

preg_match_all($pattern, $text, $matches, PREG_SET_ORDER);

foreach ($matches as $match) {
    echo "<div>\n";
    $topic = trim($match[1]);
    $author = trim($match[2]);
    $d = trim($match[3]);
    $summery = trim($match[4]);

    $dateAsInt = strtotime($d);
    $date = date('d-F-Y', $dateAsInt);

    $dateStr = explode("-", $date);
    $when = $dateStr[1];

    echo "<b>Topic:</b> <span>" . htmlspecialchars($topic) ."</span>\n";
    echo "<b>Author:</b> <span>" . htmlspecialchars($author) ."</span>\n";
    echo "<b>When:</b> <span>" . htmlspecialchars($when) . "</span>\n";

    if ((strlen($summery)) <= 100){
        echo "<b>Summary:</b> <span>" . htmlspecialchars($summery) . "..." . "</span>\n";
    }else{
        $summeryText = "";
        for ($i = 0; $i < 100; $i++) {
            $summeryText .= $summery[$i];
        }
        $summeryText .= "...";

        echo "<b>Summary:</b> <span>" . htmlspecialchars($summeryText) . "</span>\n";
    }

    echo "</div>\n";
}