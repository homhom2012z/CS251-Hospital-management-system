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

    $age = date_diff(date_create($userData['birthDate']), date_create('now'))->y;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="index" content="width=device-width, initial-scale=1">
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
                            <p><?php echo $_SESSION['username']; ?></p>
                            <p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
                        <?php endif ?>
                    </div>
                    <div class="nav-bar-userName right">
                        <div class="user-pic shadow-sm">
                            <?php if($userData['profilepic'] != NULL): ?>
                                <img src="assests/images/<?php echo $userData['profilepic']?>" alt="profilepic" height="60px" width="60px">
                            <?php else:?>
                                <img src="assests/images/default.png" alt="logo" height="60px" width="60px">
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="nav-bar-navigator">
                    <lix class="nav-bar-navigator navigate"><a class="active" href="index.php">Home</a></lix>
                    <lix class="nav-bar-navigator navigate"><a href="profile.php">Profile</a></lix>
                    <lix class="nav-bar-navigator navigate"><a href="abouts.php">Abouts</a></lix>
                    <lix class="nav-bar-navigator navigate"><a href="services.php"><i class="fas fa-cog" style="padding-right: 5px;"></i>Services</a></lix>
                </div>
            </div>
        </div>
        
        <div style="overflow:auto; padding: 2.5% 2.5% 2.5% 2.5%; ">
            <div class="menu" >
                <div>
                    <a href="app.php"><div class="menuitem menu_activex shadow-sm"><i class="far fa-edit" style="padding-right: 5px;"></i>Appointment</div></a>
                    <a href="med.php"><div class="menuitem shadow-sm"><i class="fas fa-pills" style="padding-right: 7px;"></i>Medicine</div></a>
                    <a href="chat.php"><div class="menuitem shadow-sm"><i class="fas fa-user-friends" style="padding-right: 7px;"></i>Chat</div></a>
                    <a href="ship.php"><div class="menuitem shadow-sm"><i class="fas fa-shipping-fast" style="padding-right: 7px;"></i>Shipping Status</div></a>
                </div>
            </div>
    
            <div class="main">
                <div class="article">
                    <hr style="margin-bottom: 0.5rem"><h2 style="font-size: 1.5rem;">Home</h2><hr>
                </div>
                <div class="card rounded-0 shadow-sm" style="width: 70%; float: left;">
                    <a href="https://med.mahidol.ac.th/COVID-19">
                        <img src="assests/images/c_1.jpg" style="width: 100%; height: 100%;">
                    </a>
                    
                </div>
                <div class="card rounded-0 shadow-sm" style="width: 28%; float: right; padding: 0px;">
                    <a href="https://med.mahidol.ac.th/th/COVID-19/regulation/17mar2020-0846">
                        <img src="assests/images/c_2.jpg" width="100%">
                        <div class="read-mores">read mores</div>
                    </a>
                    
                </div>
                <div class="card rounded-0 shadow-sm" style="width: 28%; float: right; padding: 0px; margin-top: 16px;">
                    <a href="https://www.rama.mahidol.ac.th/th/infographics/218">
                        <img src="assests/images/c_3.jpg" width="100%">
                        <div class="read-mores">read mores</div>
                    </a>
                </div>
            </div>
            <div class="main">
                <hr>Articles<hr>
                <div class="NewsContent-container">
                    <div class="NewsContent-thumb"><a href="1"><img src="assests/images/ar_1.jpg" alt="1"></a></div>
                    <div class="NewsContent-title"><a href="2">พลังน้ำใจคนไทย</a></div>
                    <div class="NewsContent-summary"><p>บริจาคเงินสมทบทุนและอุปกรณ์การแพทย์ขนาดใหญ่...</p></div>
                </div>
                <div class="NewsContent-container">
                    <div class="NewsContent-thumb"><a href="1"><img src="assests/images/ar_2.jpg" alt="2"></a></div>
                    <div class="NewsContent-title"><a href="2">เกณฑ์การฉีดวัคซีนโควิด-19</a></div>
                    <div class="NewsContent-summary"><p>เกณฑ์ที่ฉีดวัคซีนได้ และเกณฑ์ควรชะลอการฉีดวัคซีน...</p></div>
                </div>
                <div class="NewsContent-container">
                    <div class="NewsContent-thumb"><a href="1"><img src="assests/images/ar_3.jpg" alt="3"></a></div>
                    <div class="NewsContent-title"><a href="2">แนวทางการฉีดวัคซีนโควิด-19</a></div>
                    <div class="NewsContent-summary"><p>ผู้ป่วยไตวายเรื้อรังระยะสุดท้าย ผู้ป่วยตับเรื้อรังระยะสุดท้าย ผู้ป่วยภาวะหัวใจล้มเหลว...</p></div>
                </div>
                
                <!--<div class="NewsContent-container">
                    <div class="NewsContent-thumb"><a href="1"><img src="/assests/images/ar_1.jpg" alt="1"></a></div>
                    <div class="NewsContent-title"><a href="2">พลังน้ำใจคนไทย</a></div>
                    <div class="NewsContent-summary"><p>บริจาคเงินสมทบทุนและอุปกรณ์การแพทย์ขนาดใหญ่...</p>
                </div>
                <div class="NewsContent-container">
                    <div class="NewsContent-thumb"><a href="1"><img src="/assests/images/ar_2.jpg" alt="2"></a></div>
                    <div class="NewsContent-title"><a href="2">พลังน้ำใจคนไทย</a></div>
                    <div class="NewsContent-summary"><p>บริจาคเงินสมทบทุนและอุปกรณ์การแพทย์ขนาดใหญ่...</p>
                </div>-->
            </div>
            <div class="main">
                <hr><hr>
            </div>
        </div>
    </div>
</body>
<div class="footer">Copyright © 2021 All Rights Reserved by <strong><a href="home.php">OPE HOSPITAL</a></strong>.</div>
</html>
