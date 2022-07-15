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
	} 
	}
	else
	echo"No Candidate Record Found"	;
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
	  
<div id="content" style="margin-top: 50px;margin-left: 60px;font-family: times new roman;font-size: 25px;">
<?php
$row1=0;
$row2=0;
$row3=0;
$sql1="select*from result WHERE uid='$uid' and status='Competent' and program='Regular'";
$userfound1=mysql_query($sql1,$con);
$row1=mysql_num_rows($userfound1);

$sql2="select*from result WHERE uid='$uid' and status='Competent' and program='Re_Exam'";
$userfound2=mysql_query($sql2,$con);
$row2=mysql_num_rows($userfound2);

$sql3="select*from result WHERE uid='$uid' and status='Not Competent' and program='Re_Exam'";
$userfound3=mysql_query($sql3,$con);
$row3=mysql_num_rows($userfound3);

if($row1>0)
echo"Not Allowed To Take Re_Exam!!! ,But You are Competent Exit Exam";
elseif($row2>0)
echo"Not Allowed To Take Re_Exam!!! ,But You are Competent Re_Exam";
elseif($row3>0)
echo"Not Allowed To Take Re_Exam!!! ,But You are Not Competent In The Re_Exam";
else
{	
$checkfee="select*from  notification where uid='$uid' and pay_fee='Yes'";
$yesfee=mysql_query($checkfee,$con);
$r=mysql_num_rows($yesfee);
if($r>0)
{
	
	//question info
$sql="select*from question WHERE dept='$dept' and year='$year' and question_type='Re_Exam'";
$recordexist=mysql_query($sql,$con);
$totalquestion=mysql_num_rows($recordexist);
//date and time
$chechdate="select * from examdate where year='$year' and question_type='Re_Exam'";
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

//timer
$timer="select*from timer WHERE dept='$dept' and year='$year' and question_type='Re_Exam'";
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
<?php
echo "<br>current=".$currentdate;
echo "<br>sdate=".$sdate;
echo "<br>edate=".$edate;
echo "<br>currenttime=".$currenttime;
echo "<br>stime=".$stime;
echo "<br>etime=".$etime;
?>
<div id="style1">
<?php
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
?>
<p><ul>
<img width="40" height="20" src="../image/right.jpg">
 Any candidate who take <b>Re Exit Exam </b>Re_Exit must be read all instruction carefully before start exam.so before start read carefully the following instruction.
<div style="margin-left: 50px;">
<li>you should Must Be Read all instruction</li> 
<li>you should Must Be check Exam Date  in the home page notice link</li> 
<li>you should Must Be check Exam Starting and ending time  in the home page notice link</li> 
<li>this exit exam is for  <b><?php echo $year;?></b> Graduate students  and it is  <b><?php echo $dept;?></b>  department only</li>  
<li>total number of question is  <b><?php echo $totalquestion;?></b> </li> 
<li>all question type is multiple choice,so you should select one from list option</li>
<li>total time allowed for this exit exam is  <b><?php echo $examtime;?></b>  </li>
<li>therefor to start exam click <b>start eaxm button below </b> and after click the exam question is display</li>  
</div>
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
window.location.href="reexampasswordpage.php";     
}
</script>
<br><br><br><br><br><br><button onclick="msg()">Start Exam</button>

<?php
}
else
echo"<br>The Exam Question Is Not Post";
}
else
echo"<br> The Exam  Time Is Expaired!!!";
}
else
echo"<br> The Exam  Time Is Not Specified!!!";
}
else
echo "<br>The Exam Date Is  Expaired";
}
else
echo "<br>The Exam Date Is Not Specified";
?>
</div>
<?php
}
else
echo "You Must Be Pay Fee To Take Re_Exam,To Pay Fee Click Exam Applicant header link ";
}

?>
	 <?php
}
else
{
header("location:../index.php");
}
?>
 <br><br><br><br><br><br>  <br><br><br> 
  <br><br><br><br><br><br>  <br><br><br>  <br>  <br>   
</div>
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
