<?php

    require_once("connection.php");

    //total users
    $sql = "SELECT* FROM login";
    $result = $conn->query($sql);
  
    $TotalUsers=$result->num_rows;
    
    //echo $TotalUsers;
   
//officers
    $sql = "SELECT* FROM login WHERE userCategory='Officer'";
    $result = $conn->query($sql);
    
    $Officers=$result->num_rows;
    
    //echo $Officers;
//customers
    $sql = "SELECT* FROM login WHERE userCategory='Customer'";
    $result = $conn->query($sql);
    
    $Customers=$result->num_rows;
    
    //echo $Customers;
//cc  
    $sql = "SELECT* FROM login WHERE userCategory='Cash Collector'";
    $result = $conn->query($sql);
    
    $CC=$result->num_rows;
    
    //echo $CC;

//Activated...
    $sql = "SELECT* FROM login WHERE Activated='Y'";
    $result = $conn->query($sql);
    
    $Active=$result->num_rows;
    //echo $Active;
    $ActivePer=$Active/$TotalUsers;
    $ActPercentage=round($ActivePer*100,1);
    //echo $ActivePer*100;
    //echo $ActPercentage;

?>