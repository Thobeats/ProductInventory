<?php
namespace App;
use App\Product;



class Disc extends Product{
    public $sku;
    public $size;
    public $type = 'disc';


    public function __construct($sku,$size,$discName,$discPrice){
        parent::__construct($discName,$discPrice);
        $this->size = $size;
        $this->sku = "DSC" . $sku;
    }

    public function insert($link){
        $name = $this->productName;
        $size = $this->size;
        $sku = $this->sku;
        $price = $this->productPrice;
        $type = $this->type;

        mysqli_query($link, "INSERT INTO `products`(`product_name`, `product_price`, `product_sku`, `size`, `type`) VALUES ('$name','$price','$sku','$size', '$type')");
          
    }

    public function get($link){
        return mysqli_query($link, "select * from products where type = 'disc'");
    }

    public function close($link){
        mysqli_close($link);
    }
}






?>