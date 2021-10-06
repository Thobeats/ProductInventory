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
$database = new Database("eu-cdbr-west-01.cleardb.com","bd1a69e060a62b:73b0f3da","73b0f3da","heroku_77923308437b88f");
$link = $database->connect();

$furniture->insert($link);

$furniture->close();


?>
