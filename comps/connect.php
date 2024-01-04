<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $data = "foroums";
    //create data base conn
    $con = mysqli_connect($server,$username, $password,$data);
    if(!$con){
        die("error");
    }
    
?>