<?php
    namespace App;
    use App\Database;


    
    class Product extends Database{

        public $productName;
        protected $productPrice;
        public $productTypeValue;
        public $errors = [];
        protected $productSku;
        public $link;
        
        public function __construct($name = null){
          if($name != null){
            $this->productName = $name;
          }
            
            $this->link = parent::connect();
            //$this->productPrice = $price;
        }

        // public function insert(){
        //     $name = $this->productName;
        //     $type_value = $this->productTypeValue;
        //     $sku = $this->productSku;
        //     $price = $this->productPrice;
        //     $type = $this->productType;
        //     $symbol = $this->productSymbol;
    
        //     if(mysqli_query($this->link, "INSERT INTO `products`(`product_name`, `product_price`, `product_sku`, `type_value`,`type`, `symbol`) VALUES ('$name','$price','$sku','$type_value', '$type', '$symbol')")){
        //       return 1;
        //     }else{
        //       return 0;
        //     }
               
        // }

        public function getByType($type){
          return mysqli_query($this->link,"select * from products where type = '$type'");
        }

        public function setName($x){
            $check = preg_match("/^$|[^A-Za-z 0-9]/", $x);

            $options = [ "1" => function($x){
                            $this->errors[] = 1;
                            return "Invalid Characters for name";
                          },
                        "0" => function($x){
                            $this->productName = $x;
                          }
                        ];
            
            $options[$check]($x);
        }

        public function setPrice($x){
            $check = preg_match("/^$|[^0-9]/", $x);

            $options = [ "1" => function($x){
                            $this->errors[] = 1;
                            return "Invalid characters for price";
                          },
                        "0" => function($x){
                            $this->productPrice = $x;
                          }
                        ];
            
            $options[$check]($x);

        }

        public function setValue($x){
            $check = preg_match("/[^0-9^X^\s]/", $x);

            $options = [ "1" => function($x){
                          $this->errors[] = 1;

                            return "Invalid characters for value";
                          },
                        "0" => function($x){
                            $this->productTypeValue = $x;
                          }
                        ];
            
            $options[$check]($x);

        }

        public function setSku($x){

          $check = $this->check_sku($x);

          $options = [ "1" => function($x){
            $this->errors[] = 1;

              return "SKU Exists";
            },
          "0" => function($x){
              $this->productSku = $x;
            }
          ];

          $options[$check]($x);

        //  var_dump($check);
        }

     
        public function get_products(){
            $collect = [];
            $query = mysqli_query($this->link, "select * from products");
        
            while($data = mysqli_fetch_assoc($query)){
                $collection = [];
    
                $collection["name"] = $data["product_name"];
                $collection['price'] = $data['product_price'];
                $collection['id'] = $data['id'];
                $collection['sku'] = $data['product_sku'];
                $collection['type'] = $data['type'];
                $collection['type_value'] = $data['type_value'];
                $collection['symbol'] = $data['symbol'];
    
                $collect[] = $collection;
            }
        
            return $collect;
        }
  
      public function delete_products($ids){
  
          foreach($ids as $id){
              mysqli_query($this->link, "delete from products where id = '$id'");
          }
  
      }
  
      public function check_sku($sku){
         $check = mysqli_query($this->link,"select * from products where product_sku = '$sku'");
        return mysqli_fetch_assoc($check) != "" ? mysqli_num_rows($check) : 0;
        
      }
      
      public function close(){
        mysqli_close($this->link);
      }

    }
?>