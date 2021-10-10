<?php
    session_start();
    include('server.php');
    /*echo("<script type='text/javascript'> console.log($doctorID);</script>");
    echo("<script type='text/javascript'> console.log($ACategory);</script>");*/
    
    if(isset($_POST['shipAccecpt'])) {
        $userID = $_SESSION['username'];

        $Tracking = mysqli_real_escape_string($conn, $_POST['Tracking']);
        $TrackingStatus = mysqli_real_escape_string($conn, $_POST['Status']);

        if($TrackingStatus === 'S'){
            $trackEdit = "UPDATE dispense SET TrackingStatus='D' WHERE Tracking='$Tracking'";
            $_SESSION['username'] = $userID;
            $_SESSION['success'] = "Tracking Update Successfully!";
            header('location: ship-pat.php');
        }else{
            //array_push($errors, "Data invalid");
            $_SESSION['error'] = "Data invalid";
            header('location: index.php');
        }
    }