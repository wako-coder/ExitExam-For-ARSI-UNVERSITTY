<?php
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
$year=$_SESSION['year'];
$sql="select*from depthead where did='$uid'";
$record=mysql_query($sql,$con);
if(mysql_num_rows($record)>0)
{
while($row=mysql_fetch_array($record))
{
$dept=$row["dname"];
$unverid=$row["uid"];	
$sql2=mysql_query("select*from university where uid='$unverid'");
while($unrow=mysql_fetch_array($sql2))
$univer=$unrow["uname"];	
}	
}

function decryptpassword( $encryptedpassword)
{
$cryptKey= 'qJB0rGtIn5UB1xG03efyCp';
$decryptpassword= rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $encryptedpassword ),
           MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
return($decryptpassword );
}
?>
  <div id="header">
	   <div id="banner">
	    
	    <!--<div id="welcome_slogan"> -->
      <?php
require("dmu.php");	   
?>
	 <div id="header">
        <div id="banner">

            <!--<div id="welcome_slogan"> -->
            <!-- Header Layout Content -->
            <div class="mdk-header-layout__content page">
                <div class="page__header  page__header-nav mb-0">
                    <div class="container page__container">
                        <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0 d-none d-md-flex"
                            id="secondaryNavbar">
	<?php
require("deptmenu.php");			
?>
          </div>
                    </div>
                </div>

            </div><!--close menubar-->	
	<div id="site_content">

	  <div class="sidebar_container">
	  </div>
 <div id="content" style="margin-left:30px;margin-top: 20px;">
 <fieldset class="fieldset">
 <br>
 <center><a href="javascript:Clickheretoprint()" target="_blank" ><font size="5"color="#3d80c2">Print</font></a></center>
 <div style="height: 600px;width: 955px;
border:solid 4px #dldbeg;
overflow-y:scroll;
overflow-x:scroll;">
<?php
$totlarecordexist=mysql_query("select*from candidate where year='$year' and unversity='$univer' and dept='$dept'");
if(mysql_num_rows($totlarecordexist)>0)
{
?>
 <div id="print_content">
 <?php
$rolenumber=0;
$sql="select * from account where password_status='unchanged'";
$recordexist=mysql_query($sql,$con);
if(mysql_num_rows($recordexist)>0)
{		
 ?>
   <br><br>
<table border="1" style="margin-left: 20px;" >
<tr><td colspan="12" style="text-align: center;font-weight: bold;font-size: 18px;">Graduate Student account List Who Are Take Exit Exam in <?php echo $univer;?>  For Department Of <?php echo $dept; ?> In <?php echo $year; ?> E.C </td></tr>	
<tr>
<th>N<u>O</u></th>
<th>candidate_ID</th>
<th>Frist Name</th>	
<th>Middle Name</th>	
<th>Last Name</th>	
<th>Sex</th>	
<th>Dept</th>	
<th>Colleage </th>	
<th >University</th>	
<th>User Name</th>	
<th>Password</th>
<th>Year</th>		
</tr>
<?php
while($row=mysql_fetch_array($recordexist))
{
$userid=$row["uid"];
$un=$row["username"];
$encrypt_pw=$row["password"];
$pw=decryptpassword($encrypt_pw);
$candidates="select*from candidate where cid='$userid' and dept='$dept' and year='$year'";
$candidateexist=mysql_query($candidates,$con);
while($ro=mysql_fetch_array($candidateexist))
{
$sql=mysql_query("select*from user where uid='$userid'");
while($row1=mysql_fetch_assoc($sql))
{
	
		
$fname=$row1["ufname"];
$mname=$row1["umname"];	
$lname=$row1["ulname"];
$sex=$row1["sex"];
$colleage=$ro["colleage"];	
$rolenumber++;
echo "<tr>";
echo"<td>".$rolenumber."</td>
	<td>".$userid."</td>
	<td>".$fname."</td> 
	<td>".$mname."</td>
	<td>".$lname."</td> 
	<td>".$sex."</td>  
	<td>".$dept."</td> 
	<td>".$colleage."</td> 
	<td>".$univer."</td> 
	<td>".$un."</td> 
	<td>".$pw."</td>
	<td>".$year."</td>";
echo"</tr>";
}
}
}

?>
</table>
 </div>
 </div>
 <br><br>
<?php
}
else
echo"No Result  Found!!!".mysql_error($con);
}
else
echo"No Candidate Registered  In $year Year";
?> 
  </fieldset>
  <br>  <br> 
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







