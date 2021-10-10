<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "opeope_db";

    //create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //check cennection
    if(!$conn){
        die("connection failed".mysqli_connect_error());
    }else{
        echo "";
    }
?>