<?php
session_start();
include("../connection.php");
require("head.php");
?>

<body>
 <div id="main">
  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
$cid=$_GET['id'];
$uid=$_SESSION['$uid'];
$year=$_SESSION['year'];
$sql="select*from depthead where did='$uid'";
$record=mysql_query($sql,$con);
if(mysql_num_rows($record)>0)
{
while($row=mysql_fetch_array($record))
{
$dept=$row["dname"];	
$univer=$row["uid"];		
}	
}
?>
 <div id="header">
	   <div id="banner">
	    
	    <?php
require("dmu.php");	   
?>
  <div id="header">
	   <div id="banner">

	   
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

            </div>
    </div>
    </div><!--close menubar-->	
	<div id="site_content">

	  <div class="sidebar_container">
	  </div>
 <div id="content" style="margin-left:30px;margin-top: 20px;">

 <br><br> 


  <a href="javascript:Clickheretoprint()" target="_blank" ><font size="5"color="#3d80c2">Print !</font></a>
   <div id="print_content">
  <br><br><br><br> 
  <div style="margin-left: 10px;color: #5379ac;font-weight: bold;">
 <?php
$sql="select * from result  where uid='$cid'";
$recordexist=mysql_query($sql,$con);
if(mysql_num_rows($recordexist)>0)
{
$sq="select*from candidate where cid='$cid'";
$cand=mysql_query($sq,$con);
while($r=mysql_fetch_array($cand))
{
$sql=mysql_query("select*from user where uid='$cid'");
while($row1=mysql_fetch_assoc($sql))
{
	
$fname=$row1["ufname"];
$mname=$row1["umname"]	;
$lname=$row1["ulname"]	;
}
$dept==$r["dept"];
$college=$r["colleage"];
$university=$r["unversity"]	;

$fullname=$fname." ".$mname." ".$lname;
}
?>
<div style="background:#d7e1e3; width: 900px;text-align: center; height:400px;">
<table>
<tr>
<td><img src="../image/ministerlog.jpg" width="130" height="130"></td>
<td style="font-weight: bold;color: #3a6bb6;font-size: 25px;text-transform: capitalize; text-align: center;">Federal Democratic republic of ethiopia minister of education </td>
<td><img src="../image/fdrelogo1.jpg"  width="120" height="120"></td>	
</tr>	
</table>
<h1 style="font-family: times new roman">National Qualification Certificate</h1>
<h3  style="font-family: times new roman">Is awarded to</h3>
<h3 style="font-family: times new roman"><?php echo $fullname ?></h3>
<h3  style="font-family: times new roman"> Department Of <?php echo $dept ?></h3>

<?php





}
?>
</div>
</div>

  <br><br><br><br> 
    <br><br><br><br> 

   
  
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
 
    <div id="footer">
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
</div>
<br><br>
<?php
require("footer.php");
?>
</div>
</body>
</html>







