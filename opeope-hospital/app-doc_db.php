<?php
    session_start();
    include('server.php');
    /*echo("<script type='text/javascript'> console.log($doctorID);</script>");
    echo("<script type='text/javascript'> console.log($ACategory);</script>");*/
    
    if(isset($_POST['appointment'])) {
        $doctorID = $_SESSION['username'];

        $userID = mysqli_real_escape_string($conn, $_POST['userID']);
        $ACategory = mysqli_real_escape_string($conn, $_POST['ACategory']);
        $ADescription = mysqli_real_escape_string($conn, $_POST['ADescription']);
        $ADate = mysqli_real_escape_string($conn, $_POST['ADate']);
        $ReserveDate = mysqli_real_escape_string($conn, $_POST['ReserveDate']);
        $sql1 = "SELECT * FROM Userdb WHERE userID='$userID'";
        $sql_query = mysqli_query($conn, $sql1);
        $patientData = mysqli_fetch_assoc($sql_query);

        if($patientData){
            $hospitalNum = $patientData['hospitalNum'];
            $citizenID = $patientData['citizenID'];
            $History = $ADate. " ที่ : " .$ACategory." By Doctor : ".$_SESSION['username']." Description : ".$ADescription." : ".$ReserveDate;
            $AStatus = "นัดหมาย";

            $insertData = "INSERT INTO Appointment (hospitalNum, ACategory, ADescription, ADate, ReserveDate, citizenID, History, AStatus, doctorID) VALUES ('$hospitalNum','$ACategory', '$ADescription', '$ADate', '$ReserveDate', '$citizenID', '$History', '$AStatus', '$doctorID')";
            mysqli_query($conn,$insertData);
            
            $_SESSION['username'] = $doctorID;
            $_SESSION['success'] = "Appointment Successfully!";
            header('location: app.php');
        }else{
            //array_push($errors, "Data invalid");
            $_SESSION['error'] = "Data invalid";
            header('location: index.php');
        }
        //$insertData = "INSERT INTO Appointment (hospitalNum, ACategory, ADescription, ADate, ReserveDate, citizenID, History, AStatus, doctorID) VALUES ('$hospitalNum','$ACategory', '$ADescription', '$ADate', '$ReserveDate', '$citizenID', '$History', '$AStatus', '$doctorID')";
        
    }