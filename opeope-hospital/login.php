<?php 
    session_start();
    include('server.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OPE OPE Hospital</title>
    <link rel="shortcut icon" href="assests/images/favicon.ico">
    <link rel="stylesheet" href="assests/css/login.css" type="text/css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script>
        window.console = window.console || function(t) {};
    </script>
        
    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }
    </script>
</head>
<body translate="no">
    <div class="login-page" id="login-page">
        <div><img src="assests/images/logo_2.png" alt="1" width="250px" height="100%"></div>
        <div class="form" id="forms">
            <!-- notification message-->
            <?php if (isset($_SESSION['error'])) : ?>
                <div class="error">
                    <h3>
                        <?php 
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>

            <form class="register-form" action="register_db.php" method="post">
                <div class="form-header">Sign Up</div>
                <div style="margin: 20px 0px 20px 0px;">

                    <div style="width: 45%; float: left; padding: 10px 0px 10px 0px; background: rgbx(192, 192, 192);">
                        <div style="float: left; padding: 0px 0px 20px 20px;">Account Information</div>
                        <div style="margin: 30px;">
                            <div>
                                <input type="text" name="username" placeholder="username" required>
                                <input type="text" name="email" placeholder="email" required>
                                <input type="password" name="password" placeholder="password" required>
                                <div style="float: left;">
                                <input style="float: left;" type="radio" checked="checked" name="userType" value="0"><p>Patient</p>
                                <input style="float: left;" type="radio" name="userType" value="1"><p>Doctor</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="width: 55%; float: left; padding: 10px 0px 10px 0px; background: rgbx(197, 111, 111);">
                        <div style="float: left; padding: 0px 0px 20px 10px;">General Information</div>
                        <div style="margin: 0px 30px; float: left;">
                            <div>
                                <div class="row">
                                    <div class="col-50">
                                        <input type="text" name="firstName" placeholder="Firstname" >
                                    </div>
                                    <div class="col-50">
                                        <input type="text" name="lastName" placeholder="Lastname" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-35">
                                        <input type="text" name="citizenID" placeholder="Citizen ID" required>
                                    </div>
                                    <div class="col-20">
                                        <!--<input type="text" name="gender" placeholder="Gender">-->
                                        <select style="border: 0px; height: 41px;" class="input-regis" name="gender" id="gender">
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                            <option value="-">Not specified</option>
                                        </select>
                                    </div>
                                    <div class="col-41">
                                        <input style="height: 41px; text-align: center;" type="date" name="birthDate" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-59">
                                        <input type="text" name="nationality" placeholder="Nationality" >
                                    </div>
                                    <div class="col-41">
                                        <input type="text" name="tel" placeholder="Tel" >
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div style="width: 55%; float: left; padding: 10px 0px 10px 0px; background: rgbx(197, 111, 111);">
                        <div style="float: left; padding: 0px 0px 20px 10px;">Address</div>
                        <div style="margin: 0px 30px; float: left;">
                            <div>
                                <div class="row">
                                    <div class="col-50">
                                        <input type="text" name="HouseNum" placeholder="House Number">
                                    </div>
                                    <div class="col-50">
                                        <input type="text" name="Street" placeholder="Street">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-41">
                                        <input type="text" name="SubDistrict" placeholder="Sub District">
                                    </div>
                                    <div class="col-59">
                                        <input type="text" name="District" placeholder="District">
                                    </div>
                                </div>

                                <div class="row">
                                    <div>
                                        <input type="text" name="Province" placeholder="Province">
                                    </div>
                                    <div class="col-41">
                                        <input type="text" name="PostalCode" placeholder="Postal Code">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>

                <button type="submit" name="reg_user" class="btn">create</button>
                <p class="message">Already registered? <a href="#">Sign In</a></p>
                
                <!---<input type="text" name="username" placeholder="username">
                <input type="text" name="email" placeholder="email">
                <input type="password" name="password_1" placeholder="password">
                <button type="submit" name="reg_user" class="btn">create</button>
                <p class="message">Already registered? <a href="#">Sign In</a></p>-->
            </form>

            <form class="login-form" action="login_db.php" method="post">
                <div class="form-header">Login</div>
                <input type="text" name="username" placeholder="username">
                <input type="password" name="password" placeholder="password">
                <button type="submit" name="login_user" class="btn">login</button>
                <p class="message">Not registered? <a href="#">Create an account</a></p>
            </form>
            
        </div>
    </div>

    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script id="rendered-js">
        $('.message a').click(function () {
            $('form').animate({ height: "toggle", opacity: "toggle"}, "slow");
            $('#login-page').toggleClass('togglep');
            $('#forms').toggleClass("togglef");
            $('form input').toggleClass('input-regis');
            //$('form').toggleClass("togglef");
        });
        //# sourceURL=pen.js
    </script>
    <canvas id="icbg-animation" width="879" height="842"></canvas>
    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>
    <script src="assests/js/login.js" id="rendered-js"></script>
</body>
<div class="footer">Copyright © 2021 All Rights Reserved by <strong><a href="#index">OPE HOSPITAL</a></strong>.</div>
</html>