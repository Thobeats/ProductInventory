<?php
namespace App;
use App\Product;



class Furniture extends Product{
    public $type = 'Dimension';


    public function __construct($type,$furnitureName){
        parent::__construct($furnitureName);


        $this->productType = $type;
        $this->productSymbol = 'm3';
    }

    public function setDimension(){
     $dim = $_GET['height'] . "X" . $_GET['length'] . "X" . $_GET['width'];
     $this->setValue($dim);

    }
    
}






?>