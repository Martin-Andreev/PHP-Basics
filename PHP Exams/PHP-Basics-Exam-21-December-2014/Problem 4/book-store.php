<?php
date_default_timezone_set('UTC');

$text = $_GET['text'];
$minPrice = floatval($_GET['min-price']);
$maxPrice = floatval($_GET['max-price']);
$type = $_GET['sort'];
$order = $_GET['order'];

$bookLines = preg_split("/[\r\n]+/", $text, -1, PREG_SPLIT_NO_EMPTY);

$books = [];

foreach ($bookLines as $bookLine) {
    $bookAllInfo = preg_split("/\s*\/\s*/", $bookLine, -1, PREG_SPLIT_NO_EMPTY);

    $author = trim($bookAllInfo[0]);
    $name = trim($bookAllInfo[1]);
    $genre = trim($bookAllInfo[2]);
    $price = $bookAllInfo[3];
    $date = trim($bookAllInfo[4]);
    $bookInfo = trim($bookAllInfo[5]);

    $publishDate = strtotime($date);

    $info = [
        "author" => $author,
        "name" => $name,
        "genre" => $genre,
        "price" => $price,
        "publish-date" => $publishDate,
        "date" => $date,
        "bookInfo" => $bookInfo
    ];

    if ($price >= $minPrice && $price <= $maxPrice){
        $books[] = $info;
    }
}

usort($books, function($el1, $el2) use ($order, $type){
    if ($el1[$type] == $el2[$type]){
        return $el1['publish-date'] - $el2['publish-date'];
    }

    if ($order == "ascending"){
        return $el1[$type] > $el2[$type] ? 1 : -1;
    }else{
        return $el1[$type] < $el2[$type] ? 1 : -1;
    }
});

foreach ($books as $book) {
    $author = htmlspecialchars($book["author"]);
    $name = htmlspecialchars($book["name"]);
    $genre = htmlspecialchars($book["genre"]);
    $price = number_format($book["price"], 2);
    $publishDate = htmlspecialchars($book["date"]);
    $bookInfo = htmlspecialchars($book["bookInfo"]);;

    echo "<div>";
    echo "<p>" . $name . "</p>";
    echo "<ul>";
    echo "<li>" . $author . "</li>";
    echo "<li>" . $genre . "</li>";
    echo "<li>" . $price . "</li>";
    echo "<li>" . $publishDate . "</li>";
    echo "<li>" . $bookInfo . "</li>";
    echo "</ul>";
    echo "</div>";
}