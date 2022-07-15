<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>unread Request</title>

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
	width:400px;
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

	 
	<div class="sidebar_container">
	<div class="sidebar">
	<div class="sidebar_item" style="height: 500px;">

<h2>Additional Link</h2>

   <?php
	require("cansidelink.php");
	?>
<br><br><br>
	</div>  
	</div>
	</div>		 
<div id="content">
<div class="content_item">
<div class="style1" id=textinput>

<?php
$id=$uid=$_SESSION['$uid'];

$query1=mysql_query("UPDATE notification SET status='seen by user' where uid='$id'");
	
if ($query1)
{
?>
<form action="" method="post">									
 <table width="70">
<form action="" method="post">
<tr>
<td>Department:</td>
<td>
<select name="dept" required >

<option value="">Select Your Option</option>
	<?php
	if($con)
	{
	$sql="select dname from department";
	$recordfound=mysql_query($sql,$con);
	if(mysql_affected_rows($con))
	{
	while($row=mysql_fetch_assoc($recordfound))
	{
	?>
<option value="<?php echo $row["dname"];?>"><?php echo $row["dname"];?></option>
	<?php
	}
	}
	else
	echo "No records found!";
	}
	else
	echo"connection failed";
	?> 
</select>
</td>
</tr>
<tr>
<td>Set Score:</td><td><input type="number" name="score" min="0" max="100" required placeholder="Enter Score up to 100%"/></td>
</tr>
<tr>
<td>Year:</td><td><input type="text" name="year"  pattern="[0-9]+" placeholder="Enter Year like 2010 "/></td>
</tr>
<tr>
<td><input type="submit" name="set" value="set score"></td>
<td><input type="reset"  value="Cancel"></td>
</tr>

</form>
</table>
</form>		
                               
                        <!-- /block -->
</div>
</div>
</div>
	 <?php
}}
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

  