<?php

$products = [
    ["name" => "Gold", "price" => 300, "available" => 10],
    ["name" => "silver", "price" => 100, "available" => 0],
    ["name" => "copper", "price" => 30, "available" => 100],
    ["name" => "black metal", "price" => 5, "available" => 5000],
];

foreach ($products as $product) {
        $name = $product["name"];
        $price = $product["price"];
        $available = $product["available"];
        if ($available > 0) {
            echo "$name, Price: $price, Available: $available <br>";
        }
}



