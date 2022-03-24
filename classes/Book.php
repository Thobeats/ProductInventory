<?php

namespace App;
use App\Product;



class Book extends Product{

    public function __construct($type,$bookName){
        parent::__construct($bookName);

        $this->productType = $type;
        $this->productSymbol = 'KG';
    }


    public function setWeight(){
      $weight = $_GET['weight'];
      $this->setValue($weight);
    }
 

    
}






?>