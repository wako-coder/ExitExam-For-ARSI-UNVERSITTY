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
$uid=$_SESSION['$uid'];
$username=$_SESSION['sun'];
$role=$_SESSION['role'];
$login_time=$_SESSION['login_time'];
$logout_time="empty";

//start log file record....
//log file find ip address
if(!empty($_SERVER["HTTP_CLIENT_IP"]))
$ipaddress=$http_client_ip;
elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
$ipaddress=$http_x_forwarded_for;	
else
$ipaddress=$_SERVER['REMOTE_ADDR'];
// some variable declaration
$start_time = date("d M Y @ h:i:s");
$work_date=date('Y-m-d');
$activity_type="Update user account ";
//log file
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


</div><!--close menubar-->	

<div id="site_content">
<div class="sidebar_container">
</div>
<div id="content">
<br><br><br>
<div class="style1" id=textinput>
<fieldset class="fieldset"><legend>We can block or update  user status by searching id number</legend>
<br><br>
<div style="margin-left: 20px; background-color:#bccdf1;">
<table>
<form action="" method="post">
<tr><td>Enter Year:</td><td><input  type="number" name="year" required/></td></tr>
<tr><td>&nbsp;&nbsp;Role:</td><td><input  type="text" name="role"  value="Candidate" readonly/></td>	</tr>
<tr><td>&nbsp;&nbsp;</td><td><input type="submit" name="blockall" value="Block All Account"></td></tr>
<?php
if(isset($_POST["blockall"]))
{
$year=$_POST["year"];
$role=$_POST["role"];
$update=0;
if($role=='Candidate')
{
$cand=mysql_query("select*from candidate WHERE year='$year'",$con);
if(mysql_num_rows($cand)>0)
{
while($row=mysql_fetch_array($cand))
{
$cid=$row["cid"];
$update=mysql_query("update account  set status='inactive' where uid='$cid'");	
}
if($update!=0)	
echo"User Account Is Successfully Blocked!!!";
else
echo"Unable To Block User Account".mysql_error($con);
}
else
echo"No $role Can Be Found In $year Year";
}

}
?>
</form>
</table>
<br><br><br><br>
</div>
<br><br>
</fieldset>

</div>

</div>
<br><br><br><br><br><br>
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
