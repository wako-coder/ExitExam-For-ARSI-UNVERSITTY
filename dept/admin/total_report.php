<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>View Total Report</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <style type="text/css">
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
.style1 
{
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size: medium;
}
.fieldset
{
   width: 535px;
	text-align: left;
	margin-left: 10px;
	margin-top: 20px;
	height: auto;
	border-radius:0px;
	border-color: #801137;
	}

  </style>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,widtd=900, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>List of Passer</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width:600px;border:-10px solid red;margin-left:400px; font-size:16px; font-family:TimesNewRoman;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

</head>

<body>
 <div id="main">
  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
$uid=$_SESSION['$uid'];
$username=$_SESSION['sun'];
$role=$_SESSION['role'];
$year=$_SESSION['year'];
$login_time=$_SESSION['login_time'];
$logout_time="empty";
$totlarecordexist=mysql_query("select*from candidate where year='$year'");

if(!empty($_SERVER["HTTP_CLIENT_IP"]))
$ipaddress=$http_client_ip;
elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
$ipaddress=$http_x_forwarded_for;	
else
$ipaddress=$_SERVER['REMOTE_ADDR'];
// variable declaration
$start_time = date("d M Y @ h:i:s");
$work_date=date('Y-m-d');
$activity_type="View Total Report";
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
require("adminmenu.php");	

		
?>

    </div><!--close menubar-->	
	<div id="site_content">

	  <div class="sidebar_container">
	  </div>
 <div id="content" style="margin-left:30px;margin-top: 20px;">
 <fieldset class="fieldset">
<div style="height: 600px;width: 955px;
border:solid 4px #dldbeg;
overflow-y:scroll;
overflow-x:scroll;">

 <div id="print_content">
 <?php
 if(mysql_num_rows($totlarecordexist)>0)
 {
$rolenumber=0;
$m=0;
$f=0;
$totalstudent=0;
$totalstatus1=0;
$totalstatus2=0;
$regular=0;
$reexam=0;
$sql="select * from result";
$recordexist=mysql_query($sql,$con);
if(mysql_num_rows($recordexist)>0)
{
 ?>
   <br><br>
<table border="1"  style="margin-left: 15px;">
<tr>
<td colspan="12" style="text-align: center;font-weight: bold;font-size: 18px;">
Graduate Student List Who Are Taken Exit Exam In  <?php echo $year; ?> E.C all University 
 </td></tr>	
<tr>
<th>Role Number</th>
<th>Frist Name</th>	
<th>Middle Name</th>	
<th>Last Name</th>	
<th>Sex</th>	
<th>Dept</th>	
<th>Colleage </th>	
<th >University</th>	
<th>Status</th>	
<th>Score</th>
<th>Year</th>
<th>Program</th>			
</tr>
<?php
while($row=mysql_fetch_array($recordexist))
{

$status=$row["status"];
$score=$row["total"];
$candidateid=$row["uid"];
$program=$row["program"];		

$query="select * from candidate  where cid='$candidateid' and year='$year'";
$resultexist=mysql_query($query,$con);
if(mysql_num_rows($resultexist)>0)
{
while($row2=mysql_fetch_array($resultexist))
{
$sql=mysql_query("select*from user where uid='$candidateid'");
while($rw1=mysql_fetch_assoc($sql))

{
$rolenumber++;
//total candidate
$sex=$rw1["sex"];
if($sex=='m')
$m++;
else
$f++;
//pass fail	
if($status=='Competent')
$totalstatus1++;
else
$totalstatus2++;
//regular or take rexam
if($program=='Regular')
$regular++;
else
$reexam++;

		echo "<tr> <td>".$rolenumber."</td><td>".$rw1["ufname"]."</td> <td>".$rw1["umname"].
		"</td> <td>".$rw1["ulname"]."</td> <td>".$rw1["sex"]."</td>  <td>".$row2["dept"]."</td>
		<td>".$row2["colleage"]."</td> <td>".$row2["unversity"]."</td> <td>".$status."</td>
		<td>".$score."</td><td>".$row2["year"]."</td><td>".$row["program"]."</td></tr>";	
		}}
		}}
$totalstudent=$m+$f;
$totalstatus=$totalstatus1+$totalstatus2;
$totalprogram=$regular+$reexam;
echo"<tr> <td colspan=12>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>";
echo"<tr> <td colspan=4 style='text-align: center;font-weight: bold;'>Total Candidate</td> <td colspan=4   
	  style='text-align: center;font-weight: bold;'>Total Status</td> <td colspan=4   
	  style='text-align: center;font-weight: bold;'>Total Candidate Who Take Exam as Regular and Re_Exam</td></tr>";
echo"<tr> <td colspan=2>Male</td><td colspan=2>$m</td> <td colspan=2>Competent</td><td colspan=2>$totalstatus1</td><td colspan=2>As Regular</td><td colspan=2>$regular</td></tr>";
echo"<tr> <td colspan=2>Female</td><td colspan=2>$f</td> <td colspan=2>Not Competent</td><td colspan=2>$totalstatus2</td><td colspan=2>As Re_Exam</td><td colspan=2>$reexam</td></tr>";
echo"<tr> <td colspan=2>Total</td><td colspan=2>$totalstudent</td> <td colspan=2>Total</td><td colspan=2>$totalstatus</td><td colspan=2>Total</td><td colspan=2>$totalprogram</td></tr>";
?>
</table>

 </div>
 <br><br>
 <a href="javascript:Clickheretoprint()" target="_blank" ><font size="5"color="#3d80c2">Print Report!</font></a>
<?php

$activity="View Report Of <br>Total candidate Who taken Exit Exam(Female=$f,Male=$m,total=$totalstudent),Result(Competent=$totalstatus1,Total Non Competent=$totalstatus2,Total=$totalstatus)";
$logsql=mysql_query("insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");
	//.....end log file record


}
else
echo"No Report Found!!!";
}
else
echo "No Candidate Registerd In $year year";
?>	 
<br><br><br><br> 
  <br><br><br><br> 
    <br><br><br><br> 
      <br><br><br><br>   
      <br><br><br><br> 
  <br><br><br><br> 
  
    </div>  
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







