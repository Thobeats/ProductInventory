<?php

namespace App;

class Database{
    public $host;
    public $username;
    public $password;
    public $database;

    public function __construct($host, $username, $password, $database){
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function connect(){
       $con = mysqli_connect($this->host, $this->username, $this->password, $this->database);

      return $con;
          
    }


    

}


?>