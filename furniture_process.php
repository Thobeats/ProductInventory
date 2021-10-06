<?php 

use App\Furniture;
use App\Database;

require_once realpath("vendor/autoload.php");


$name = $_GET['name'];
$sku = $_GET['sku'];
$price = $_GET['price'];
$length = $_GET['length'];
$width = $_GET['width'];
$height = $_GET['height'];



$furniture = new Furniture($sku,$length,$width,$height,$name,$price);
$database = new Database();
$link = $database->connect();

$furniture->insert($link);

$furniture->close();


?>
