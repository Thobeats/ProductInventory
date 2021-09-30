<?php
    namespace App;

    
    class Product {

        public $productName;
        public $productPrice;
        
        public function __construct($name, $price){
            $this->productName = $name;
            $this->productPrice = $price;
        }
    }
?>
