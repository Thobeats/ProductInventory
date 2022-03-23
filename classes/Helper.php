<?php

namespace App;


class Helper{
    
    public  function setSize(){
        return isset($_GET['size']) ? $_GET['size'] : '';
    }
    
    public function setDimension(){
        return isset($_GET['height']) ? $_GET['height'] . "X" . $_GET['length'] . "X" . $_GET['width'] : '';
    }

    public function setWeight(){
        return isset($_GET['weight']) ? $_GET['weight'] : '';
    }


    public function checkError($x){
        $option = ['0' => function(){ return exit("0"); } , "1" => function(){ return 1;  }];
    
        return $option[$x]();
    }

    public function setTypeValue($type){
        $type_value_array = array(
            'Weight' => $this->setWeight(),
            'Size' => $this->setSize(),
            'Dimension' => $this->setDimension()
        );
    
        return $type_value_array[$type];
    }

    



}








?>