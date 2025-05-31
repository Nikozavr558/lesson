<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title> Just search query</title>
</head>
<body>
<h1> You must search the query</h1>

<form action="search.php" method="get">
    <label for="query">Search:</label><br>
    <input type="text" id="query" name="query"><br>
    <input type="submit" value="search">
</form>
<?php
if($_SERVER["REQUEST_METHOD"] == "GET"){
    $query = $_GET["query"];
    echo "Ты искал:" . $query;
}
?>
</body>
</html>
