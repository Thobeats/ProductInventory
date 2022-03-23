<?php
namespace App;
use App\Product;



class Disc extends Product{
    private $sku;
    public $size;
    public $type = 'Size';


    public function __construct($size,$discName){
        parent::__construct($discName);
        $this->size = $size;
    }

    public function insert($link){
        $name = $this->productName;
        $size = $this->size;
        $sku = $this->productSku;
        $price = $this->productPrice;
        $type = $this->type;

        // mysqli_query($link, "INSERT INTO `products`(`product_name`, `product_price`, `product_sku`, `type_value`, `type`, `symbol`) VALUES ('$name','$price','$sku','$size', '$type', 'MB')");

        if(mysqli_query($link, "INSERT INTO `products`(`product_name`, `product_price`, `product_sku`, `type_value`, `type`, `symbol`) VALUES ('$name','$price','$sku','$size', '$type', 'MB')")){
            return 1;
          }else{
            return 0;
          }
          
    }

}






?>