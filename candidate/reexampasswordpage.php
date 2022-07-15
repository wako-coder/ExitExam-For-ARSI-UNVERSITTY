<?php
ob_start();
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Exam Password page</title>
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
	border-radius:0px;
	
}
  	.fieldset
{
	width: 650px;
	text-align: left;
	margin-left:100px;
	margin-top: 20px;
	height: auto;
	border-radius:0px;
	border-color: #801137;


	}
  </style>
  
</head>

<body>
 <div id="main">
   <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
$year=$_SESSION['year'];
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
  <div id="site_content"></div>  
	<div id="site_content">
<div class="sidebar_container">
</div>
	  
<div id="content">
 <fieldset class="fieldset">
 <center>
<br>
 <br>
 <table>
<form action="" method="post">
<tr><td colspan="2">Enter Correct Exam Password:</td></tr>
<tr>
<td><input type="password" name="epass" required placeholder="Enter Password" /></td>
<td><input type="submit" name="exampw" value="Go To Exam Page" /></td>
</tr>

</form>
</table>
 <br>

<?php
if(isset($_POST["exampw"]))
{
$pw=$_POST["epass"];
$sql=mysql_query("select*from exam_passord WHERE year='$year' and password='$pw'",$con);
if(mysql_num_rows($sql)>0)
{
header("location:takereexam.php");		
}
else
echo"Incorrect Password";
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
<?php
require("../footer.php");
?>
   
</div>
<br><br>
</div>
</body>
</html>
