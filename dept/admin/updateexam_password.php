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
        <div id="content">
            <fieldset class="fieldset">
                <legend>Update Exam Password</legend>
 
                    <br>
                    <br>
                    <div class="col-lg-8 card-form__body card-body">
                        <form action="" method="post">
                            <div class="form-group m-0">
                                <label for="searchSample02">Enter Exam Password ID:</label>
                                <div class="search-form form-control-rounded search-form--light input-group-lg">
                                    <input type="text" name="pid" class="form-control" required placeholder="Enter Password ID..." 
                                        id="searchSample02">
									
                                    <button type="submit" class="btn" name="search" type="button"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                            
                        </form>
                      
                        <br>

                        <?php
if(isset($_POST["search"]))
{
$pw=$_POST["pid"];
 $sql="select * from exam_passord where pw_id='$pw'";
 $pwexist=mysql_query($sql,$con);
 $yesrexist=mysql_num_rows($pwexist);
if($yesrexist>0)
{
echo"<form action='' method='post'><table>";
while($r=mysql_fetch_array($pwexist))
{
echo"<tr><td>Password ID:</td><td><input type='text' name='pid' value='".$r["pw_id"]."'  readonly></td> </tr>";
echo"<tr><td>Password Name:</td><td><input type='text' name='pwname' value='".$r["password"]."' ></td> </tr>";
echo"<tr><td>Acadamic Year</td><td><input type='number' name='year' value='".$r["year"]."' ></td> </tr>";
echo"<tr><td colspan=2><input type=submit name=update value=update></td> </tr>";
}
echo"</table></form>";
}
else
echo "NO Exam Password Set By $pw Year.";
}

//update
if(isset($_POST["update"]))
{
$pid=$_POST["pid"];	
$pw=$_POST["pwname"];	
$year=$_POST["year"];	
$sql=mysql_query("update exam_passord set password='$pw',year='$year'  where pw_id='$pid'");
if($sql)
echo"Record Successfully Update";
else
echo"Unable To Update".mysql_error($con);
}

?>

                </center>
                <br>
            </fieldset>
            <?php
}
else
{
header("location:../index.php");
}
?>
            <br><br><br><br> <br><br><br><br> <br><br><br><br>
            <br><br>
        </div>
    </div>
    <div id="footer">

    </div>
    <br><br>
    </div>
        <?php
require("footer.php");
?>
</body>

</html>