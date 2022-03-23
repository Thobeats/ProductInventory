<?php

use App\Product;
use App\Database;

require_once realpath("vendor/autoload.php");

$product = new Product();

$sku = $_GET['sku'];
$data = $product->check_sku($sku);

echo $data;

?>