<?php
    session_start();
    include('server.php');
    /*echo("<script type='text/javascript'> console.log($doctorID);</script>");
    echo("<script type='text/javascript'> console.log($ACategory);</script>");*/
    
    if(isset($_POST['medicine'])) {
        $DoctorID = $_SESSION['username'];
        $PatientID = mysqli_real_escape_string($conn, $_POST['PatientID']);

        $MedicineID = mysqli_real_escape_string($conn, $_POST['MedicineID']);
        $Description = mysqli_real_escape_string($conn, $_POST['Description']);

        $Tracking = "TH".rand();
        $TrackingStatus = "P";

        $sql1 = "SELECT * FROM Userdb WHERE userID='$DoctorID'";
        $sql_query = mysqli_query($conn, $sql1);
        $doctorMedi = mysqli_fetch_assoc($sql_query);

        if($doctorMedi){
            $insertData = "INSERT INTO Dispense (PatientID, DoctorID, Description , MedicineID, Tracking, TrackingStatus) VALUES ('$PatientID', '$DoctorID', '$Description', '$MedicineID', '$Tracking', '$TrackingStatus')";
            mysqli_query($conn,$insertData);
            
            $_SESSION['username'] = $DoctorID;
            $_SESSION['success'] = "Ordered Successfully!";
            header('location: med.php');
        }else{
            //array_push($errors, "Data invalid");
            $_SESSION['error'] = "Data invalid";
            header('location: index.php');
        }
        
    }