<?php
namespace App;
use App\Product;



class Furniture extends Product{
    public $sku;
    public $dimension;
    public $type = 'Dimension';


    // public function __construct($sku,$length, $width, $height,$furnitureName, $furniturePrice){
    //     parent::__construct($furnitureName, $furniturePrice);
    //     $this->dimension = "$length x $width x $height";
    //     $this->sku = "FUR" . $sku;
    // }

    public function insert($link){
        $name = $this->productName;
        $dimension = $this->dimension;
        $sku = $this->sku;
        $price = $this->productPrice;
        $type = $this->type;

        mysqli_query($link, "INSERT INTO `products`(`product_name`, `product_price`, `product_sku`, `type_value`,`type`, `symbol`) VALUES ('$name','$price','$sku','$dimension','$type', ' ')");
        
    }

    public function get($link){
        return mysqli_query($link, "select * from products where type = 'furniture'");
    }

    public function close($link){
        mysqli_close($link);
    }
}






?>