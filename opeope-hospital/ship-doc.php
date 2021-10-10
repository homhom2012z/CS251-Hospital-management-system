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

    $sql3 = "SELECT * FROM Userdb WHERE userType='0'";
    $userList = mysqli_query($conn, $sql3);

    $sql4 = "SELECT * FROM Medicine";
    $medicineList = mysqli_query($conn, $sql4);

    $disQ = "SELECT * FROM Dispense";
    $Dispense = mysqli_query($conn, $disQ);

    $disQ1 = "SELECT * FROM Dispense";
    $Dispense2 = mysqli_query($conn, $disQ1);
    
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">

    </script>

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
                    <lix class="nav-bar-navigator navigate"><a class="activex" href="profile.php">Profile</a></lix>
                    <lix class="nav-bar-navigator navigate"><a class="activex" href="abouts.php">Abouts</a></lix>
                    <lix class="nav-bar-navigator navigate"><a class="activex" href="services.php"><i class="fas fa-cog" style="padding-right: 5px;"></i>Services</a></lix>
                </div>
            </div>
        </div>
        
        <div style="overflow:auto; padding: 2.5% 2.5% 2.5% 2.5%; ">
            <div class="menu" >
                <div>
                    <a href="app.php"><div class="menuitem menu_activex shadow-sm"><i class="far fa-edit" style="padding-right: 5px;"></i>Appointment</div></a>
                    <a href="med.php"><div class="menuitem menu_activx shadow-sm"><i class="fas fa-pills" style="padding-right: 7px;"></i>Medicine</div></a>
                    <a href="chat.php"><div class="menuitem menu_activex shadow-sm"><i class="fas fa-user-friends" style="padding-right: 7px;"></i>Chat</div></a>
                    <a href="ship.php"><div class="menuitem menu_active shadow-sm"><i class="fas fa-shipping-fast" style="padding-right: 7px;"></i>Shipping Status</div></a>
                </div>
            </div>
    
            <div class="main">
                <div class="article">
                    <hr style="margin-bottom: 0.5rem"><h2 style="font-size: 1.5rem;">Medicine</h2><hr>
                </div>
                <div class="card rounded-0 shadow-sm" style="width: 100%; float: left; padding: 0px;">
                    <div style="padding: 10px 20px 10px 20px; border-bottom: 1px solid rgba(0, 0, 0, 0.1);background-color: #42b7b9; color: white;"><h4>Doc Medicine</h4></div>
                    <div style="min-height: 300px; overflow-y: hidden;">
                        <div style="margin-top: 0px; margin-bottom: 20px; margin-right: 20px; padding: 20px;">

                            <div style="width: 48.5%; float: left; margin-bottom: 10px;">
                                <div style="width: 100%; font-weight: bold; text-align: center;">รายละเอียด</div>
                                <div style="width: 100%; margin: 10px; padding: 20px; border: 1px solid #CCCCCC; border-radius: 5px;overflow: scroll; height: 500px; font-size: 16px;">
                                <div style="text-align: center;">
                                </div style="">
                                    <?php
                                        while($row = mysqli_fetch_array($Dispense2)){?>
                                            <?php echo $row['Tracking']." : ".$row['Description'];?><br><hr><?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div style="width: 50%; float: right; margin-bottom: 10px;">
                                <div style="width: 100%; font-weight: bold; text-align: center;">อัพเดทสถานะ</div>
                                <div style="width: 100%; font-weight: bold; text-align: center;">
                                    <!-- notification message-->
                                    <?php if (isset($_SESSION['success'])) : ?>
                                        <div class="success">
                                            <h3 style="color: blue;">
                                                <?php 
                                                    echo $_SESSION['success'];
                                                    unset($_SESSION['success']);
                                                ?>
                                            </h3>
                                        </div>
                                    <?php endif ?>
                                </div>
                                
                                <form style="font-size: 16px;" action="ship-doc_db.php" method="post">
                                    <div style="width: 100%;margin: 10px; padding: 20px; border: 1px solid #CCCCCC; border-radius: 5px">
                                        
                                            <div>
                                                <div style="margin-bottom: 10px;">Choose Tracking</div>
                                                <select class="input-regis" name="Tracking" id="Tracking" required>
                                                <?php
                                                while($row = mysqli_fetch_array($Dispense))
                                                {
                                                ?>
                                                    <option value="<?php echo $row['Tracking']?>"><?php echo $row['PatientID']." / ".$row['Tracking']; ?></option>
                                                <?php    
                                                }
                                                ?>
                                                </select>
                                            </div>

                                    </div>
                                    <div style="width: 100%;margin: 10px; padding: 20px; border: 1px solid #CCCCCC; border-radius: 5px">
                                        
                                    <div>
                                                <div style="margin-bottom: 10px;">Choose Status</div>
                                                <select class="input-regis" name="Status" id="Status" required>
                                                    <option value="P">Preparing</option>
                                                    <option value="S">Sending</option>
                                                    <option value="D">Delivered</option>
                                                    <option value="C">Cancel</option>
                                                </select>
                                            </div>

                                    </div>

                                    <div style="width: 100%; float: right; margin: 20px; text-align:">
                                                
                                                <div style="width:30%; float: left; margin-left: 30px;">
                                                    <button style="background: #7bd1e0;" type="submit" name="shipEdit" class="input-regis">Submit</button>
                                                </div>
                                                
                                                <div style="width:30%;  float: left; margin-left: 10px;">
                                                    <button style="background: #cacaca;" type="reset" name="cancel" class="input-regis">Clear</button>
                                                </div>
                                    </div>
                                    
                                </form>    

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<div class="footer">Copyright © 2021 All Rights Reserved by <strong><a href="home.php">OPE HOSPITAL</a></strong>.</div>
</html>
