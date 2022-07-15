<?php
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>feedback page</title>
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
$uid=$_SESSION['$uid'];
$username=$_SESSION['sun'];
$role=$_SESSION['role'];
$login_time=$_SESSION['login_time'];
$logout_time="empty";

$sql="select*from user where uid='$uid'";
$record=mysql_query($sql,$con);
if(mysql_num_rows($record)>0)
{
while($row=mysql_fetch_array($record))
{
$id=$row["uid"];	
$fn=$row["ufname"];	
$mn=$row["umname"];
$email=$row["email"];			
}
	
}
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
<fieldset class="fieldset"><legend>Feedback us</legend>

<table style="margin-left: 20px;">
<form action="" method="post">
<tr>
<td>Frist Name:</td><td><input type="text" name="fn"  placeholder="Enter Frist Name" value="<?php echo $fn;?>" readonly /></td>
</tr>
<tr>
<td>Father Name:</td><td ><input type="text" name="fan" placeholder="Enter Father Name" value="<?php echo $mn;?>" readonly/></td>
</tr>
<tr>
<td>Date:</td><td><input type="text" name="date"  value="<?php echo date("Y-m-d");?>"  readonly /></td>
</tr>
<tr>
<td>Email:</td><td><input type="email" name="email"  placeholder="Enter Correct Email Address" value="<?php echo $email;?>" readonly/></td>
</tr>
<tr>
<td>Comment:</td><td>
<textarea  name="comment" required cols="50" rows="5"  placeholder="Write Your Comment From Here......."></textarea></td>
</tr>

<tr>
<td><input type="submit" name="feedback" value="Send"></td>
<td><input type="reset"  value="Cancel"></td>
</tr>
</form>
</table>
<br>
<?php
if(isset($_POST["feedback"]))
{

//start log file record....
//log file find ip address
if(!empty($_SERVER["HTTP_CLIENT_IP"]))
$ipaddress=$http_client_ip;
elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
$ipaddress=$http_x_forwarded_for;	
else
$ipaddress=$_SERVER['REMOTE_ADDR'];
// variable declaration
$time = time();
$start_time = date("d M Y @ h:i:s");
$work_date=date('Y-m-d');
$activity_type="send comment to exam editor";

	//.....end log file record	
	
	
	
	
$fn=$_POST["fn"];	
$ln=$_POST["fan"];
$date=$_POST["date"];
$email=$_POST["email"];
$comment=$_POST["comment"];
$status="unread";
$activity="content of comment($comment)";
if($con)
{
$insert="insert into comment values(' ','$id','$fn','$ln','$date','$email','$comment','$status')";
$logsql=mysql_query("insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");
$correctinsert=mysql_query($insert,$con);
if($correctinsert && $logsql)
echo"The Comment Successfully Sent,Thank you!!!";
else
echo"The Comment Is Not Successfully Sent".mysql_error($con);	
}
else
echo"connection faild".mysql_error();

}
?>
<br><br>
</fieldset>  
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
<br><br>
</div>
</body>
</html>
