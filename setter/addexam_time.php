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
$uname=$_SESSION['sun'];
$fullname=$_SESSION['fullname'];
$photo=$_SESSION['sphoto'];
$role=$_SESSION['role'];;
$qtype=$_SESSION['questiontype'];
$sql="select * from Examsetter where sid='$uid'";
$record=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
	while($row=mysql_fetch_assoc($record))
	{
	 //$dept=$row["dept"];
   $year=$row["year"];
 $dept=$row["dname"];
//$unverid=$row["uid"];
	}

	}
	else
	echo "No records found!";
?>
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
	<div id="site_content">

	<div class="container p-3">
	<fieldset class="fieldset"><legend><b>Dr. Exam Setter Add Exam Time Only Once!!!</b></legend>
	<br>
	<table>
<form action="" method="post">
<tr>
<td>Year:</td><td><input type="text" name="year" readonly value="<?php echo $year;?>"></td>
</tr>
<tr>
<td>Question Type:</td><td><input type="text" name="qtype" readonly value="<?php echo $qtype;?>"></td>
</tr>
<tr>
<td>Department:</td><td><input type="text" name="dept" readonly  value="<?php echo($dept);?>"></td>
</tr>
<tr>
<td>Hour:</td><td><input type="number"  name="hr" min="0" placeholder="Enter Hour if hour<1 set 0"/></td>
</tr>
<tr>
<td>Minute:</td><td><input type="number" name="min" min="0" placeholder="Enter Minute" required/></td>
</tr>
<tr>
<td><input  type="submit" name="timer" value="set time"/></td>
<td><input type="reset" value="Cancel"/></td>
</tr>

</form>
</table>

<?php
if(isset($_POST['timer']))
{
$hr=$_POST["hr"];
$min=$_POST["min"];	
$dept=$_POST["dept"];
$year=$_POST["year"];
$qtype=$_POST["qtype"];
$_SESSION["qtype"]=$qtype;
$_SESSION["year"]=$year;
$sql2="select*from timer where dept='$dept' and  question_type='$qtype'";
$timeexist=mysql_query($sql2,$con);
if(mysql_num_rows($timeexist)>0)
echo"The Exam Time For  <b>$dept</b> Department  Is Already Exist";
else
{
if($con)
{
	$sql="insert into timer values(' ','$qtype','$dept','$hr','$min','$year')";
	$insert=mysql_query($sql,$con);
	if($insert)
	echo"Sucessfully set Exam time";
	else
	echo" NO Sucessfully set Exam time !!!".mysql_error($con);

}
else
echo"Connection Failed:".mysql_error($con);
}	
}
?>
<br><br>
<br>
</fieldset>

<br> <br> <br> 
<br> 
<br><br> <br> 

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
