<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>View department head</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <style type="text/css">

.style1 
{
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size: medium;
}
.fieldset
{
	width: 350px;
	text-align: left;
	margin-left: 250px;
	margin-top: 20px;
	height: auto;

	}

  </style>
  
</head>

<body>
 <div id="main">
  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
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
require("editormenu.php");	

		
?>

    </div><!--close menubar-->	
	<div id="site_content">

	  <div class="sidebar_container">
	  </div>
 <div id="content" style="margin-left:30px;margin-top: 20px;">

<?php

if($con)
 {
 $sql="select * from depthead";
$recordfound=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
	
	?>
<div style="height: auto;width: 955px;
border:solid 4px #dldbeg;
overflow-y:scroll;
overflow-x:scroll;">
	<?php
	
	
	echo "<table border='1'>";
	echo"<tr> <th>ID_Number</th><th>Frist Name</th><th>Father Name</th><th>Grandfather Name</th> <th>Sex </th>
	<th>Mobile</th><th>photo</th><th>Email</th><th>Department</th><th>university</th><th>Exam editor ID</th></tr>";
while($row=mysql_fetch_assoc($recordfound))
{
$did=$row["did"];
$sql=mysql_query("select*from user where uid='$did'");
$user=mysql_num_rows($sql);
if($user>0)
{
while($row1=mysql_fetch_assoc($sql))
echo "<tr> <td>". $row["did"]."</td><td>".$row1["ufname"]."</td> <td>".$row1["umname"]."</td> <td>".$row1["ulname"]."</td> <td>".$row1["sex"]."</td> <td>".$row1["mobile"]."</td> <td><img src=../".$row1["photo"]." width=20 height=30 alt='image'/></td> <td>".$row1["email"]."</td> <td>".$row["dept"]."</td> <td>".$row["unversity"]."</td>  <td>".$row["eid"]."</td></tr>";
}
else
echo"No Record Found";

}
echo "</table>";
	
}
     else
     echo "No records found!";
   }
   else
   echo"connection failed";
?>
</div>

 </div> 
 <br><br><br> <br><br><br><br><br><br><br><br><br><br><br><br> <br><br><br><br><br><br><br><br><br>       
  </div>
  <?php
}
else
{
header("location:../index.php");
}
?>
 
    <div id="footer">
<?php
require("../footer.php");
?>
   
</div>
<br><br>
</div>
</body>
</html>







