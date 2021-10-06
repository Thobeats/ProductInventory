<?php

namespace App;


class Product_control {

    public function get_products($link){
        $collection = [];
        $query = mysqli_query($link, "select * from products");
    
        while($data = mysqli_fetch_assoc($query)){
            $collection["name"] = $data["product_name"];
            $collection['price'] = $data['product_price'];
            $collection['id'] = $data['product_id'];
            $collection['sku'] = $data['product_sku'];
            $collection['type'] = $data['type'];
            $collection['type_value'] = $data['type_value'];
            $collection['symbol'] = $data['symbol'];
        }
    
        return $collection;
    }

    public function delete_products($link, $ids){

        foreach($ids as $id){
            mysqli_query($link, "delete from products where product_id = '$id'");
        }

    }
}



?>