<?php 

use App\Disc;
use App\Database;

require_once realpath("vendor/autoload.php");


$name = $_GET['name'];
$sku = $_GET['sku'];
$size = $_GET['size'];
$price = $_GET['price'];


$disc = new Disc($sku,$size,$name,$price);
$database = new Database();
$link = $database->connect();

$disc->insert($link);

$disc->close();
?>
