<?php
session_start();
include("../connection.php");
require("head.php");
?>


<body>

     <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
	$uid=$_SESSION['$uid'];
	//$qtype=$_SESSION["qtype"];
	//dept
	$sql="select * from Examsetter where sid='$uid'";
	$record=mysql_query($sql,$con);
	if(mysql_affected_rows($con))
	{
	while($row=mysql_fetch_assoc($record))
	{
//$unverid=$row["uid"];
$dept=$row["dname"];		
	}
	}
	else
	echo "No Result found!";
	
	
	//year
	$uid=$_SESSION['$uid'];
	//dept and year
	$sql="select * from timer where dept='$dept'";
	$record=mysql_query($sql,$con);
	if(mysql_affected_rows($con))
	{
	while($row=mysql_fetch_assoc($record))
	{
		$qtype=$row["question_type"];
	
	}

	}
	else
	echo "No Result found!";
?>
    <div id="main">
	<div id="header">
	   <div id="banner">
	    
	    <!--<div id="welcome_slogan"> -->
		 
	   <?php
require("dmu.php");	   
?>
	   <!--</div> <!--close welcome_slogan-->
	   <div class="mdk-header-layout__content page">
                <div class="page__header  page__header-nav mb-0">
                    <div class="container page__container">
                        <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0 d-none d-md-flex"
                            id="secondaryNavbar">
							<?php
require("settermenu.php");	

		
?>
                        </div>
                    </div>
                </div>	
				</div><!--</div> <!--close welcome_slogan-->
	  </div><!--close banner-->
   </div>



	  <div class="sidebar_container">
	    <!--close sidebar-->
      </div><!--close sidebar_container-->
<div id="content">
	<br></br>
 <fieldset class="fieldset"><legend>Well Come TO ExitExam  Display Exam Time</legend>
<br>
<div class="style1">
<?php

if($con)
{	
$year=$_SESSION["year"];
$sql="select * from timer where dept='$dept'  and year='$year' ";
$recordfound=mysql_query($sql,$con);
$number=mysql_num_rows($recordfound);
if(mysql_affected_rows($con))
{
echo "<table border='1'>";
echo"<tr> <th>Timer_ID</th><th>year</th><th>Question type</th><th>Department</th><th>Hour</th><th>Minute</th></tr>";
while($row=mysql_fetch_assoc($recordfound))
echo "<tr> <td>". $row["tid"]."</td><td>".$row["year"]."</td> <td>".$row["question_type"]."</td><td>".$row["dept"]."</td> <td>".$row["hour"]."</td><td>".$row["min"]."</td></tr>";
echo "</table>";
}
     else
     echo "No records found!";
  }
  else
  echo"Connection Failed!!!".mysql_error($con);
?>
<br><br><br> 
</div>
</fieldset>

</div>
<br><br><br> 
<br><br><br> 
<br><br><br>
<br><br><br> 
<br><br><br> 

</div>

 <?php
}
else
{
header("location:../index.php");
}
?>



  <div id="footer">
</div>
<br><br>
</div>
  <?php
require("footer.php");
?>
</body>
</html>
