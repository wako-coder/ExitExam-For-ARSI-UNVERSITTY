<?php
session_start();
include("../connection.php");
require("head.php");

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>display</title>
 
  
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
$activity_type="Take Exit Exam as Regular";


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
$sql="select * from candidate WHERE cid='$uid'";
$recordfound=mysql_query($sql,$con);
while($row=mysql_fetch_assoc($recordfound))
{
$year=$row["year"];
$dept=$row["dept"];
$univesity=$row["unversity"];
$sq=mysql_query("select*from user where uid='$uid'",$con);
while($row1=mysql_fetch_array($sq))
$fullname=$row1["ufname"]." " .$row1["umname"]." ".$row1["ulname"];	
}

	//check take exam before or not
$sqq="select *from question WHERE dept='$dept' and status='active' and year='$year' and question_type='Regular' ";
$result = mysql_query($sqq,$con);
	//check take exam before or not
$matching="select *from matching ";
$result2 = mysql_query($matching,$con);
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
while($row2 = mysql_fetch_array($result2))
{


$txAns1=$row2["answer1"];
$txAns2=$row2["answer2"];
$txAns3=$row2["answer3"];
$txAns4=$row2["answer4"];
$txAns5=$row2["answer5"];
$selectedanswer1=  $_POST['answer1'];
$selectedanswer2=  $_POST['answer2'];
$selectedanswer3=  $_POST['answer3'];
$selectedanswer4=  $_POST['answer4'];
$selectedanswer5=  $_POST['answer5'];
     if($selectedanswer1==$txAns1)
	       $Correctanswer++;
	else	
	       $Wronganswer++;
     if($selectedanswer2==$txAns2)
	       $Correctanswer++;
	else	
	       $Wronganswer++;
     if($selectedanswer3==$txAns3)
	       $Correctanswer++;
	else	
	       $Wronganswer++;
     if($selectedanswer4==$txAns4)
	       $Correctanswer++;
	else	
	       $Wronganswer++;
     if($selectedanswer5==$txAns5)
	       $Correctanswer++;
	else	
	       $Wronganswer++;
}
$totalquestion=$Wronganswer+$Correctanswer;
//set score calculation the result;
$score1="select *from set_score where dept='$dept' and year='$year'";
$holdscore=mysql_query($score1,$con);
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
//this user take exam
mysql_query("insert into takenexam  values('$uid','Regular')");
//result sent to database
$sqlresult="insert into result values('$uid','$totalquestion','$Correctanswer','$Wronganswer','$total','$results','Regular')";
if(mysql_query($sqlresult)){
	echo "Result Sent";
// echo "<script>alert('Result Sent');window.Location='candidatepage.php'</script>";	
// echo "<script></script>";
}
else
echo "no result set".mysql_error($con);
}
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
  <br><br><br>        
</div>
       <div id="navigation">
<?php
require("footer.php");
?>
   
</div>
</body>
</html>
