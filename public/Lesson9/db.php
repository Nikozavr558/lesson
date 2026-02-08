<?php
try {
    $db = new PDO("mysql:host=lesson-db;dbname=laravel", "laravel", "secret");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
echo "Запустилось все!";
?>