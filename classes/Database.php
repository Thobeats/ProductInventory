<?php

namespace App;

class Database{
    public $host = "eu-cdbr-west-01.cleardb.com";
    public $username = "bd1a69e060a62b";
    public $password = "73b0f3da";
    public $database = "heroku_77923308437b88f";

    // public function __construct($host, $username, $password, $database){
    //     $this->host = $host;
    //     $this->username = $username;
    //     $this->password = $password;
    //     $this->database = $database;
    // }

    public function connect(){
       $con = mysqli_connect($this->host, $this->username, $this->password, $this->database);

      return $con;
          
    }


    

}


?>