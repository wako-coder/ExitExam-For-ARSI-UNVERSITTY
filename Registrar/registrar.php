<?php
session_start();
include("../connection.php");
require("head.php");
?>


<body>
    <div id="main">
        <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
?>
        <div id="header">
            <div id="banner">

                <!--<div id="welcome_slogan"> -->

                <?php
require("dmu.php");	   
?>
                <!--</div> <!--close welcome_slogan-->
            </div>
            <!--close banner-->
        </div>
        <div class="mdk-header-layout__content page">
            <div class="page__header  page__header-nav mb-0">
                <div class="container page__container">
                    <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0 d-none d-md-flex"
                        id="secondaryNavbar">
                        <?php
require("registrar_menu.php");		

		
?>
                    </div>
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
                    <h1 <tr><td bgcolor="#110ceb"><center><font color="#00ffff" >Welcome To Registrar Page</font></center></td></tr></h1>
                    <img src="userphoto/rrr.PNG" class="" style="width:600px;" >
            
                </div>
                <div class=" " id="course_content">
                    <p> Registrar <font style="color: #d06f7b"><?php echo $fullname;?></font>
                        can perform different task in the system which are allowed for you to access.Therefore to access and perform the tasks you should read the
                                instruction which are tells about how to perform its task and access.
                    </ul>
                </div>
            </div>
        </div>
        <br><br><br>


    </div>
    <?php
}
else
{
header("location:../index.php");
}
?>


    <div id="footer">

    </div>
    <br><br>
    </div>
    <?php
require("footer.php");
?>
</body>

</html>