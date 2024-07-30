<?php
$products = [
    ["name" => "Laptop", "price" => 1000, "quantity" => 5],
    ["name" => "Mouse", "price" => 20, "quantity" => 50],
    ["name" => "Screen", "price" => 150, "quantity" => 0],
    ["name" => "Keyboard", "price" => 50, "quantity" => 30],
];
foreach ($products as $product) {
    if ($product ['quantity'] > 0) {
        echo sprintf("Product: %s, Price: %s, Quantyti: %s, Купи Сцука <br>",
            $product ["name"],
            $product ["price"],
            $product ["quantity"]);
    }
}