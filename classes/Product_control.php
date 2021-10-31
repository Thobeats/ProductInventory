<?php

namespace App;
use App\Product_control;


class Product_control {

    public function get_products($link){
        $collect = [];
        $query = mysqli_query($link, "select * from products");
    
        while($data = mysqli_fetch_assoc($query)){
            $collection = [];

            $collection["name"] = $data["product_name"];
            $collection['price'] = $data['product_price'];
            $collection['id'] = $data['product_id'];
            $collection['sku'] = $data['product_sku'];
            $collection['type'] = $data['type'];
            $collection['type_value'] = $data['type_value'];
            $collection['symbol'] = $data['symbol'];

            $collect[] = $collection;
        }
    
        return $collect;
    }

    public function delete_products($link, $ids){

        foreach($ids as $id){
            mysqli_query($link, "delete from products where product_id = '$id'");
        }

    }

    public function check_sku($link, $sku){
       $check = mysqli_query($link,"select * from products where product_sku = '$sku'");
       return mysqli_num_rows($check);
    }
}



?>