<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>View Registrar</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/image_slide.js"></script>
 <script type="text/javascript" src="../css/javascriptdate.js"></script>
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
 $sql="select * from registrar";
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
	<th>Mobile</th><th>Email</th><th>Photo</th><th>Department</th><th>university</th><th>Exam editor ID</th></tr>";
	while($row=mysql_fetch_assoc($recordfound))
echo "<tr> <td>". $row["rid"]."</td><td>".$row["rfname"]."</td> <td>".$row["rmname"]."</td> <td>".$row["rlname"]."</td> <td>".$row["sex"]."</td> <td>".$row["mobile"]."</td> <td>".$row["Email"]."</td> <td>".$row["photo"]."</td> <td>".$row["dept"]."</td> <td>".$row["unversity"]."</td>  <td>".$row["eid"]."</td></tr>";
	echo "</table>";
	
}
     else
     echo "No records found!";
   }
   else
   echo"connection failed";
?>


</div>
<br><br><br> <br><br><br><br><br><br><br><br><br><br><br><br> <br><br><br><br><br><br><br><br><br>  
 </div> 
      
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







