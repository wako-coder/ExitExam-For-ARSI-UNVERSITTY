<?php
session_start();
include("../connection.php");
require("head.php");

	?>
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
	  </div><!--close banner-->
   </div><!--close header-->
	<div id="navigation">
	<?php
require("candmenu.php");			
?>

    </div><!--close menubar-->	
  <div id="site_content"> 
<div class="sidebar_container">
</div>
	  
<div id="content">
<?php
$fullname=$_SESSION['fullname'];
$uname=$_SESSION['sun'];
$role=$_SESSION['role'];
$photo=$_SESSION['sphoto'];
?>
    <div id="site_content">
                <div class="sidebar_container">
                </div>
                <div id="content">
                    <br>
                    <div class="container page__heading-container">
                        <div
                            class="page__heading d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                           
                            <h1 <tr><td bgcolor="#110ceb"><center><font color="#00ffff" > Welcome To Candidate Page</font></center></td></tr></h1>
                   
                            <img src="userphoto/cand.jpg" class="" style="width:800px;" >
</div>
           
<br>
<div class=" " id="course_content">
	<p>
    
 Candidate  <font  style="color: #d06f7b"><?php echo $fullname;?></font>
can perform  different task in the system which are allowed for you to access.Therefore to access and perform the tasks you should read the instruction which are tells about how to perform its task and access.Some the instruction are listed below the following bullets.
</p><ul>
<li class="confirm">Candidate can perform any tasks which are listed in the header link menus.</li>
</ul>
</div>
</div>
 <br><br><br><br><br>
	 <?php
}
else
{
header("location:../index.php");
}
?>  
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
