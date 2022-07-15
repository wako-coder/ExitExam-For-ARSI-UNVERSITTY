<?php
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>display</title>
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
$dept=$_SESSION['dept'];
$univesity=$_SESSION['univesity'];	
$year=$_SESSION['year'];
//log file find ip address
if(!empty($_SERVER["HTTP_CLIENT_IP"]))
$ipaddress=$http_client_ip;
elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
$ipaddress=$http_x_forwarded_for;	
else
$ipaddress=$_SERVER['REMOTE_ADDR'];
// some variable declaration
$start_time = date("d M Y @ h:i:s");
$work_date=date('Y-m-d');
$activity_type="Take Exit Exam as Re_Exam";


$activity="During These Time Candidate Take Exam.Detail Information<br>
          [Candidate_ID:$uid,Department:$dept,University:$univesity,Year:$year]";	
          
$logsql=mysql_query("insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time',
         '$start_time','$activity_type','$activity','$ipaddress','$work_date')");
         
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
require("candmenu.php");	

		
?>

    </div><!--close menubar-->	
  <div id="site_content"></div>  
	<div id="site_content">
<div class="sidebar_container">
</div>
	  
<div id="content">
<?php
//variable declaration
$uid=$_SESSION['$uid'];
$uname=$_SESSION['sun'];


$sql="select * from candidate WHERE cid='$uid'";
$recordfound=mysql_query($sql,$con);
while($row=mysql_fetch_assoc($recordfound))
{
$year=$row["year"];
$dept=$row["dept"];
$univesity=$row["unversity"];
$fullname=$row["cfname"]." " .$row["cmname"]." ".$row["clname"];	
}

	//check take exam before or not
$sqq="select *from question WHERE dept='$dept' and status='active' and year='$year' and question_type='Re_Exam' ";
$result = mysql_query($sqq);
$Wronganswer=0;
$Correctanswer=0;
$totalquestion=0;
$total=0;

while($row = mysql_fetch_array($result))
{
$txAns=$row["answer"];
$qid=$row["qid"];
$selectedanswer=$_POST[$qid];
     if($selectedanswer==$txAns)
	       $Correctanswer++;
	else	
	       $Wronganswer++;
}
$totalquestion=$Wronganswer+$Correctanswer;
//set score calculation the result;
$score1="select *from set_score where dept='$dept' and year='$year'";
$holdscore=mysql_query($score1,$con);
if(mysql_num_rows($holdscore)>0)
{
if($row=mysql_fetch_assoc($holdscore))
{
$passscore=$row["score"];
$total=($Correctanswer*100)/$totalquestion;
if($total>=$passscore)
$results="Competent";
else
$results="Not Competent";
$total=round($total,2);
$total=$total."%";
$sqlresult="update result set totalQestion='$totalquestion',correctanswer='$Correctanswer',wronganswer='$Wronganswer',
     total='$total',status='$results',program='Re_Exam' where uid='$uid'";
if(mysql_query($sqlresult))
echo "Yes";	
else
echo "No Result Set";

mysql_query("update  takenexam  set program='Re_Exam'  where uid='$uid'");
header('Location: candidatepage.php');
}}
else
echo"the score is not set";
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
  <br><br><br><br>       
</div>
       <div id="navigation">
<?php
require("../footer.php");
?>
   
</div>
</body>
</html>
