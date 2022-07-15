<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>View Exam Date</title>

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
	font-size:15px;;
	width:550px;
	text-align:left;
	margin-top: -130px;

	color: black;
	margin-left: -180px;
	line-height: 25px;
	
	
  	} 
  	.fieldset
{
	width:500px;
	text-align: left;
	margin-left: 15px;
	margin-top: 70px;
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
	<?php
	require("dmu.php");	
	?>	 
	</div>
	</div>
	<div id="navigation">
	<?php
	require("candmenu.php");
	?>
	</div>



	<div id="site_content">			 
<div id="content">
<div class="content_item">
<div class="style1" id=textinput>
<fieldset class="fieldset"><legend>View Each Exam Date t</legend>
<BR><BR>
<div style="margin-left: 20px; background-color:#bccdf1;">
 
</div>
<?php
if($con)
 {
 $sql="select * from examdate  ORDER by year ASC" or die(mysql_error());;
$recordfound=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
	
?>
<div style="height: auto;width: auto;margin-left: 20px;
border:solid 4px #dldbeg;
overflow-y:scroll;
overflow-x:scroll;">
	<?php
	echo "<table border='1'>";
	echo"<tr> <th>Date_ID</th><th>Start_date</th><th>End_Date</th><th>Start_Time</th><th>End_Time</th><th>year</th></tr>";
	while($row=mysql_fetch_assoc($recordfound))
echo "<tr> <td>". $row["date_id"]."</td><td>".$row["start_date"]."</td> <td>".$row["end_date"]."</td><td>".$row["start_time"]."</td><td>".$row["end_time"]."</td><td>".$row["year"]."</td></tr>";
	echo "</table></div>";	
}
    else
     echo "No records found!";
 }
   else
   echo"connection failed";
?>

<br>
 </fieldset>


</div> 
</div>
<br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
</div>
</div>
	 <?php
}
else
{
header("location:../index.php");
}
?>
</div>

<div id="footer">
<?php
require("../footer.php");
?>
</div>

<!--close footer-->  
  
</body>
</html>



