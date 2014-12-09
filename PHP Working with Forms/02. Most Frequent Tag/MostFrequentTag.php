<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Print tags</title>
</head>
<body>
<p>Enter Tags:</p>
<form method="get" action="MostFrequentTag.php">
    <input type="text" name="input"/>
    <input type="submit" />
</form>
</body>
</html>

<?php
if (isset($_GET['input'])) {
$wordsArr = explode(', ', $_GET['input']);
$result = array();

foreach ($wordsArr as $key => $value) {
    if (!array_key_exists($value, $result)){
        $result[$value] = 1;
    } else{
        $result[$value]++;
    }
}

arsort($result);

foreach ($result as $key => $value) {
    echo "$key: $value times <br>";
}

reset($result);
$bestWord = key($result);

echo "Most Frequent Tag is: " . $bestWord;
}
//?>