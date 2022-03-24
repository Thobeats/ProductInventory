<?php
namespace App;
use App\Product;



class Disc extends Product{
  public $type = 'Size';


    public function __construct($type,$discName){
      parent::__construct($discName);

      $this->productType = $type;
      $this->productSymbol = 'MB';
    }

    
    public  function setSize(){
      $size = $_GET['size'];
      $this->setValue($size);

  }

}






?>