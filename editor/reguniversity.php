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
        <?php
require("dmu.php");	   
?>
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
								require("editormenu.php");	

										
								?>
                            </div>
                        </div>
                    </div>

                </div>

    </div><!--close menubar-->	
	<div id="site_content">

	  <div class="sidebar_container">
	  </div>
	  <br><br>
 <div id="content">
<fieldset id="fieldset" ><legend>Register University which provide Exit Exam </legend>
<br><br>
<div style="margin-left: 40px;width: 500px;">
 <br><br>
<table>
<form action="" method="post" name="myForm" onsubmit="return validateForm()">
<tr>
<td colspan="2">University ID<input type="text" name="uid"  required/></td>
</tr>
<tr>
<td colspan="2">University Name<input type="text" name="uname" pattern="[a-zA-Z ]+" required onKeyPress="return ValidateAlpha(event)"/></td>
</tr>
<tr>
<td><input type="submit" name="unviregister" value="Register"></td><td>
<input type="reset"  value="Cancel"></td>
</tr>
</form>
</table>
 <br><br>
<?php

//register university

if(isset($_POST['unviregister']))
{
$uname=$_POST["uname"];
$uid=$_POST["uid"];
$registerexist="select*from university where uname='$uname' ";
$record=mysql_query($registerexist,$con);
if(mysql_num_rows($record)>0)
echo $uname." University is allready Exist,Not allowed to register one University More than one times";
else
{
$sql="insert into university values('$uid','$uname')";
$insert=mysql_query($sql,$con);
if($insert)
echo" University Sucessfully Registered";
else
echo" NO University Sucessfully Registered".mysql_error($con);	
}
}
?>
</div>
<br><br>
</fieldset>
</div> 
<br><br><br>
<br><br><br>
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

