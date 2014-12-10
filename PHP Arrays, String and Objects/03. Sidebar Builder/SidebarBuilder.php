<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Sidebar Builder</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
<form action="" method="post">
    <label for="categories">Categories:</label>
    <input type="text" name="categories" id="categories"/><br/>

    <label for="tags">Tags:</label>
    <input type="text" name="tags"  id="tags"/><br/>

    <label for="months">Months:</label>
    <input type="text" name="months" id="months"/><br/>

    <input type="submit" name="submit" value="Generate"/>
</form>

<?php

function createArticle($array, $header) {
?>
<article>
<header>
    <h1><?php echo $header?></h1>
</header>
    <ul>
        <?php for ($i = 0; $i < count($array); $i++): ?>
        <li>
            <?php echo htmlspecialchars($array[$i]);?>
        </li><?php endfor ?>
</ul>
</article>
<?php } ?>

<?php
if (isset($_POST['submit']) && !empty($_POST['categories']) && !empty($_POST['tags']) && !empty($_POST['months'])) {
    $categories = $_POST['categories'];
    $tags = $_POST['tags'];
    $months = $_POST['months'];

    $pattern = "/[, ]+/";

    $categories = preg_split($pattern, $categories, -1, PREG_SPLIT_NO_EMPTY);
    $tags = preg_split($pattern, $tags, -1, PREG_SPLIT_NO_EMPTY);
    $months = preg_split($pattern, $months, -1, PREG_SPLIT_NO_EMPTY);

    createArticle($categories, "Categories");
    createArticle($tags, "Tags");
    createArticle($months, "Months");
}
?>
</body>
</html>