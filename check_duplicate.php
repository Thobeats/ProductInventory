<?php

use App\Product_control;
use App\Database;

require_once realpath("vendor/autoload.php");

$product_control = new Product_control();
$database = new Database();
$link = $database->connect();

$sku = $_GET['sku'];
$data = $product_control->check_sku($link, $sku);

echo $data;

?>