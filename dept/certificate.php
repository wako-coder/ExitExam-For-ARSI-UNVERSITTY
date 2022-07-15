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
$uid=$_SESSION['$uid'];
$year=$_SESSION['year'];
$sql="select*from depthead where did='$uid'";
$record=mysql_query($sql,$con);
if(mysql_num_rows($record)>0)
{
while($row=mysql_fetch_array($record))
{
$dept=$row["dname"];
$unid=$row["uid"];

$sql=mysql_query("select*from university where uid='$unid'");
while($r=mysql_fetch_array($sql))
 $univer=$r["uname"];		
}	
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

            </div>
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
$rolenumber=0;
$sql="select * from candidate  where dept='$dept' and year ='$year' and unversity='$univer'";
$recordexist=mysql_query($sql,$con);
if(mysql_num_rows($recordexist)>0)
{
	
 ?>
   <br><br>
<table border="1"  style="margin-left: 15px;">
<tr><td colspan="12" style="text-align: center;font-weight: bold;font-size: 18px;">Graduate Student List Who Are Take Exit Exam and Computent Exit Exam  in <?php echo $univer;?> University For Department Of <?php echo $dept; ?> In <?php echo $year; ?> E.C </td></tr>	
<tr>
<th>Role Number</th>
<th>Frist Name</th>	
<th>Middle Name</th>	
<th>Last Name</th>	
<th>Sex</th>	
<th>Dept</th>	
<th>Colleage </th>	
<th >University</th>	
<th>Year</th>
<th>Certificate</th>		
</tr>
<?php
while($row=mysql_fetch_array($recordexist))
{

$id=$row["cid"];
$query="select*from result where uid='$id'";
$resultexist=mysql_query($query,$con);
while($row2=mysql_fetch_array($resultexist))
{
$cid=$row2["uid"];
$status=$row2["status"];
$score=$row2["total"];	
if($status=='Competent')
{
$rolenumber++;
$sql=mysql_query("select*from user where uid='$id'");
while($row1=mysql_fetch_assoc($sql))

echo "<tr> 
	<td>".$rolenumber."</td>
	<td>".$row1["ufname"]."</td> 
	<td>".$row1["umname"]."</td> 
	<td>".$row1["ulname"]."</td> 
	<td>".$row1["sex"]."</td> 
	<td>".$row["dept"]."</td> 
	<td>".$row["colleage"]."</td> 
	<td>".$row["unversity"]."</td>
	<td>".$row["year"]."</td>";
	?>
	<td>
	<?php echo "<a  href='certificatepage.php?id=$cid'>Click Here</a>";?></td>
	<?php
	echo"</tr>";	
}
}

}
}
else
echo"No Result Found";

?>
</table>

 </div>
 <br><br> 
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







