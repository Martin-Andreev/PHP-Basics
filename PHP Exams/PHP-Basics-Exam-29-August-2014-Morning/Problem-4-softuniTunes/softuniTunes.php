<?php
$text = $_GET['text'];

$artistInput = $_GET['artist'];
$sort = $_GET['property'];
$order = $_GET['order'];

$info = preg_split("/\r?\n/", $text);
$songList = [];

foreach ($info as $line) {
    $arrLine = preg_split("/\s*\|\s*/", $line, -1, PREG_SPLIT_NO_EMPTY);

    $name = trim($arrLine[0]);
    $genre = trim($arrLine[1]);
    $artist = explode(", ",trim($arrLine[2]));
    $downloads = intval(trim($arrLine[3]));
    $rating = floatval(trim($arrLine[4]));

    asort($artist);

    if (in_array($artistInput, $artist)){
        $songList[] = [
            "name" => $name,
            "genre" => $genre,
            "artist" => $artist,
            "downloads" => $downloads,
            "rating" => $rating
        ];
    }
}

usort($songList, function($el1, $el2) use ($order, $sort){
    if ($el1[$sort] == $el2[$sort]){
        return strcmp($el1["name"], $el2["name"]);
    }

    return ($order == "ascending" ^ $el1[$sort] < $el2[$sort]) ? 1 : -1;

//    if ($order == "ascending"){
//        if ($sort == "name" || $sort == "genre"){
//            return strcmp($el1[$sort], $el2[$sort]);
//        }else{
//            return $el1[$sort] > $el2[$sort] ? 1 : -1;
//        }
//    }else{
//        if ($sort == "name" || $sort == "genre"){
//            return !strcmp($el1[$sort], $el2[$sort]);
//        }else{
//            return $el1[$sort] < $el2[$sort] ? 1 : -1;
//        }
//    }

});

echo "<table>\n<tr><th>Name</th><th>Genre</th><th>Artists</th><th>Downloads</th><th>Rating</th></tr>\n";

foreach ($songList as $song) {
    $songName = htmlspecialchars($song['name']);
    $genre = htmlspecialchars($song['genre']);
    $artists = htmlspecialchars(implode(", ", $song['artist']));
    $downloads = $song['downloads'];
    $rating = $song['rating'];

    echo "<tr>";
    echo "<td>" . $songName . "</td>";
    echo "<td>" . $genre . "</td>";
    echo "<td>" . $artists . "</td>";
    echo "<td>" . $downloads . "</td>";
    echo "<td>" . $rating . "</td>";
    echo "</tr>\n";
}

echo "</table>";
