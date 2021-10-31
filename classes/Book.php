<?php

namespace App;
use App\Product;



class Book extends Product{
    public $sku;
    public $weight;
    public $type = 'Weight';
  

    // public function __construct($sku,$weight,$bookName,$bookPrice){
    //     parent::__construct($bookName, $bookPrice);
    //     $this->weight = $weight;
    //     $this->sku = "BOK" . $sku;
    // }

    public function insert($link){
        $name = $this->productName;
        $weight = $this->weight;
        $sku = $this->sku;
        $price = $this->productPrice;
        $type = $this->type;

        mysqli_query($link, "INSERT INTO `products`(`product_name`, `product_price`, `product_sku`, `type_value`,`type`, `symbol`) VALUES ('$name','$price','$sku','$weight', '$type', 'Kg')");
           
    }

    public function get($link){
        return mysqli_query($link,"select * from products where type = 'book'");
    }

    public function close($link){
        mysqli_close($link);
    }

    
}






?>