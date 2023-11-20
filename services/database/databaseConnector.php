<?php

class DatabaseConnector{
    
    public function connect()
    {
        $dbHost = 'localhost:3306';
        $dbUsername = 'root';
        $dbPassword = '2530';
        $dbName = 'mix_canvas';
    
        $dbConnect = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
        return $dbConnect;
    
    }
    
    
    public function disconnect(){
        return mysqli_close($this->connect());
    }
    
}


?>