<?php
namespace App;
use App\Product;



class Furniture extends Product{
    public $type = 'Dimension';


    public function __construct($furnitureName){
        parent::__construct($furnitureName);
    }

    // public function insert(){
    //     $name = $this->productName;
    //     $dimension = $this->dimension;
    //     $sku = $this->productSku;
    //     $price = $this->productPrice;
    //     $type = $this->type;

    //     // mysqli_query($link, "INSERT INTO `products`(`product_name`, `product_price`, `product_sku`, `type_value`,`type`, `symbol`) VALUES ('$name','$price','$sku','$dimension','$type', ' ')");
        
    //     if(mysqli_query($this->link, "INSERT INTO `products`(`product_name`, `product_price`, `product_sku`, `type_value`,`type`, `symbol`) VALUES ('$name','$price','$sku','$dimension','$type', ' ')")){
    //         return 1;
    //       }else{
    //         return mysqli_error($this->link);
    //       }
    // }

    public function setDimension(){
     $this->productValue = $_GET['height'] . "X" . $_GET['length'] . "X" . $_GET['width'];
    }
    
}






?>