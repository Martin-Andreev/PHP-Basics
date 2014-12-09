<?php

if (isset ($_GET['interest'], $_GET['period'], $_GET['amount'], $_GET['currency'] )) {
    $annualInterest = ($_GET["interest"]);
    $annualInterest = (($annualInterest / 12) + 100) / 100;
    $period = ($_GET["period"]);
    $currency = $_GET['currency'];
    $sum = htmlentities($_GET["amount"]);


    for ($i = 0; $i < $period; $i++) {
        $sum *= $annualInterest;
    }

    echo "<p>" . $currency . " " . number_format($sum, 2) . "<p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Print tags</title>
</head>
<body>
<form method="get" action="CalculateInterest.php">
    Enter Amount
    <input type="text" name="amount" /> <br>
    <input type="radio" name="currency" value="$" checked>USD
    <input type="radio" name="currency" value="€" checked>EUR
    <input type="radio" name="currency" value="lv" checked>BGN <br>
    Compound Interest Amount
    <input type="text" name="interest" /> <br>
    <select name="period">
        <option value="6">6 Months</option>
        <option value="12">1 Year</option>
        <option value="24">2 Year</option>
        <option value="60">5 Year</option>
    </select>
    <input type="submit" value="Calculate"/>
</form>
</body>
</html>