<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Square Root Sum</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>Number</th>
        <th>Square Root</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sum = 0;
    for ($i = 0; $i <= 100; $i += 2):
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td>
            <?php
            echo round(sqrt($i), 2);
            $sum += round(sqrt($i), 2);
            ?>
        </td>
    </tr>
    <?php endfor ?>
    </tbody>
    <tfoot>
    <tr>
        <td>Total:</td>
        <td><?php echo $sum; ?></td>
    </tr>
    </tfoot>
</table>
</body>
</html>