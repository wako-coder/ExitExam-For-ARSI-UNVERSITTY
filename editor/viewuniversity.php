<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>View University</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/image_slide.js"></script>
 <script type="text/javascript" src="../css/javascriptdate.js"></script>
  <style type="text/css">

.style1 
{
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size: medium;
}
.fieldset
{
	width: 350px;
	text-align: left;
	margin-left: 250px;
	margin-top: 0px;
	height: auto;

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
require("editormenu.php");	

		
?>

    </div><!--close menubar-->	
	<div id="site_content">

	  <div class="sidebar_container">
	  </div>
 <div id="content">
 <fieldset class="fieldset">
<?php
if($con)
 {
 $sql="select * from university";
$recordfound=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
	echo "<table border='1'>";
	echo"<tr> <th>University_ID</th><th>University Name</th> </tr>";
	while($row=mysql_fetch_assoc($recordfound))
	echo "<tr> <td>". $row["uid"]."</td><td>".$row["uname"]."</td></tr>";
	echo "</table>";
}
     else
     echo "No records found!";
   }
   else
   echo"connection failed";
?>
</fieldset>
 </div> 
 <br><br><br> <br><br><br><br><br><br><br><br><br><br><br><br> <br><br><br><br><br><br><br><br><br>       
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