<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Primes in Range</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
<form action="" method="post">
    <label for="inputYears">Starting index</label>
    <input type="text" id="inputYears" name="start"/>

    <label for="inputYears">End</label>
    <input type="text" id="inputYears" name="end"/>

    <input type="submit" name="submit" value="Show costs"/>
</form>

<?php
function isPrime($num){
    if ($num <= 3) {
        return $num > 1;
    } else if ($num % 2 == 0 || $num % 3 == 0) {
        return false;
    } else {
        for ($i = 5; $i * $i <= $num; $i += 6) {
            if ($num % $i == 0 || $num % ($i + 2) == 0) {
                return false;
            }
        }
        return true;
    }
}

if (isset($_POST['submit']) && !empty($_POST["start"]) && !empty($_POST["end"])){
    $startNum = $_POST['start'];
    $endNum = $_POST['end'];
?>
<div id="contentBox">
    <?php for ($i = $startNum; $i <= $endNum; $i++) {
        if (isPrime($i)){
            echo '<p class="prime">' . $i . '</p>';
        } else{
            echo '<p>' . $i . '</p>';
        }
    }
}
?>

</div>
</body>
</html>