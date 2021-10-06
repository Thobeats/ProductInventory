<?php 

use App\Product_control;
use App\Database;

require_once realpath("vendor/autoload.php");

$product_control = new Product_control();
$database = new Database();
$link = $database->connect();

$data = $product_control->get_products($link);

echo json_encode($data);




?>