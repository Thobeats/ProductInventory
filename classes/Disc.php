<?php
namespace App;
use App\Product;



class Disc extends Product{
  public $type = 'Size';


    public function __construct($discName){
      parent::__construct($discName);
    }

    // public function insert(){
    //     $name = $this->productName;
    //     $size = $this->size;
    //     $sku = $this->productSku;
    //     $price = $this->productPrice;
    //     $type = $this->type;

    //     // mysqli_query($link, "INSERT INTO `products`(`product_name`, `product_price`, `product_sku`, `type_value`, `type`, `symbol`) VALUES ('$name','$price','$sku','$size', '$type', 'MB')");

    //     if(mysqli_query($this->link, "INSERT INTO `products`(`product_name`, `product_price`, `product_sku`, `type_value`, `type`, `symbol`) VALUES ('$name','$price','$sku','$size', '$type', 'MB')")){
    //         return 1;
    //       }else{
    //         return mysqli_error($this->link);
    //       }
          
    // }


    public  function setSize(){
      $this->productValue = $_GET['size'];
  }

}






?>