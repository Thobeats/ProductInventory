<?php 

use App\Product_control;
use App\Database;

require_once realpath("vendor/autoload.php");

$idData = $_POST['delete'];
$values = [];
$product_control = new Product_control();
$database = new Database();
$link = $database->connect();

foreach($idData as $id){
    $value = $id['value'];

    $values[] = $value;
}

$product_control->delete_products($link, $values);




?>