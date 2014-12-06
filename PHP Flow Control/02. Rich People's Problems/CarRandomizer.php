<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Rich People’s Problems</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
<form action="" method="post">
<label for="inputCars">Enter cars</label>
<input type="text" id="inputCars" name="input"/>
<input type="submit" name="submit" value="Show cars"/>
</form>
<?php

if (isset($_POST['submit'])&& !empty($_POST["input"])):
$arrCars = explode(", ", $_POST['input']);
$colors = ["black", "white", "orange", "red", "green", "blue", "silver", "yellow", "pink"];?>

<table>
    <thead>
    <tr>
        <th>Car</th>
        <th>Color</th>
        <th>Count</th>
    </tr>
    </thead>
    <tbody>
    <?php for ($i = 0; $i < count($arrCars); $i++) :?>
        <tr>
            <td><?php echo $arrCars[$i]?></td>
            <td><?php echo $colors[array_rand($colors)] ?></td>
            <td><?php echo rand(1, 5)?></td>
        </tr>
    <?php endfor?>
    </tbody>
</table>
<?php endif?>

</body>
</html>