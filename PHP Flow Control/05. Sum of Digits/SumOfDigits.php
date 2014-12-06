<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Sum of Digits</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
<form action="" method="post">
    <label for="input">Input string</label>
    <input type="text" id="input" name="inputList"/>

    <input type="submit" name="submit" value="Submit"/>
</form>

<?php
if (isset($_POST['submit']) && !empty($_POST["inputList"])):
$input =  explode(", ", $_POST['inputList']);
?>

<table>
    <?php for ($i = 0; $i < count($input); $i++): ?>
        <tr>
            <td>
                <?php echo $input[$i] ?>
            </td>
            <td>
                <?php
                if (is_numeric($input[$i])){
                    echo array_sum(str_split($input[$i]));
                } else{
                    echo "I cannot sum that";
                }
                ?>
            </td>
        </tr>
    <?php endfor ?>
</table>
<?php endif ?>
</body>
</html>