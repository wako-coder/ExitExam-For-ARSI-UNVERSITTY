<?php
 ob_start();
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
    <div class="conatiner">
			<div class="row">
				<div class="col-2">
				
				<?php
								 require("editorsidelink.php");
								 ?>
				</div>
				<div class="col-7">
 <table>
<form action="" method="post"  name="myForm" onsubmit="return validateForm()">
<tr>
<td>Enter year to see Report:</td>
<td><input type="number" name="year" required  onKeyPress="return isNumberKey(event)"/></td>
</tr>

<tr>
<td>Choose University:</td>
<td><select name="university" required >
<option value=""> choose option</option>
<?php
$sql="select uname from university";
$record=mysql_query($sql,$con);
if(mysql_num_rows($record)>0)
{
while($row=mysql_fetch_array($record))
{
	?>
<option value="<?php echo $row["uname"];?>"><?php echo $row["uname"];?></option>
	<?php	
}	
}
else
{
$uname=NULL;
echo"<option value='$uname'>$uname</option>";	
}

?>

</select>
</td>
</tr>

<tr>
<td><input type="submit" name="next" value="Next"/></td>
<td><input type="reset"  name="" value="Cancel" /></td>
</tr>

</form>
</table>
</fieldset>
<?php
if(isset($_POST["next"]))
{
$_SESSION['year']=$_POST["year"];
$_SESSION['university']=$_POST["university"];
header("location:viewreport.php");	
}
?>

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


