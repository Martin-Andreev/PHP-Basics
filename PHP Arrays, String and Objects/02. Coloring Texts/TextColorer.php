<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Coloring Texts</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
<form action="" method="post">
    <textarea name="input"></textarea>
    <input type="submit" name="submit" value="Color text"/>
</form>

<?php
if (isset($_POST['submit']) && !empty($_POST['input'])){
    $text = str_split(($_POST['input']));

    echo "<p>";
    foreach ($text as $letter) {
        $asciiNum = ord($letter);

        if ($asciiNum % 2 == 0){
            echo '<span class="red">' . htmlspecialchars($letter) . ' </span>';
        } else{
            echo '<span class="blue">' . htmlspecialchars($letter) . ' </span>';
        }
    }
    echo "</p>";
}
?>

</body>
</html>