<?php
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Registrar page</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <style type="text/css">
.style1 
{
     font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size:20px;;
	width:920px;
	text-align:left;
	margin-top: 10px;
	color: black;
	margin-left: 50px;
}
  </style>
  
</head>

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
	  </div><!--close banner-->
   </div><!--close header-->
	<div id="navigation">
	<?php
require("registrar_menu.php");	

		
?>

    </div><!--close menubar-->	
  <div id="site_content"></div>  
<div id="site_content">
<div class="sidebar_container">
</div>
	  
<div id="content">
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
<div id="wellcome">Well Come To Registrar  Page</div> 
<br>
Dr. Registrar  <font  style="color: #d06f7b"><?php echo $fullname;?></font>
can perform  different task in the system which are allowed for you to access.Therefore to access and perform the tasks you should read the instruction which are tells about how to perform its task and access.Some the instruction are listed below the following bullets.<ul>
<li>You can perform any tasks which are listed in the header link menus.</li>
<li>You can any give feedback from the above  comment header link.</li>
<li>you can add or register candidate information or profile form the above add candidate header link .</li>
<li>you can update and view candidate information.</li>
<li>Finally after finish its task click logout header link to out from the system.</li>
</ul>
</div>
</div>
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
<?php
require("../footer.php");
?>
   
</div>
<br><br>
</div>
</body>
</html>
