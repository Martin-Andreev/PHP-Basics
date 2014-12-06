<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>Get Form Data</title>
</head>
<body>
<main>
    <form id="form" action="GetFormData.php" method="get">
        <input type="text" name="name" placeholder="Name.." style="margin-bottom: 5px"> <br>
        <input type="number" name="age" placeholder="Age.." style="margin-bottom: 5px"> <br>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br>
        <input type="submit" value="Submit" name="submitInput" style="margin-top: 5px"> <br>
    </form>
</main>
</body>
</html>

<?php if (isset($_GET["name"], $_GET["age"], $_GET["gender"])): ?>
    My name is <?php echo htmlentities($_GET["name"]) ?>. I am <?php echo htmlentities($_GET["age"]) ?> years old.
    I am <?php echo $_GET["gender"] ?>.
<?php endif; ?>