<?php

namespace App;


class Product_control {

    public function get_products($link,$type){
        $collection = [];
        $query = mysqli_query($link, "select * from products where type= '$type'");
    
        while($data = mysqli_fetch_assoc($query)){
            $collection[] = $data;
        }
    
        return $collection;
    }

    public function delete_products($link, $ids){

        foreach($ids as $id){
            mysqli_query($link, "delete from products where id = '$id'");
        }

    }
}



?>