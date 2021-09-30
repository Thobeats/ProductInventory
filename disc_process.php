<?php 

use App\Disc;
use App\Database;

require_once realpath("vendor/autoload.php");


$name = $_GET['name'];
$sku = $_GET['sku'];
$size = $_GET['size'];
$price = $_GET['price'];


$disc = new Disc($sku,$size,$name,$price);

//echo json_encode($disc);
$database = new Database("127.0.0.1","root","","test");
$link = $database->connect();

$disc->insert($link);

$disc->close();
?>
