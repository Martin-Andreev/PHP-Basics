<?php
$list = $_GET['list'];
$length = $_GET['length'];

$listName = preg_split("/\n/", $list, -1, PREG_SET_ORDER);

echo "<ul>";
foreach ($listName as $name) {
    $name = trim($name);

    if ($name != ""){
        if (strlen($name) >= $length){
            echo "<li>" . htmlspecialchars($name) . "</li>";
        }else{
            if (isset($_GET['show'])){
                echo "<li style=\"color: red;\">" . htmlspecialchars($name) . "</li>";
            }
        }
    }
}
echo "</ul>";
