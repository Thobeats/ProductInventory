<?php 

use App\Book;
use App\Database;

require_once realpath("vendor/autoload.php");


$name = $_GET['name'];
$sku = $_GET['sku'];
$weight = $_GET['weight'];
$price = $_GET['price'];


$book = new Book($sku,$weight,$name,$price);
$database = new Database("eu-cdbr-west-01.cleardb.com","bd1a69e060a62b","73b0f3da","heroku_77923308437b88f");
$link = $database->connect();

$book->insert($link);

$book->close($link);


?>
