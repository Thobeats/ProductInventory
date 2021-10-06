<?php 

use App\Disc;
use App\Database;

require_once realpath("vendor/autoload.php");


$name = $_GET['name'];
$sku = $_GET['sku'];
$size = $_GET['size'];
$price = $_GET['price'];


$disc = new Disc($sku,$size,$name,$price);
$database = new Database("eu-cdbr-west-01.cleardb.com","bd1a69e060a62b","73b0f3da","heroku_77923308437b88f");
$link = $database->connect();

$disc->insert($link);

$disc->close();
?>
