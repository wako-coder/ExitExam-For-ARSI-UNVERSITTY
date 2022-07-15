<?php
session_start();
include("../connection.php");
require("head.php");

	?>
 <div id="main">
 	  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{


if(!empty($_SERVER["HTTP_CLIENT_IP"]))
$ipaddress=$http_client_ip;
elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
$ipaddress=$http_x_forwarded_for;	
else
$ipaddress=$_SERVER['REMOTE_ADDR'];

// some variable declaration
$start_time = date("d M Y @ h:i:s");
$work_date=date('Y-m-d');
$activity_type="Request";
$username=$_SESSION['sun'];
$role=$_SESSION['role'];
$login_time=$_SESSION['login_time'];
$logout_time="empty";
	
	
	
$uid=$_SESSION['$uid'];
$sql="select * from candidate where cid='$uid'";
$recordfound=mysql_query($sql,$con);
while($row=mysql_fetch_assoc($recordfound))
{
$dept=$row["dept"];
$univer=$row["unversity"];
$year=$row["year"];
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


	<div class="container-fluid">

<div class="row">
	<div class=" col-2">


	
   <?php
	require("cansidelink.php");
	?>
	
	</div>
	<div class=" col-8">
	 
<div id="content">
<div class="content_item" style="margin-top: 20px;margin-left: 200px;">
<div class="style1">
<fieldset class="fieldset"><legend>Write Your Reason</legend>
<?php
$currentdate=date("Y-m-d");
$chechdates="select * from examdate where year='$year' and question_type='Payment'";
$records=mysql_query($chechdates,$con);
if(mysql_num_rows($records)>0)
{
while($row=mysql_fetch_assoc($records))
{
$sdate=$row["start_date"];
$edate=$row["end_date"];
 }
 if($sdate <=$currentdate && $edate>=$currentdate )
 {
?>
<?php

$sql="select*from notification where uid='$uid'";
$recordexist=mysql_query($sql,$con);
$total=mysql_num_rows($recordexist);
if($total<1)
{
$r=mysql_query("select*from result where uid='$uid' and status='Not Competent'");
if(mysql_num_rows($r)>0)
{
$D=date("Y-m-d");
?>
 <table>
<form action="" method="post">
<tr>
<td>User_ID:</td><td><input type="text" name="uid"  value="<?php echo $uid;?>" required readonly/></td>
<td>Department:</td><td><input type="text" name="dept1"  value="<?php echo $dept;?>" required readonly/></td>

</tr>
<tr>
<td>University:</td><td><input type="text" name="univ"  value="<?php echo $univer;?>" required readonly/></td>
<td>Year:</td><td><input type="text" name="year"   value="<?php echo $year;?>" readonly  /></td>
</tr>
<tr>
<td> Reason:</td>
<td><textarea name="resean"  placeholder="write your resean from here... " required ></textarea></td>
<td>Date:</td><td><input type="text" name="dates" value="<?php echo $D;?>"  readonly /></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="send" value="Send"></td>
<td colspan="2"><input type="reset"  value="Cancel"></td>
</tr>
</form>
</table>
<?php
}
else
echo"Candidate Who Can Send Request Only Can't Pass The Exit Exam";
}
else
echo "Not Allowed To Sent Request More 1 times !!!.";
}
 else
 echo "The Applicant Date IS bitween $sdate upto  $edate";
 }
 else
 echo "<div style='margin-left:300px;'>Exam Date Is Not Post</div>";
?>

</div> 
<?php
if(isset($_POST["send"]))
{
$id=$_POST["uid"];
$unv=$_POST["univ"];
$depart=$_POST["dept1"];
$reasean=$_POST["resean"];
$year=$_POST["year"];
$date1=$_POST["dates"];
$editorstatus='unread';
$userstatus='unread';
$pay_fee='No';
$check='No';
$userlastresponse='No';

if($con)
{
 $sql="insert into notification values(' ','$id','$depart','$unv','$reasean','$year','$date1','$editorstatus','$userstatus','$pay_fee','$check','No Bank_Receipt','$userlastresponse')";
 $insert=mysql_query($sql,$con);
   if($insert)
	{
	$x='<script type="text/javascript">alert("The Request Is   Sucessfully Sent!!!!");
	window.location=\'reexam.php\';</script>';
	 echo $x;	
	 
$activity="Candidate Send Requuest To Exam Editor
          [Candidate_ID:$uid,Department:$dept,,Year:$year,Content:$reasean]";	
          
$logsql=mysql_query("insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time',
         '$start_time','$activity_type','$activity','$ipaddress','$work_date')");	 
	 
	 
	 
	 
	}
	else
	echo" NO Request Is Not Sent".mysql_error($con);
	
}
else
echo"Connection Failed:".mysql_error($con);
}
?>
<br>
</fieldset>

</div>
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
</div>
<br> <br>
 <br> <br>
 <br> <br>
 <br> <br>
 <br> <br>
 <br> <br>
 <br> <br>
 <br> <br>
<div id="footer">
</div>

<!--close footer-->  
 
</div>  
<?php
require("footer.php");
?>
</body>
</html>


