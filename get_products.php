<?php 

use App\Product;
use App\Database;

require_once realpath("vendor/autoload.php");

$products = new Product();

$data = $products->get_products();

echo json_encode($data);




?>