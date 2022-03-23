<?php 

use App\Product;
use App\Database;

require_once realpath("vendor/autoload.php");

$idData = $_POST['delete'];
$values = [];
$products = new Product();

foreach($idData as $id){
    $value = $id['value'];

    $values[] = $value;
}

$products->delete_products($values);




?>