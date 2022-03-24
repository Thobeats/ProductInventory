<?php 

use App\Product;
use App\Helper;
use App\Disc;
use App\Book;
use App\Furniture;

require_once realpath("vendor/autoload.php");


$type = $_GET['type'];
$symbol = $_GET['symbol'];
$name = $_GET['name'];
$sku = $_GET['sku'];
$price = $_GET['price'];

$product = "";


$classFunctionArray = [
    'Weight' => function ($type,$name){
        $product = new Book($type,$name);
        $product->setWeight();

        return $product;
    },
    'Size' => function ($type,$name){
        $product = new Disc($type,$name);
        $product->setSize();

        return $product;
    },
    'Dimension' => function($type,$name){
        $product = new Furniture($type,$name);
        $product->setDimension();

        return $product;
    }
];

$product = $classFunctionArray[$type]($type,$name);

// if($type == 'Weight'){
//     $product = new Book($type_value, $name);
// }

// if($type == 'Size'){
//     $product = new Disc($type_value, $name);
// }

// if($type == 'Dimension'){
//     $product = new Furniture($type_value, $name);
// }


$product->setPrice($price);
$product->setSku($sku);

$product->checkError(empty($product->errors));

$res = $product->insert(); 

$product->close();   

echo $res;
?>
