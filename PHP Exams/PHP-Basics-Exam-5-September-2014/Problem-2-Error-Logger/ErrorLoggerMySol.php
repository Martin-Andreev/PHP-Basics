<?php
$log = $_GET['errorLog'];

$pattern = '/Exception in thread \".+\" java.*\.(\w+)\: .*\s*at .+?\.(.+)\((.+)\:(\d+)\)/';

preg_match_all($pattern, $log, $matches, PREG_SET_ORDER);

echo "<ul>";
foreach ($matches as $match) {
    $name = htmlspecialchars($match[1]);
    $method = htmlspecialchars($match[2]);
    $file = htmlspecialchars($match[3]);
    $line = htmlspecialchars($match[4]);
    echo "<li>";
    echo "line <strong>$line</strong> - <strong>$name</strong> in <em>$file:$method</em>";
    echo "</li>";
}
echo "</ul>";