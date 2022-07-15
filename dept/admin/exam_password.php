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
        <!--close header-->
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

    </div>
    </div>
    </div>
    <br> <br>
    <!--close menubar-->
    <div class="container">
 
            
                <div class="card card-form">
                    <div class="row no-gutters">
                        <div class="col-lg-4 card-body">
                            <p><strong class="headings-color">Set Exam Password</strong></p>

                        </div>
                        <div class="col-lg-8 card-form__body card-body">
                            <form action="" method="post">
                                <div class="was-validated">
                                    <div class="form-row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="validationSample01">Enter Exam Passord:</label>
                                            <input type="password" class="form-control" id="validatonSample01"
                                                placeholder="Enter Exam Passord:" name="epw" required>
                                            <div class="sidebar_container">
                                            </div>
                                            <div class="invalid-feedback">Please Enter Exam Passord</div>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="validationSample03">Enter Acadamic Year:</label>
                                            <input class="form-control" id="validationSample03" placeholder="2022"
                                                type="number" name="accyear" min="2000" required>
                                            <div class="invalid-feedback">Please Enter Acadamic Year.</div>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                </div>
                                <input class="btn btn-primary" type="submit" name="setpw" value="Set Exam Password">
                                <input type="reset" class="btn btn-danger" value="Cancel">
                            </form>
                        </div>
                    </div>

                    <br>
                    <br><br><br><br>

                    <?php
if(isset($_POST["setpw"]))
{
$pw=$_POST["epw"];
$year=$_POST["accyear"];	

$sql="select*from exam_passord where year='$year'";
$pwsetexist=mysql_query($sql,$con);
if(mysql_num_rows($pwsetexist)>0)
echo "Exam Password For $year Is Allready Exist";
else
{
$sql="insert into exam_passord values(' ','$pw','$year')";
$insert=mysql_query($sql,$con);
if($insert)
echo "Exam Password Successfully Registered";
else
echo"Exam Password Is Not Registered".mysql_error($con);
}
	
}
?>
                    </fieldset>
                    <br><br> <br><br> <br><br> <br><br>
                </div>
                <?php
}
else
{
header("location:../index.php");
}
?>
            </div>
        </div>
    </div>
    </div>
    </div>

    <?php
require("footer.php");
?>
</body>

</html>