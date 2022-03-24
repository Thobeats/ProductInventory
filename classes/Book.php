<?php

namespace App;
use App\Product;



class Book extends Product{
    public $type = 'Weight';
  

    public function __construct($bookName){
        parent::__construct($bookName);
    }


    // public function insert(){
    //     $name = $this->productName;
    //     $weight = $this->weight;
    //     $sku = $this->productSku;
    //     $price = $this->productPrice;
    //     $type = $this->type;

    //    // mysqli_query($this->link, "INSERT INTO `products`(`product_name`, `product_price`, `product_sku`, `type_value`,`type`, `symbol`) VALUES ('$name','$price','$sku','$weight', '$type', 'Kg')");

    //          if(mysqli_query($this->link, "INSERT INTO `products`(`product_name`, `product_price`, `product_sku`, `type_value`,`type`, `symbol`) VALUES ('$name','$price','$sku','$weight', '$type', 'KG')")){
    //           return 1;
    //         }else{
    //           return mysqli_error($this->link);
    //         }
           
    // }

    public function setWeight(){
      $this->productValue = $_GET['weight'];
    }
 

    
}






?>