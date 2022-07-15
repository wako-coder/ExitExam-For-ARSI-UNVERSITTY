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

$sql=mysql_query("select*from depthead WHERE did='$uid'");
while($rr=mysql_fetch_array($sql))
{
$dept=$rr["dname"];
$unverid=$rr["uid"];
$ss=mysql_query("select*from university WHERE uid='$unverid'");
while($r=mysql_fetch_array($ss))
{
$unver=$r["uname"];	
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
<div id="site_content">
<div class="sidebar_container">
</div>
	  
<div id="content" style="margin-left:30px;margin-top: 20px;">
<br>
<fieldset class="fieldset" >
<br>
<div class="style1">
<?php

$sql="select * from candidate WHERE year='$year' and dept='$dept' and unversity='$unver'";
$recordfound=mysql_query($sql,$con);
if(mysql_num_rows($recordfound)>0)
{

?>
<div style="height: 550px;width:800px;
border:solid 4px #dldbeg;
overflow-y:scroll;
overflow-x:scroll;">

<?php
echo "<table border='1'>";
echo"<tr><td colspan=12 align='center'>All Graduate Student List Who Are Take Exit Exam In  $year</td></tr>";
echo"<tr> <th>Candidate_ID</th><th>Frist Name</th><th>Father Name</th><th>Grandfather Name</th> <th>Sex </th>
<th>Mobile</th><th>Email</th><th>Photo</th><th>Department</th><th>College</th><th>University</th><th>Year</th>
</tr>";
while($row=mysql_fetch_assoc($recordfound))
{
	
	
$cid=$row["cid"];
$sql=mysql_query("select*from user where uid='$cid'");
$user=mysql_num_rows($sql);
if($user>0)
{
while($row1=mysql_fetch_assoc($sql))
{
$photo=$row1["photo"];

echo "<tr> <td>". $row["cid"]."</td><td>".$row1["ufname"]."</td> <td>".$row1["umname"]."</td> <td>".$row1["ulname"]."</td> <td>".$row1["sex"]."</td> <td>".$row1["mobile"]."</td> <td>".$row1["email"]."</td> <td><img src='../Registrar/$photo'width=20 height=20></td> <td>".$row["dept"]."</td>  <td>".$row["colleage"]."</td>  <td>".$row["unversity"]."</td><td>".$row["year"]."</td></tr>";
}
}else
echo "No Record Found";

}

echo "</table>";
}
else
echo "No records found!";
?>

<br>
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
<br><br><br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
</div>
<?php
require("footer.php");
?>
</body>
</html>
