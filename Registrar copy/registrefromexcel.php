<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>Registrar page</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
<script type="text/javascript" src="../css/javasscript.js"></script>
  <style type="text/css">

.style1 
{
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size: medium;
}
.fieldset
{
	width:600px;
	text-align: left;
	margin-left:150px;
	margin-top: 20px;
	height: auto;
	border-radius:0px;
	border-color: #801137;
	text-align: center;
}
table {
    border-collapse: collapse;
 
}

th, td {
    text-align: left;
    padding: 8px;
}
th {
    text-align: center;
   
}
  tr:nth-child(even)
  {
  	background-color: #f2f2f2
  }

	input[type=text],select,input[type=submit],input[type=reset],textarea,,input[type=file]
	 {
    width: 60%;
    padding: 5px 10px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid #70c0c9;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    
 
}
input[type=text]:focus {
    border: 1px solid #8f1b29;
}

  </style>
  
</head>

<body>
 <div id="main">
  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
//$year=$_SESSION['year'];
$uid=$_SESSION['$uid'];
$username=$_SESSION['sun'];
$role=$_SESSION['role'];
$login_time=$_SESSION['login_time'];
$logout_time="empty";
	
$sql="select * from registrar where rid='$uid'";
$record=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
while($row=mysql_fetch_assoc($record))
{	
$unverid=$row["uid"];
$sql2=mysql_query("select*from university where uid='$unverid'");
     while($unrow=mysql_fetch_array($sql2))
      $university=$unrow["uname"];
	}

	}
	else
	echo "No records found!";
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
	 
<div id="content">
 <fieldset class="fieldset"><legend>upload from excel</legend>
 <br><br>
 
 
 <form action="" method="post" enctype="multipart/form-data">
 <center>
 <table border="1">
 <tr>
 <td colspan="2"><input type="file" name="file" required title="upload csv file"/>	
 </td>	
</tr>
<tr>
<td><input type="submit" name="registerfromexcel" value="Insert into Database"/></td>
<td><input type="reset"  value="cancel"/></td>
</tr>

 </table>
  </center>
 </form>
<?php


if(isset($_POST["registerfromexcel"]))
{

if($_FILES['file']['name'])
	{
		
include("../connection.php");
$uid=$_SESSION['$uid'];
$rolecan="Candidate";
		$filename=explode(".",$_FILES['file']['name']);
		if($filename[1]=='csv')
		{
			$handle=fopen($_FILES['file']['tmp_name'],"r");
			while($data=fgetcsv($handle))
			{
					$cid=mysql_real_escape_string($data[0]);
					$fname=mysql_real_escape_string($data[1]);
					$mname=mysql_real_escape_string($data[2]);
					$lname=mysql_real_escape_string($data[3]);
					$sex=mysql_real_escape_string($data[4]);
					$dept=mysql_real_escape_string($data[5]);
					$colleage=mysql_real_escape_string($data[6]);
					$university=mysql_real_escape_string($data[7]);
					$year=mysql_real_escape_string($data[8]);
					
$sql1="insert into user  values('$cid','$fname','$mname','$lname','$sex',' ',' ',' ','$rolecan')";
$result1=mysql_query($sql1)or die(mysql_error());
$sql="insert into candidate  values('$cid','$dept','$colleage','$university','$uid','$year')";
$result=mysql_query($sql)or die(mysql_error());
				
			}
			if($result && $result1)
          	print "Successfully Registerd";
          	else
          	print"Not Registerd".mysql_error($con);
		}
		else
		print "<font color=#9355aa>file is not csv type</font>";
	}	
}

?>
 
 
<br><br>
<br>
 </fieldset>

 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
 </div>
        </div>
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
