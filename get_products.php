<?php 

use App\Product_control;
use App\Database;

require_once realpath("vendor/autoload.php");

$type = $_GET['type'];

$product_control = new Product_control();
$database = new Database("127.0.0.1","root","","test");
$link = $database->connect();

$data = $product_control->get_products($link, $type);

echo json_encode($data);




?>