<?php
$text = $_GET['list'];
$minPrice = $_GET['minPrice'];
$maxPrice = $_GET['maxPrice'];
$type = $_GET['filter'];
$order = $_GET['order'];

$productLines = preg_split("/[\r\n]+/", $text, -1, PREG_SPLIT_NO_EMPTY);

$products = [];
$id = 1;

foreach ($productLines as $productLine) {
    $productData = explode(" | ", $productLine);
    $name = $productData[0];
    $productType = $productData[1];
    $components = explode(", ", $productData[2]);
    $price = floatval($productData[3]);

    $data = [
        "name" => $name,
        "type" => $type,
        "components" => $components,
        "price" => $price,
        "id" => $id
    ];

    if ($price >= $minPrice && $price <= $maxPrice && ($productType == $type || $type == "all")){
        $products[] = $data;
    }

    $id++;
}

usort($products, function($el1, $el2) use ($order){

    if ($el1["price"] == $el2["price"]){
        return $el1["id"] - $el2["id"];
    }
    if ($order == "ascending"){
        return $el1["price"] > $el2["price"] ? 1 : -1;
    }else{
        return $el1["price"] < $el2["price"] ? 1 : -1;
    }
});

foreach ($products as $product) {
    echo renderHTML($product);
}

function renderHTML($product){
    $name = htmlspecialchars($product["name"]);
    $type = htmlspecialchars($product["type"]);
    $components = $product["components"];
    $price = number_format($product["price"], 2, '.', '');
    $id = $product["id"];

    $html = "";
    $html .= "<div class=\"product\" id=\"product$id\">";
    $html .= "<h2>$name</h2>";
    $html .= "<ul>";

    foreach ($components as $component) {
        $component = htmlspecialchars($component);
        $html .= "<li class=\"component\">$component</li>";
    }

    $html .= "</ul>";
    $html .= "<span class=\"price\">$price</span>";
    $html .= "</div>";

    return $html;
}
