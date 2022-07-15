<?php
ob_start();
session_start();
include("../connection.php");
require("head.php");
?>

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

$sql="select*from registrar where rid='$uid'";
$record=mysql_query($sql,$con);
if(mysql_num_rows($record)>0)
{
while($row=mysql_fetch_array($record))
{
$unverid=$row["uid"];
$sql2=mysql_query("select*from university where uid='$unverid'");
while($unrow=mysql_fetch_array($sql2))
$univer=$unrow["uname"];	
}	
}
?>
 
		<div id="header">
	   <div id="banner">
	    
	    <!--<div id="welcome_slogan"> -->
		 
		<?php
require("dmu.php");	   
?>
                <!--</div> <!--close welcome_slogan-->
            </div>
            <!--close banner-->
        </div>
        <div class="mdk-header-layout__content page">
            <div class="page__header  page__header-nav mb-0">
                <div class="container page__container">
                    <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0 d-none d-md-flex"
                        id="secondaryNavbar">
                        <?php
require("registrar_menu.php");		

		
?>
                    </div>
                </div>
            </div>

        </div>
    </div>
 <div id="content" style="margin-left:30px;margin-top: 20px;">
 <fieldset class="fieldset">
<div style="height: 600px;width: 955px;
border:solid 4px #dldbeg;
overflow-y:scroll;
overflow-x:scroll;">
<?php
$totlarecordexist=mysql_query("select*from candidate where year='$year'");
if(mysql_num_rows($totlarecordexist)>0)
{
?>
 <div id="print_content">
 <?php
$rolenumber=0;
$m=0;
$f=0;
$totalstudent=0;
$totalstatus1=0;
$totalstatus2=0;
$sql="select * from result ";
$recordexist=mysql_query($sql,$con);
if(mysql_num_rows($recordexist)>0)
 {
 ?>
   <br><br>
<table border="1"  style="margin-left: 15px;">
<tr><td colspan="12" style="text-align: center;font-weight: bold;font-size: 18px;">Graduate Student List Who Are Take Exit Exam in <?php echo $univer;?>  For All Department  In <?php echo $year; ?> E.C </td></tr>	
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
</tr>
<?php
while($row=mysql_fetch_array($recordexist))
{

$status=$row["status"];
$score=$row["total"];
$candidateid=$row["uid"];	

		$query="select * from candidate  where year ='$year' and cid='$candidateid' and unversity='$univer'";
		$resultexist=mysql_query($query,$con);
		if(mysql_num_rows($resultexist)>0)
		{
		while($row2=mysql_fetch_array($resultexist))
		{
			$sql=mysql_query("select*from user where uid='$candidateid'");
             while($rw1=mysql_fetch_assoc($sql))
			
			{	
			$rolenumber++;
		$sex=$rw1["sex"];
		if($sex=='m')
		$m++;
		else
		$f++;	
			if($status=='Competent')
			$totalstatus1++;
			else
			$totalstatus2++;
		echo "<tr> <td>".$rolenumber."</td><td>".$rw1["ufname"]."</td> <td>".$rw1["umname"].
		"</td> <td>".$rw1["ulname"]."</td> <td>".$rw1["sex"]."</td>  <td>".$row2["dept"]."</td>
		<td>".$row2["colleage"]."</td> <td>".$row2["unversity"]."</td> <td>".$status."</td>
		<td>".$score."</td><td>".$row2["year"]."</td></tr>";	
		}}}
		}
$totalstudent=$m+$f;
$totalstatus=$totalstatus1+$totalstatus2;
	echo"<tr> <td colspan=12>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>";
	echo"<tr> <td colspan=5 style='text-align: center;font-weight: bold;'>Total Candidate</td> <td colspan=6   
	  style='text-align: center;font-weight: bold;'>Total Status</td></tr>";
	echo"<tr> <td colspan=2>Male</td><td colspan=3>$m</td> <td colspan=3>Competent</td><td colspan=3>$totalstatus1</td></tr>";
	echo"<tr> <td colspan=2>Female</td><td colspan=3>$f</td> <td colspan=3>Not Competent</td><td colspan=3>$totalstatus2</td></tr>";
	echo"<tr> <td colspan=2>Total</td><td colspan=3>$totalstudent</td> <td colspan=3>Total</td><td colspan=3>$totalstatus</td></tr>";
?>
</table>

 </div>
 <br><br>
 <a href="javascript:Clickheretoprint()" target="_blank" ><font size="5"color="#3d80c2">Print Report!</font></a>
<?php

$activity="Total candidate who take exit exam(Female=$f,Male=$m,total=$totalstudent),Result(Competent=$totalstatus1,Total Non Competent=$totalstatus2,Total=$totalstatus)";
      
 
//start log file record....
//log file find ip address
if(!empty($_SERVER["HTTP_CLIENT_IP"]))
$ipaddress=$http_client_ip;
elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
$ipaddress=$http_x_forwarded_for;	
else
$ipaddress=$_SERVER['REMOTE_ADDR'];
// variable declaration
$time = time();
$start_time = date("d M Y @ h:i:s");
$work_date=date('Y-m-d');
$activity_type="view candidate report";
$logsql=mysql_query("insert into logtable values(' ','$uid','$username','$role','$start_time','$activity_type','$activity','$ipaddress','$work_date')");
	//.....end log file record


}
else
echo"No Report Found!!!";
}
else
echo"No Report Found  In $year Year";
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
		</div>
		<br><br>
	</div>
<?php
require("footer.php");
?>
   
</body>
</html>







