<?php
    session_start();
    include('server.php');
    /*echo("<script type='text/javascript'> console.log($doctorID);</script>");
    echo("<script type='text/javascript'> console.log($ACategory);</script>");*/
    
    if(isset($_POST['shipEdit'])) {
        $userID = $_SESSION['username'];

        $Tracking = mysqli_real_escape_string($conn, $_POST['Tracking']);
        $TrackingStatus = mysqli_real_escape_string($conn, $_POST['Status']);

        $trackEdit = "UPDATE dispense SET TrackingStatus='$TrackingStatus' WHERE Tracking='$Tracking'";

        if(mysqli_query($conn, $trackEdit)=== TRUE){
            
            
            $_SESSION['username'] = $userID;
            $_SESSION['success'] = "Tracking Update Successfully!";
            header('location: ship.php');
        }else{
            //array_push($errors, "Data invalid");
            $_SESSION['error'] = "Data invalid";
            header('location: index.php');
        }
        
    }