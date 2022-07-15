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
<div class="content_item" style="margin-top: 50px;">
<div class="style1" id=textinput>
<fieldset class="fieldset"><legend>We can update Each Department information Except id</legend>
<br>	  
<div style="margin-left: 20px; background-color:#bccdf1;width: 500px;">
<br>
<table>
<form action="" method="post">
	<tr>
	<td><input type="text" name="key" placeholder="Enter  ID number"/></td>
	<td><input type="submit" name="serarch" value="search"/></td>
	
	</tr>
	
<tr><td colspan="2" width="535px"><hr style="border-color: #801137;"></td></tr>
<?php
 if(isset($_POST["serarch"]))
{
	$key=$_POST["key"];
	$sql="select*from set_score where score_id='$key'";
	$recordfound=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
while($row=mysql_fetch_assoc($recordfound))
{	
$dept=$row["dept"];
echo"<tr><td>SCORE_ID:</td><td><input type=text name='sid' value='".$row["score_id"]."'readonly></td></tr>";
echo "<tr><td>Department:</td>";
 $sql1="select dname from department";
$recordfound1=mysql_query($sql1,$con);
if(mysql_affected_rows($con))
{
    echo"<td><select name='dname'>";
	while($row1=mysql_fetch_assoc($recordfound1))
	{
	$dept1=$row1["dname"];
	if($dept1==$dept)
	{
	?>
	<option value="<?php echo $dept1;?>" selected ><?php echo $dept1;?></option>
	<?php	
	}	
	else
	{
	?>
  <option value="<?php echo $dept1;?>" ><?php echo $dept1;?></option>
	<?php	
	}
    }
echo"</td></tr></select";
}

echo "<tr><td>Score:</td><td><input type=number name='score' min='1' max='100' value='".$row["score"]."'</td></tr>";
echo "<tr><td>Year :</td><td><input type=text name='year' value='".$row["year"]."' ></td></tr>";
echo "<tr><td><input type=submit name='update' value='update'></td> ";
echo "<td><input type=reset value=Cancel></td></tr>";
}}
	else
	echo "No result found!!!";		
}
else
{
	if(isset($_POST["update"]))
	{
$id=$_POST["sid"];
$dept=$_POST["dname"];
$score=$_POST["score"];
$year=$_POST["year"];
if($con)
{	
$sql="update set_score  set dept='$dept',score='$score',year='$year' where score_id='$id'";
$updated=mysql_query($sql,$con);
if(mysql_affected_rows($con))
echo mysql_affected_rows($con)."  a record/s update successfully!";
else
echo "Unable to update!".mysql_error($con);
}

else
die("Connection Failed:".mysql($con));	
	}
}

?>
</form>
</table>
</div>
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


