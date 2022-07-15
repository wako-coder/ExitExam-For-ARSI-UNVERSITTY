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
?>
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
								require("editormenu.php");	

										
								?>
                            </div>
                        </div>
                    </div>

                </div>



	<div id="site_content">	

	 
	<div class="sidebar_container">
	<div class="sidebar">
	<div class="sidebar_item" style="height: 500px;">

	<h2>Additional Link</h2>

   <?php
	require("editorsidelink.php");
	?>

	</div>
	<br><br><br><br><br><br>   
	  
	</div>
	</div>		 
<div id="content">
<div class="content_item" style="margin-top: 0px;">
<div class="style1" id=textinput>
<fieldset class="fieldset"><legend>Fill All form Correctly </legend>
<br>	  
<div style="margin-left: 20px; background-color:#bccdf1; width:500px;">
 <table width="70">
<form action="" method="post">
<tr>
<td>Question Type:</td>
<td>
<select name="qtype" required>
<option value="">select type</option>
<option value="Regular">Regular</option>
<option value="Re_Exam">Re_Exam</option>
<option value="Payment">Payment</option>
</select>	
</td>
</tr>
<tr>
<td>Start Date:</td><td><input type="date" name="sdate"  required/></td>
</tr>
<tr>
<td>End Date:</td><td><input type="date" name="edate" required/></td>
</tr>
<tr>
<tr>
<td>Start Time:</td><td><input type="time" name="stime"  required pattern="[0-9:]+"/></td>
</tr>
<tr>
<td>End Time:</td><td><input type="time" name="etime"  pattern="[0-9:]+" required/></td>
</tr>
<tr>
<td>Year:</td><td><input type="number" name="year"  min="1" required/></td>
</tr>
<tr>
<td><input type="submit" name="adddate" value="Add"></td>
<td><input type="reset"  value="Cancel"></td>
</tr>

</form>
</table>
</div>
<?php
if(isset($_POST['adddate']))
{
$qtype=$_POST["qtype"];
$sdate=$_POST["sdate"];
$edate=$_POST["edate"];
$stime=$_POST["stime"];
$etime=$_POST["etime"];
$year=$_POST["year"];
if($sdate>$edate || $stime>=$etime)
{
echo"Unable to add ,check start date or time must be less than end date or time !!! ";	
}
else
{
if($con)
{
	$sq="select*from examdate WHERE year='$year' and question_type='$qtype'";
	$recordexist=mysql_query($sq,$con);
	if(mysql_affected_rows($con))
	echo"The Exam Date Schedule For $year Is  Already Exist !!!";
	else
	{
$sql="insert into examdate values(' ','$qtype','$sdate','$edate','$stime','$etime','$year')";
$insert=mysql_query($sql,$con);
if($insert)
echo"The Exam Date Is Add  Sucessfully";
else
echo" NOExam Date Is Add  ".mysql_error($con);
	}
}
else
echo"Connection Failed:".mysql_error($con);
}}
?>
<br>
 </fieldset>

</div>

</div>

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
</div>

<!--close footer-->  
  <br> <br>  
</div> 
<?php
require("footer.php");
?>
</body>
</html>


