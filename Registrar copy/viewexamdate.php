<?php
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>View Exam Date page</title>
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
	
	table 
{
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
 <fieldset class="fieldset">
 <center>
<br>
 <br>
 <table>
<form action="" method="post">
<tr><td colspan="2">Enter Year To see Exam Date:</td></tr>
<tr>
<td><input type="number" name="year" required placeholder="Enter Year" /></td>
<td><input type="submit" name="search" value="Search" /></td>
</tr>

</form>
</table>
 <br>

<?php
if(isset($_POST["search"]))
{
$y=$_POST["year"];
 $sql="select * from examdate where year='$y'";
 $year=mysql_query($sql,$con);
 $yearexist=mysql_num_rows($year);
 if($yearexist>0)
 {
 echo "<table border=1><tr> <th>Question_type</th><th>Start_date</th><th>End_Date</th><th>Start_Time</th><th>End_Time</th><th>year</th></tr>";
 while($row=mysql_fetch_assoc($year))
 {
 echo "<tr><td>".$row["question_type"]."</td><td>".$row["start_date"]."</td> <td>".$row["end_date"]."</td><td>".$row["start_time"]."</td><td>".$row["end_time"]."</td><td>".$row["year"]."</td></tr>";	
 }	
 echo "</table>";	
 }
 else
 echo "NO Exam Date Post For $y Year.";
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
