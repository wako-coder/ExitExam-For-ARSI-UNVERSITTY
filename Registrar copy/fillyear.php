<?php
session_start();
include("../connection.php");
?>
<html>

<head>
  <title>Fill Year page</title>
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
	width: 535px;
	text-align: left;
	margin-left: 200px;
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
 <fieldset class="fieldset"><legend>Register Cnadidate</legend>

 <br>
 <table>
<form action="" method="post">
<tr>
<td>Enter year :</td>
<td><input type="number" name="year" min="1" required placeholder="Enter year like 2020....."/></td>
</tr>
<tr>
<td><input type="submit" name="next" value="Next"/></td>
<td><input type="reset"  name="" value="Cancel" /></td>
</tr>

</form>
</table>
<br><br><br><br><br><br><br>
</fieldset>
<?php
if(isset($_POST["next"]))
{
$_SESSION['year']=$_POST["year"];;
header("location:register_cand.php");	
}
?>

 <?php
}
else
{
header("location:../index.php");
}
?>
</div>
 <br><br><br><br>
 <br><br>
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
