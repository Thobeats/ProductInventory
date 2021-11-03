<?php
    namespace App;
    use App\Product_control;


    
    class Product extends Product_control{

        public $productName;
        public $productPrice;
        public $productSku;
        public $productType;
        public $productTypeValue;
        public $productSymbol;
        public $errors = [];
        
        public function __construct($type, $symbol){
            $this->productType = $type;
            $this->productSymbol = $symbol;
        }

        public function insert($link){
            $name = $this->productName;
            $type_value = $this->productTypeValue;
            $sku = $this->productSku;
            $price = $this->productPrice;
            $type = $this->productType;
            $symbol = $this->productSymbol;
    
            if(mysqli_query($link, "INSERT INTO `products`(`product_name`, `product_price`, `product_sku`, `type_value`,`type`, `symbol`) VALUES ('$name','$price','$sku','$type_value', '$type', '$symbol')")){
              return 1;
            }else{
              return 0;
            }
               
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

        public function setSku($link, $x){
          $check = $this->check_sku($link, $x);

          $options = [ "1" => function($x){
            $this->errors[] = 1;

              return "SKU Exists";
            },
          "0" => function($x){
              $this->productSku = $x;
            }
          ];

          $options[$check]($x);
        }

     

      
      public function close($link){
        mysqli_close($link);
      }

    }
?>