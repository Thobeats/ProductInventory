<?php 

use App\Book;
use App\Database;

require_once realpath("vendor/autoload.php");


$name = $_GET['name'];
$sku = $_GET['sku'];
$weight = $_GET['weight'];
$price = $_GET['price'];


$book = new Book($sku,$weight,$name,$price);
$database = new Database();
$link = $database->connect();

$book->insert($link);

$book->close($link);


?>
