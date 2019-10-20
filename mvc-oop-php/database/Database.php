<?php

class Database
{
  private  $servername = "localhost";
    private  $username = "root";
    private $password = "Om@123456";
    private  $mydb = "store";

 function connect(){
     try {
         $conn = new PDO("mysql:host=$this->servername;dbname=$this->mydb",$this->username,$this->password);
         // set the PDO error mode to exception
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         return $conn;
     }
     catch(PDOException $e)
     {
         return  "Connection failed: " . $e->getMessage();
     }
 }

}