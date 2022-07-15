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
$uname=$_SESSION['sun'];

//candidate info
	$sq="select*from candidate WHERE cid='$uid'";
	$recordexist=mysql_query($sq,$con);
	if(mysql_affected_rows($con))
	{
	while($row=mysql_fetch_array($recordexist))
	{
	$university=$row["unversity"];	
	$dept=$row["dept"];	
	$id=$row["cid"];
	$year=$row["year"];
	$_SESSION['year']=$year;
	} 
	}

//question info
$sql="select*from question WHERE dept='$dept' and year='$year' and question_type='Regular'";
$recordexist=mysql_query($sql,$con);
$totalquestion=mysql_num_rows($recordexist);
//date and time
$chechdate="select * from examdate where year='$year' and question_type='Regular'";
$recorddate=mysql_query($chechdate,$con);
$datecount=mysql_num_rows($recorddate);
while($row1=mysql_fetch_assoc($recorddate))
{
$sdate=$row1["start_date"];
$edate=$row1["end_date"];
$stime=$row1["start_time"];
$etime=$row1["end_time"];
 }
$currenttime=date("h:i:s ", time());
$currentdate=date("Y-m-d");
//taken exam
$takencount=0;
$takeexam="select * from takenexam where uid='$uid'";
$recordtaken=mysql_query($takeexam,$con);
$takencount=mysql_num_rows($recordtaken);

//timer
$timer="select*from timer WHERE dept='$dept' and year='$year' and question_type='Regular'";
$existtimer=mysql_query($timer,$con);
$totaltime=mysql_num_rows($existtimer);

	if(mysql_num_rows($existtimer)>0)
	{
	while($row=mysql_fetch_array($existtimer))
	{
	$hr=$row["hour"];	
	$min=$row["min"];	
	} 
	if($hr>0)
	$examtime=$hr.":".$min. "H/Minute ";
	else
	$examtime=$min." minute";
	}
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
 	
  <div id="site_content"></div>  
	<div id="site_content">
<div class="sidebar_container">
</div>  
<div id="content">
<div><center>
<?php
echo "<br>current=".$currentdate;
echo "<br>sdate=".$sdate;
echo "<br>edate=".$edate;
echo "<br>currenttime=".$currenttime;
echo "<br>stime=".$stime;
echo "<br>etime=".$etime;
?>
</center></div>
<div id="style1">
<?php

if($takencount==0)
{
if($datecount>0)
{
if($sdate<=$currentdate && $edate >= $currentdate )
{

if($totaltime>0)
{
if($stime<=$currenttime && $etime >=$currenttime)	
{
if($totalquestion>0)
{

?> <div id="course_content">
<p><ul>

<h1 <tr><td bgcolor="#110ceb"><center><font color="#00ffff" >To Start Exam Click Start Exam link</font></center></td></tr></h1>
<img src="userphoto/vv.jpg" class="" style="width:1000px;" >


</ul>
<?php


$password=mysql_query("select*from exam_passord where year='$year'");
if(mysql_num_rows($password)>0)
{	
while($pw=mysql_fetch_array($password))
{
$pss=$pw["password"];	
}

echo"Exam password is <b>".$pss."</b>";
}
?>
</p>
<script>
function msg()
{
var ab=window.confirm("Are You Ready To Take Exam");
if (ab==true)
window.location.href="passwordpage.php";     
}
</script>
<br><br><br><br><button class="btn btn-info" onclick="msg()">Start Exam</button>

<?php
}
else
echo"<br>The Question Is Not Post";
}
else
echo"<br> The Exam  Time Is Expaired!!!";
}
else
echo"<br> The Exam  Time Is Specified!!!";
}
else
echo "<br>The Exam Date Is  Expaired";
}
else
echo "<br>The Exam Date Is Not Specified";
}
else
echo"<br>you have take exam before";
?>

</div>
</div>
</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
<?php
}
else
{
header("location:../index.php");
}
?>
 <br><br><br>  
</div>
       <div id="footer">
   
</div>
<br><br>
</div>
<?php
require("footer.php");
?>
</body>
</html>
