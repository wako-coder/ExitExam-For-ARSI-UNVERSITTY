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
require("deptmenu.php");	

		
?>
</div><!--close menubar-->	
<div id="site_content"></div>  
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
<div style="margin: 10px;float: right;border:1px Solid #dadcdc;
					 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);margin-top: -15px;">
					<table cellspacing="0">
						
						<tr><td colspan="2"><center><?php echo "<img src='../editor/$photo' height=150 width=150>"?></center></td></tr>
						<tr><td><b>User Name:</b></td><td><font color="#e9163c"><?php echo $uname;?></font></td></tr>
						<tr><td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Role:</b></td><td><font color="#e9163c">                                   <?php echo $role;?></font></td></tr>
						
					</table>
					</div>
<div id="wellcomepage">
<div id="wellcome">well come to Department Head page</div> 
<br>
Dr. User <font  style="color: #d06f7b"><?php echo $fullname;?></font>
can perform  different task in the system which are allowed for you to access.Therefore to access and perform the tasks you should read the instruction which are tells about how to perform its task and access.Some the instruction are listed below the following bullets.<ul>
<li>Users can perform any tasks which are listed in the header link menus.</li>
<li>When we to access view report header menu link can see the report of candidate which are take exit exam in a year.</li>
<li>When we view the report you must should to enter  year and finally view report and can print the report.</li>
<li>Department head also inform candiadate account who are take exit exam created by administrator to candidate.</li>
<li>Before exam take,candidate take username and password from department head, you must change during exam date before login to system that means  before exam start.</li>
<li>Head also give certificate to candidate who are take exit exam and pass the exam.</li>
<li>To give certificate click on view header menu link and select certificate link.</li>
<li>Finally print the cerficate for each candidate and distibuted to candidate.</li>
<li>Finally after finish its task click logout header link to out from the system.</li>
</ul>
</div>
</div>
	 <?php
}
else
{
header("location:../index.php");
}
?> 
 <br><br><br><br><br><br><br><br><br><br>
 </div>   
       <div id="footer">
<?php
require("../footer.php");
?>
   
</div>
<br><br>
</div>
</body>
</html>
