<?php

namespace App;

class Database{
    

    protected $host;
    protected $username;
    protected $password;
    protected $database;


    public function connect(){
        // $this->host = "127.0.0.1";
        // $this->username = "root";
        // $this->password = "";
        // $this->database = "productInventory";

        $this->host = "eu-cdbr-west-01.cleardb.com";
        $this->username = "bd1a69e060a62b";
        $this->password = "6bb80c89df7a414";
        $this->database = "heroku_77923308437b88f";

       $con = mysqli_connect($this->host,$this->username, $this->password, $this->database);

       if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

      //mysqli_select_db($con, 'productInventory');
      
      return $con;
          
    }


    

}


?>