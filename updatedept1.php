<?php
include("connection.php");
?>
<html>
<head>
  <title>Update  Department profile</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/image_slide.js"></script>
 <script type="text/javascript" src="css/javascriptdate.js"></script>
  <style type="text/css">

.style1 
{
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size: medium;
}
.fieldset
{
	width: 100px;
	text-align: left;
	margin-left: 25px;
	margin-top: 20px;
	height: auto;

	}
.fieldset1
{
	width: 100px;
	text-align: left;
	margin-left: 500px;
	margin-top: 50px;
	height: auto;
	position: absolute;

	}
  </style>
  
</head>

<body>
 <div id="main">
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
require("editormenu.php");	

		
?>

    </div><!--close menubar-->	
  <div id="site_content"></div>  
	<div id="site_content">

	  <div class="sidebar_container">
	  </div>
 <div id="content">
<?php

if(isset($_GET["DID"]))
{	
$driver_id=$_GET['DID'];
$sql="select * from department where did='$driver_id'";
$recordfound=mysql_query($sql,$con);
echo" <fieldset class='fieldset1'>";
	if(mysql_affected_rows($con))
	{
	$row=mysql_fetch_assoc($recordfound);
	
	echo "<form action='' method=post>";
	echo"Id:<input type=text name='did1' value='".$row["did"]."'readonly><br>";
	echo "Name:<input type=text name='dname1' value='".$row["dname"]."' required><br>";
	echo "<input type=submit name=update value=update>";
	echo "<input type=reset value=reset>";
	echo"</form>";
	}
	else
	echo "No result found";
	}
	
//UPDATE
	if(isset($_POST["update"]))
	{
	$did=$_POST["did1"];
	$dname=$_POST["dname1"];
	$sql="update department set dname='$dname' where did='$did'";
	$updated=mysql_query($sql,$con);
	if(mysql_affected_rows($con))
	echo mysql_affected_rows($con)." record/s update successfully!";
	else
	echo "Unable to update!";	
	}
echo" <fieldset>";
?>

 </div>       
  </div>
      </div>   
   </div>
       <div id="navigation">
<?php
require("footer.php");
?>
   
</div>
</body>
</html>






