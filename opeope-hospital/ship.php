<?php

    session_start();
    include('server.php');

    $user = $_SESSION['username'];
    $app_query = "SELECT userType FROM Userdb WHERE userID= '$user'";
    $query = mysqli_query($conn, $app_query);
    $result = mysqli_fetch_assoc($query);
    if($result){
        if($result['userType']==="1"){
            header('location: ship-doc.php');
        }else if($result['userType']==="0"){
            header('location: ship-pat.php');
        }
    }else{
        header('location: index.php');
    }

?>