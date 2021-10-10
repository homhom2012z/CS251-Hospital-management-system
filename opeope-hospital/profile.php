<?php 
     session_start();
     if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }
?>
<?php
    include('server.php');
    $sql1 = $_SESSION['username'];
    $sql2 = "SELECT * FROM Userdb WHERE userID='$sql1'";
    $dataQuery1 = $conn->query($sql2);

    $userData = $dataQuery1->fetch_assoc();

    $addrID = $userData['hospitalNum'];

    $sql3 = "SELECT * FROM addressdb WHERE hospitalNum ='$addrID'";
    $dataQuery2 = $conn->query($sql3);
    $addrData = $dataQuery2->fetch_assoc();

    $age = date_diff(date_create($userData['birthDate']), date_create('now'))->y;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="profile" content="width=device-width, initial-scale=1">
    <title>OPE OPE Hospital</title>
    <link rel="shortcut icon" href="assests/images/favicon.ico">
    <!-- CSS -->
    <link rel="stylesheet" href="assests/css/index.css" type="text/css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>
<body>
    <div class="content">
        <div class="nav-bar shadow-sm">
            <div class="nav-bar content1">
                <div class="nav-bar-logo">
                    <a class="link" href="https://www.google.co.th/">
                        <img src="assests/images/logo_h.png" alt="logo" width="280px">
                    </a>
                </div>
            </div>
            <div class="nav-bar content2">
                <div class="nav-bar-userName">
                    <div class="nav-bar-userName left">
                        <?php if (isset($_SESSION['username'])) : ?>
                            <p>
                                <?php
                                    if($userData['firstName']!=NULL&&$userData['lastName']!=NULL){
                                        echo $userData['firstName']." ".$userData['lastName'];
                                    }else{
                                        echo "Unnamed";
                                    }
                                ?>
                            </p>
                            <p><a href="index.php?logout='1'" style="color: rgb(80, 80, 80);">Logout</a></p>
                        <?php endif ?>
                    </div>
                    <div class="nav-bar-userName right">
                        <div class="user-pic shadow-sm">
                            <?php if($userData['profilepic'] != NULL): ?>
                                <img src="assests/images/<?php echo $userData['profilepic']?>" alt="profilepic" height="60px" width="60px">
                            <?php else:?>
                                <img src="assests/images/default.png" alt="logo" height="60px" width="60px">
                            <?php endif ?>
                            <!--<img src="assests/images/profiles_1.jpg" alt="profiles_1" height="60px" width="60px">-->
                        </div>
                    </div>
                </div>
                <div class="nav-bar-navigator">
                    <lix class="nav-bar-navigator navigate"><a class="activex" href="index.php">Home</a></lix>
                    <lix class="nav-bar-navigator navigate"><a class="active" href="profile.php">Profile</a></lix>
                    <lix class="nav-bar-navigator navigate"><a class="activex" href="abouts.php">Abouts</a></lix>
                    <lix class="nav-bar-navigator navigate"><a class="activex" href="services.php"><i class="fas fa-cog" style="padding-right: 5px;"></i>Services</a></lix>
                </div>
            </div>
        </div>
        
        <div style="overflow:auto; padding: 2.5% 2.5% 2.5% 2.5%; ">
            <div class="menu" >
                <div>
                    <a href="app.php"><div class="menuitem menu_activex shadow-sm"><i class="far fa-edit" style="padding-right: 5px;"></i>Appointment</div></a>
                    <a href="med.php"><div class="menuitem menu_activex shadow-sm"><i class="fas fa-pills" style="padding-right: 7px;"></i>Medicine</div></a>
                    <a href="chat.php"><div class="menuitem menu_activex shadow-sm"><i class="fas fa-user-friends" style="padding-right: 7px;"></i>Chat</div></a>
                    <a href="ship.php"><div class="menuitem menu_activex shadow-sm"><i class="fas fa-shipping-fast" style="padding-right: 7px;"></i>Shipping Status</div></a>
                </div>
            </div>
    
            <div class="main">
                <div class="article">
                    <hr style="margin-bottom: 0.5rem"><h2 style="font-size: 1.5rem;">PROFILE</h2><hr>
                </div>
                <div class="card rounded-0 shadow-sm" style="width: 32%; float: left; padding: 0px;">
                    <div style="padding: 10px 20px 10px 20px; border-bottom: 1px solid rgba(0, 0, 0, 0.1); background-color: #42b7b9; color: white;"><h4>PROFILE DETAILS</h4></div>
                    <div style="max-height: 218px; overflow-y: hidden;">
                        <?php if($userData['profilepic'] != NULL): ?>
                            <img src="assests/images/<?php echo $userData['profilepic']?>" alt="profilepic" height="100%" width="100%">
                        <?php else:?>
                            <img src="assests/images/default.png" alt="logo" height="100%" width="100%">
                        <?php endif ?>
                    <!--<img src="assests/images/profiles_1.jpg" style="width: 100%; height: 100%; ">-->
                    </div>
                    <div style="padding: 10px 20px 10px 20px; border-top: 1px solid rgba(0, 0, 0, 0.1); font-size: 16px;">
                        <div style="margin-bottom: 80px;">
                            <div style="margin-bottom: 10px;">
                                <div style="width: 45%; float: left; font-weight: bold; margin-bottom: 10px;">Name</div>
                                <div style="width: 55%; float: right; margin-bottom: 10px;">
                                    <?php
                                    if($userData['firstName']!=NULL&&$userData['lastName']!=NULL){
                                        echo $userData['firstName']." ".$userData['lastName'];
                                    }else{
                                        echo "-";
                                    }
                                    ?>
                                </div>
                            </div>
                            
                            <div>
                                <div style="width: 45%; float: left; font-weight: bold; margin-bottom: 10px;">Hosp. No</div>
                                <div style="width: 55%; float: right; margin-bottom: 10px;">
                                    <?php
                                        if($userData['hospitalNum']!=NULL){
                                            echo $userData['hospitalNum'];
                                        }else{
                                            echo "-";
                                        }
                                    ?>
                                </div>
                            </div>

                            <div>
                                <div style="width: 45%; float: left; font-weight: bold; margin-bottom: 10px;">Gender</div>
                                <div style="width: 55%; float: right; margin-bottom: 10px;">
                                    <?php if($userData['gender']==="F"){
                                        echo "Female";
                                    }else if($userData['gender']==="M"){
                                        echo "Male";
                                    }else{
                                        echo "-";
                                    }
                                    ?>
                                </div>
                            </div>

                            <div>
                                <div style="width: 45%; float: left; font-weight: bold; margin-bottom: 10px;">Birth Date</div>
                                <div style="width: 55%; float: right; margin-bottom: 10px;">
                                    <?php
                                        if($userData['birthDate']!=NULL){
                                            echo $userData['birthDate'];
                                        }else{
                                            echo "-";
                                        }
                                    ?>
                                </div>
                            </div>

                            <div>
                                <div style="width: 45%; float: left; font-weight: bold; margin-bottom: 10px;">Age</div>
                                <div style="width: 55%; float: right; margin-bottom: 10px;">
                                    <?php
                                        if($userData['age']!=NULL){
                                            echo $userData['age'];
                                        }else{
                                            echo "-";
                                        }
                                    ?>
                                </div>
                            </div>
                            
                            <div>
                                <div style="width: 45%; float: left; font-weight: bold; margin-bottom: 10px;">Nationality</div>
                                <div style="width: 55%; float: right; margin-bottom: 10px;">
                                    <?php
                                        if($userData['nationality']!=NULL){
                                            echo $userData['nationality'];
                                        }else{
                                            echo "-";
                                        }
                                    ?>
                                </div>
                            </div>
                            
                            <div>
                                <div style="width: 45%; float: left; font-weight: bold; margin-bottom: 10px;">Tel</div>
                                <div style="width: 55%; float: right; margin-bottom: 10px;">
                                    <?php
                                        if($userData['tel']!=NULL){
                                            echo $userData['tel'];
                                        }else{
                                            echo "-";
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="card rounded-0 shadow-sm" style="width: 65%; float: right; padding: 0px;">
                    <div style="padding: 10px 20px 10px 20px; border-bottom: 1px solid rgba(0, 0, 0, 0.1); background-color: #42b7b9; color: white;"><h4>ADDRESS</h4></div>
                    <div style="min-height: 300px; overflow-y: hidden;">
                        <div style="margin-top: 0px; margin-bottom: 20px; margin-right: 20px; padding: 20px;">

                            <div style="width: 100%; float: left; margin-bottom: 10px;">
                                <!--<div style="width: 100%; font-weight: bold;">Address</div>-->
                                <div style="width: 100%; margin: 10px; padding: 20px; border: 1px solid #CCCCCC; border-radius: 5px">
                                    <div>
                                        <?php if($addrData):?>
                                            <?php echo $addrData['HouseNum']; ?>, 
                                            <?php echo $addrData['Street']; ?><br>
                                            <?php echo $addrData['SubDistrict']; ?>, 
                                            <?php echo $addrData['District']; ?><br>
                                            <?php echo $addrData['Province']; ?><br>
                                            <?php echo $addrData['PostalCode']; ?>
                                        <?php else: echo "NO ADDRESS DATA"?>
                                        <?php endif ?>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                            </div>

                            <!--<div style="width: 100%; float: left; margin-bottom: 10px;">
                                <div style="width: 100%; font-weight: bold;">History</div>
                                <div style="width: 100%; margin: 10px; padding: 5px; border: 1px solid #CCCCCC; border-radius: 5px">
                                    Histoty
                                </div>
                                
                            </div>-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<div class="footer">Copyright © 2021 All Rights Reserved by <strong><a href="home.php">OPE HOSPITAL</a></strong>.</div>
</html>
