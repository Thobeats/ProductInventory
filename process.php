<?php 

use App\Product;
use App\Database;
use App\Helper;

require_once realpath("vendor/autoload.php");


$helper = new Helper();

$type = $_GET['type'];
$symbol = $_GET['symbol'];
$name = $_GET['name'];
$sku = $_GET['sku'];
$price = $_GET['price'];
$type_value = $helper->setTypeValue($type);

//echo $type_value;

$product = new Product($type,$symbol);
$database = new Database();
$link = $database->connect();

$product->setName($name);
$product->setPrice($price);
$product->setValue($type_value);
$product->setSku($link, $sku);

$helper->checkError(empty($product->errors), $link);

$res = $product->insert($link); 

$product->close($link);   

echo $res;
?>
