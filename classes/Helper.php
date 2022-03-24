<?php

namespace App;


class Helper{
    
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