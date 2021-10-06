<?php 

use App\Product_control;
use App\Database;

require_once realpath("vendor/autoload.php");

$type = $_GET['type'];

$product_control = new Product_control();
$database = new Database("eu-cdbr-west-01.cleardb.com","bd1a69e060a62b","73b0f3da","heroku_77923308437b88f");
$link = $database->connect();

$data = $product_control->get_products($link, $type);

echo json_encode($data);




?>