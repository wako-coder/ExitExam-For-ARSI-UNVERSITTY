<?php
session_start();
include("../connection.php");

	?>
<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from lema.frontted.com/fixed-student-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Apr 2022 20:31:35 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Page</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="../assets/vendor/perfect-scrollbar.css" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="../assets/css/app.css" rel="stylesheet">
    <link type="text/css" href="../assets/css/app.rtl.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="../assets/css/vendor-material-icons.css" rel="stylesheet">
    <link type="text/css" href="../assets/css/vendor-material-icons.rtl.css" rel="stylesheet">

    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="../assets/css/vendor-fontawesome-free.css" rel="stylesheet">
    <link type="text/css" href="../assets/css/vendor-fontawesome-free.rtl.css" rel="stylesheet">

    <!-- ion Range Slider -->
    <link type="text/css" href="../assets/css/vendor-ion-rangeslider.css" rel="stylesheet">
    <link type="text/css" href="../assets/css/vendor-ion-rangeslider.rtl.css" rel="stylesheet">


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115115077-3"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-115115077-3');
    </script>

    <!-- Facebook Pixel Code -->
    <script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        '../connect.facebook.net/en_US/fbevents.js');
    fbq('init', '257843818545228');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=257843818545228&amp;ev=PageView&amp;noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->





</head>

<body>
    <?php
$fullname=$_SESSION['fullname'];
$uname=$_SESSION['sun'];
$role=$_SESSION['role'];
$photo=$_SESSION['sphoto'];
?>
    <div id="main">
        <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
?>
        <?php
require("dmu.php");	   
?>
    </div>
    <div id="header">
        <div id="banner">

            <!--<div id="welcome_slogan"> -->
            <!-- Header Layout Content -->
            <div class="mdk-header-layout__content page">
                <div class="page__header  page__header-nav mb-0">
                    <div class="container page__container">
                        <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0 d-none d-md-flex"
                            id="secondaryNavbar">
                            <?php 
	                   require("adminmenu.php");	
                        ?>
                        </div>
                    </div>
                </div>

            </div>
            <!--close menubar-->

            <div id="site_content">
                <div class="sidebar_container">
                </div>
                <div id="content">
                    <br>
                    <div class="container page__heading-container">
                        <div
                            class="page__heading d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                            <h4 class="m-lg-0 ">Well Come To Administrator Page</h4>

                        </div>
                        <div class=" " id="course_content">
                            <p>
                                Dr. Admin <font style="color: #d06f7b"><?php echo $fullname;?></font>
                                can perform different task in the system which are allowed for you to
                                access.Therefore to access and perform the tasks you should read the
                                instruction which are tells about how to perform its task and access.Some
                                the instruction are listed below the following bullets.
                            </p>
                            <ul>
                                <div>
                                    <li class="confirm">You can perform any tasks which are listed in the
                                        header link menus.</li>
                                    <li class="confirm">Admin can give comment about diffrent Ideas about
                                        system.</li>
                                    <li class="confirm">Admin also manage user account information </li>
                                    <li class="confirm">Admin also view each user activity who are performed
                                        after login in to the system,which are recorded from log file. </li>
                                    <li class="confirm">Admin also take back up of the database and restore
                                        the database.</li>                                                                
                                    <li class="confirm">Admin also view report of candidate who are take
                                        exit exam</li>
                                    <li class="confirm">Finally after finish its task click logout header
                                        link to out from the system.</li>
                                </div>
                            </ul>
                        </div>
                    </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php
}
else
{
header("location:../index.php");
}
?>
    <br><br>
    </div>
    <div id="footer">

    </div>
   
    </div>
    <?php
require("footer.php");
?>
</body>

</html>