<?php
session_start();
include("../connection.php");
require("head.php");

	?>
 <div id="main">
 	  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
	$uid=$_SESSION['$uid'];
	//year
	$sql="select * from candidate where cid='$uid'";
	$recordfound=mysql_query($sql,$con);
	while($row=mysql_fetch_assoc($recordfound))
	$year=$row["year"];
	//date
$chechdate="select * from examdate where year='$year' and question_type='Regular'";
$record=mysql_query($chechdate,$con);
while($row=mysql_fetch_assoc($record))
	{
	$sdate=$row["start_date"];
	$edate=$row["end_date"];
	}
$currentdate=date("Y-m-d");

?>
<div id="header">
	   <div id="banner">
	    
	    <!--<div id="welcome_slogan"> -->
		 
	   <?php
require("dmu.php");	   
?>
	   
	  </div>
   </div>
	<div id="navigation">
	<?php
require("candmenu.php");			
?>
<div class="container">	
	<div id="site_content">
<div class="sidebar_container">
</div>
	  
<div id="content" style="margin-top: 60px;">
<div class="style1">
<?php
if($con)
 {
 $sql="select * from result where uid='$uid' and program='Regular'";
$result=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
if($sdate<=$currentdate && $edate >= $currentdate )
{	
echo "<table border='1'>";
echo"<tr> <th>User ID</th><th>Full Name</th><th>Dept</th><th>University</th><th>TotalQuestion </th><th>Wrong </th><th>Correct </th><th>Total(100%)</th><th>Status </th>
	</tr>";
while($row=mysql_fetch_assoc($result))
{
$user=mysql_query("select*from user WHERE uid='$uid'",$con);
while($row1=mysql_fetch_array($user))
{
$candidate=mysql_query("select*from candidate WHERE cid='$uid'",$con);	
while($row2=mysql_fetch_array($candidate))
{
$fname=$row1["ufname"];
$mname=$row1["umname"];
$lname=$row1["ulname"];
$fullname=$fname." ".$mname." ".$lname;
	echo "<tr> <td>". $row["uid"]."</td><td>$fullname</td> <td>".$row2["dept"]."</td><td>".$row2["unversity"]."</td> <td>".$row["totalQestion"]."</td> <td>".$row["wronganswer"]."</td> <td>".$row["correctanswer"]."</td> <td>".$row["total"]."</td> <td>".$row["status"]." </td></tr>";
}
}
}
//end
echo "</table>";
}
else
echo"you have seen result during exam date";
}
     else
     echo "No Result found!";
   }
   else
   echo"connection failed";
?>

</div> 
	 <?php
}
else
{
header("location:../index.php");
}
?>
 <br><br><br><br><br><br><br><br><br><br><br><br> 
  <br><br><br><br><br><br><br><br><br><br><br><br>       
</div>
</div>
<div id="footer">
</div>
  <br> <br>
</div>
<?php
require("footer.php");
?>
</body>
</html>
