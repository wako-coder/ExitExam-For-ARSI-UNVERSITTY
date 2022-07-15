<?php
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
 <title>View exam date page</title>
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
margin-left: 100px;
margin-top: 20px;
height: 600px;;
border-radius:0px;
border-color: #801137;

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
  </style>
  
</head>

<body>
 <div id="main">
 	  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
$uid=$_SESSION['$uid'];
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
  <div id="site_content"></div>  
	<div id="site_content">
<div class="sidebar_container">
</div>
	  
<div id="content" style="margin-left:30px;margin-top: 20px;">
 <br>
 
 
<fieldset class="fieldset">
<table style="margin-left: 20px;">
<form action="" method="post">
<tr>
<td>
<input type="text" name="searchkey" placeholder="search by using Year"/> 
<input type="submit" name="search" value="search" /></td>
</tr>
</form>	
</table>
<hr style="border-color: #801137;width: 700px;m">
<br>
<?php
if(isset($_POST["search"]))
{
$searchvalue=$_POST["searchkey"];	
 $sql="select * from examdate where year='$searchvalue'";
$recordfound=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
	
echo "<table border='1' style='margin-left: 20px;'>";
echo"<tr> <th>Question_type</th><th>Start_date</th><th>End_Date</th><th>Start_Time</th><th>End_Time</th><th>year</th></tr>";
while($row=mysql_fetch_assoc($recordfound))
echo "<tr><td>".$row["question_type"]."</td><td>".$row["start_date"]."</td> <td>".$row["end_date"]."</td><td>".$row["start_time"]."</td><td>".$row["end_time"]."</td><td>".$row["year"]."</td></tr>";
	echo "</table></div>";	
}
else
    echo "No records found!";
echo"<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";	
 }
else
{
if($con)
 {
 if($con)
 {
 $sql="select * from examdate";
$recordfound=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
	
?>
<div style="height: 460px;width: auto;margin-left: 40px;
border:solid 4px #dldbeg;
overflow-y:scroll;
overflow-x:scroll;">
<br><br><br><br>
	<?php
	echo "<table border='1'>";
	echo"<tr> <th>Question_type</th><th>Start_date</th><th>End_Date</th><th>Start_Time</th><th>End_Time</th><th>year</th></tr>";
	while($row=mysql_fetch_assoc($recordfound))
echo "<tr><td>".$row["question_type"]."</td><td>".$row["start_date"]."</td> <td>".$row["end_date"]."</td><td>".$row["start_time"]."</td><td>".$row["end_time"]."</td><td>".$row["year"]."</td></tr>";
	echo "</table></div>";	
}
else
    echo "No records found!";
 }
   else
   echo"connection failed";
   }
   else
   echo"connection failed";
   }
?>
</div>
<br>
</fieldset>


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
