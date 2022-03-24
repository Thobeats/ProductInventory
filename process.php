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


$classFunctionArray = [
    'Weight' => function (){
        $product = new Book($type_value, $name);
        $product->setWeight();
    },
    'Size' => function (){
        $product = new Disc($type_value, $name);
        $product->setSize();
    },
    'Dimension' => function(){
        $product = new Furniture($type_value, $name);
        $product->setDimension();
    }
];

$classFunctionArray[$type]();

// if($type == 'Weight'){
//     $product = new Book($type_value, $name);
// }

// if($type == 'Size'){
//     $product = new Disc($type_value, $name);
// }

// if($type == 'Dimension'){
//     $product = new Furniture($type_value, $name);
// }


$product->setName($name);
$product->setPrice($price);
$product->setValue($type_value);
$product->setSku($sku);

$product->checkError(empty($product->errors));

$res = $product->insert(); 

$product->close();   

echo $res;
?>
