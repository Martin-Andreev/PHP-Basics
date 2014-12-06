<?php
$name = "Pesho";
$phoneNum = "0884-888-888";
$age = 67;
$address = "Suhata Reka";
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Table</title>
</head>
<body>
<table>
    <tbody>
    <tr>
        <td class="bold">Name</td>
        <td> <?php echo $name ?></td>
    </tr>
    <tr>
        <td class="bold">Phone number</td>
        <td> <?php echo $phoneNum ?></td>
    </tr>
    <tr>
        <td class="bold">Age</td>
        <td> <?php echo $age ?></td>
    </tr>
    <tr>
        <td class="bold">Address</td>
        <td> <?php echo $address ?></td>
    </tr>
    </tbody>
</table>
</body>
</html>