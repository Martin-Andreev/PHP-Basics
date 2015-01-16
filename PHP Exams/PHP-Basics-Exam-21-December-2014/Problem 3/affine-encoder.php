<?php
$inputTable = $_GET['jsonTable'];

$inputTable = json_decode($inputTable);

$firstKey = $inputTable[1][0];
$secondKey = $inputTable[1][1];

if ($inputTable[0][0] == ""){
    echo "<table border='1' cellpadding='5'><tr><td></td></tr></table>";
    exit();
}

$words = $inputTable[0];

$matrix = [];

$row = 0;
$alphabet =   array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
$bestLine = max(array_map('strlen', $words));

foreach ($words as $word) {
    $wordLow = strtolower($word);

    for ($i = 0; $i < strlen($word); $i++) {
        $col = $i;
        if (ctype_alpha($word[$i])){
            $currLetterUp = strtoupper(trim($word[$i]));
            $x = ord(strtoupper($currLetterUp)) - ord('A');

            $cipher = ($firstKey * $x + $secondKey) % 26;
            $cipher = strtoupper($alphabet[$cipher]);

            $matrix[$row][$col] = $cipher;
        }else{
            $matrix[$row][$col] = $word[$i];
        }

    }

    while(count($matrix[$row]) < $bestLine){
        $col++;
        $matrix[$row][$col] = "";
    }

    $row++;
}

$table = "";
$table .= "<table border='1' cellpadding='5'>";
for ($currRow = 0; $currRow < $row; $currRow++) {
    $table .= "<tr>";
    for ($col = 0; $col < count($matrix[$currRow]); $col++) {
        $currElem = $matrix[$currRow][$col];
        if ($currElem != ""){
            $table .= "<td style='background:#CCC'>" . htmlspecialchars($currElem) . "</td>";
        }else{
            $table .= "<td></td>";
        }
    }
    $table .= "</tr>";
}
$table .= "</table>";

echo $table;