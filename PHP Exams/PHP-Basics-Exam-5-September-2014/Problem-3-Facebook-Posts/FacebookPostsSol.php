<?php
date_default_timezone_set("Europe/Sofia");
$text = $_GET['text'];
$posts = preg_split("/[\r\n]+/", $text, -1, PREG_SPLIT_NO_EMPTY);

$postByDate = [];

foreach ($posts as $post) {
    $parts = explode(";", $post);
    $name = trim($parts[0]);
    $date = trim($parts[1]);
    $dateAsInt = strtotime($date);
    $dateString = date("j F Y", $dateAsInt);
    $post = trim($parts[2]);
    $likes = trim($parts[3]);
    $comments = preg_split("/\s*\/\s*/", $parts[4], -1, PREG_SPLIT_NO_EMPTY);

    $postByDate[$dateAsInt] = renderHTML($name, $dateString, $post, $likes, $comments);
}

krsort($postByDate);

echo implode("", $postByDate);

function renderHTML($name, $date, $post, $likes, $comments){
    $name = htmlspecialchars($name);
    $date = htmlspecialchars($date);
    $post = htmlspecialchars($post);
    $likes = htmlspecialchars($likes);

    $html = "";
    $html .= "<article>";
    $html .= "<header>";
    $html .= "<span>$name</span>";
    $html .= "<time>$date</time>";
    $html .= "</header>";
    $html .= "<main><p>$post</p></main>";
    $html .= "<footer><div class=\"likes\">$likes people like this</div>";
    
    if (count($comments) > 0){
        $html .= "<div class=\"comments\">";
        foreach ($comments as $comment) {
            $comment = htmlspecialchars(trim($comment));
            $html .= "<p>$comment</p>";
        }
        $html .= "</div>";
    }

    $html .= "</footer>";
    $html .= "</article>";

    return $html;
}
