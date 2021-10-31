<?php 

use App\Product;
use App\Database;

require_once realpath("vendor/autoload.php");

function setWeight(){
    return $_GET['weight'];
}

function checkError($x, $link){

    $option = ['0' => function($link){ return exit("Error: Invalid Input"); } , "1" => function($link){ echo "Continue....";  }];

    return $option[$x]($link);
}

function setSize(){
    return $_GET['size'];
}

function setDimension(){
    return $_GET['height'] . "X" . $_GET['length'] . "X" . $_GET['width'];
}

function setTypeValue($type){
    $type_value_array = array(
        'Weight' => setWeight(),
        'Size' => setSize(),
        'Dimension' => setDimension()
    );

    return $type_value_array[$type];
}




//$type_value = "";
$type = $_GET['type'];
$symbol = $_GET['symbol'];
$name = $_GET['name'];
$sku = $_GET['sku'];
$price = $_GET['price'];
$type_value = setTypeValue($type);

//echo $type_value;

$product = new Product($type,$symbol);
$database = new Database();
$link = $database->connect();

$product->setName($name);
$product->setPrice($price);
$product->setValue($type_value);
$product->setSku($link, $sku);

checkError(empty($product->errors), $link);

$product->insert($link); 
$product->close($link);   
?>
