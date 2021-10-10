<?php 
    session_start();
    include('server.php');

    $errors = array();

    if(isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $citizenID = mysqli_real_escape_string($conn, $_POST['citizenID']);
        $userType = mysqli_real_escape_string($conn, $_POST['userType']);

        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $birthDate = mysqli_real_escape_string($conn, $_POST['birthDate']);
        $age = date_diff(date_create($birthDate), date_create('now'))->y;
        $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
        $tel = mysqli_real_escape_string($conn, $_POST['tel']);
        //Address
        $HouseNum = mysqli_real_escape_string($conn, $_POST['HouseNum']);
        $Street = mysqli_real_escape_string($conn, $_POST['Street']);
        $SubDistrict = mysqli_real_escape_string($conn, $_POST['SubDistrict']);
        $District = mysqli_real_escape_string($conn, $_POST['District']);
        $Province = mysqli_real_escape_string($conn, $_POST['Province']);
        $PostalCode = mysqli_real_escape_string($conn, $_POST['PostalCode']);

        if ($password === NULL){
            array_push($errors, "The two passwords do not match");
        }

        $user_check_query = "SELECT * FROM Userdb WHERE userID = '$username' OR email = '$email' OR citizenID = '$citizenID' ";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if($result){ // if user exists
            if ($result['username'] === $username){
                array_push($errors, "Username already exists");
            }
            if ($result['email'] === $email){
                array_push($errors, "Email already exists");
            }
            if ($result['citizenID'] === $citizenID){
                array_push($errors, "Citizen ID already exists");
            }

        }

        if (count($errors)==0){
            $password = md5($password);
            //personal

            $sql = "INSERT INTO Userdb (userType, userID, email, password, citizenID, firstName, lastName, gender, birthDate, age, nationality, tel) VALUES ('$userType','$username', '$email', '$password', '$citizenID', '$firstName', '$lastName', '$gender', '$birthDate', '$age', '$nationality', '$tel')";
            mysqli_query($conn,$sql);

            $id_user = "SELECT * FROM Userdb WHERE userID = '$username'";
            $id_query = mysqli_query($conn, $id_user);
            $idx = mysqli_fetch_assoc($id_query);

            $hospitalNum;

            if($idx){
                $hospitalNum = $idx['hospitalNum'];
            }else{
                $hospitalNum = NULL;
            }
            
            $sqlAddr = "INSERT INTO addressdb (hospitalNum, HouseNum, Street, SubDistrict, District, Province, PostalCode) VALUES ('$hospitalNum', '$HouseNum', '$Street', '$SubDistrict', '$District', '$Province', '$PostalCode')";
            //$sqlAddr = "INSERT INTO addressdb (hospitalNum, HouseNum, Street, SubDistrict, District, Province, PostalCode) VALUES ('$hospitalNum', '$HouseNum', '$Street', '$SubDistrict', '$District', '$Province', '$PostalCode')";
            mysqli_query($conn,$sqlAddr);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        } else {
            array_push($errors, "Username or Email already exists");
            $_SESSION['error'] = "Username or Email already exists";
            header("location: login.php");
        }

    }

?>