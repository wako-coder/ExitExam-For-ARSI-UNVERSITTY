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


				<div class="conatiner">
			<div class="row">
				<div class="col-2">
				
				<?php
								 require("editorsidelink.php");
								 ?>
				</div>
				<div class="col-7">	
	 
<div id="content">
<div class="content_item" style="margin-top: 20px;">
<div class="style1" id=textinput>
<br>
<fieldset class="fieldset"><legend>Fill All form Correctly </legend>
<br><br>
<div style="margin-left: 20px; background-color:#bccdf1;width: 500px;">
 <table width="70">
<form action="" method="post">
<tr>
<td>Department:</td>
<td>
<select name="dept" required >

<option value="">Select Your Option</option>
	<?php
	if($con)
	{
	$sql="select DISTINCT dname from department";
	$recordfound=mysql_query($sql,$con);
	if(mysql_affected_rows($con))
	{
	while($row=mysql_fetch_assoc($recordfound))
	{
	?>
<option value="<?php echo $row["dname"];?>"><?php echo $row["dname"];?></option>
	<?php
	}
	}
	else
	echo "No records found!";
	}
	else
	echo"connection failed";
	?> 
</select>
</td>
</tr>
<tr>
<td>Set Score:</td><td><input type="number" name="score" min="0" max="100" required placeholder="Enter Score up to 100%"/></td>
</tr>
<tr>
<td>Year:</td><td><input type="text" name="year"  pattern="[0-9]+" placeholder="Enter Year like 2022 " required/></td>
</tr>
<tr>
<td><input type="submit" name="set" value="set score"></td>
<td><input type="reset"  value="Cancel"></td>
</tr>

</form>
</table>
</div>
<?php
if(isset($_POST['set']))
{
$year=$_POST["year"];
$score=$_POST["score"];
$dept=$_POST["dept"];
$sq="select*from set_score WHERE dept='$dept' and year='$year'";
$recordexist=mysql_query($sq,$con);
if(mysql_num_rows($recordexist)>0)
echo"The Score Is Already Exist";
else
{
if($con)
{
  $sql="insert into set_score values(' ','$dept','$score','$year')";
   $insert=mysql_query($sql,$con);
   if($insert)
    echo"The score is set  sucessfully";
	else
	echo" NO score is  setted".mysql_error($con);
	
}
else
echo"Connection Failed:".mysql_error($con);
}}
?>
<br><br>
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


