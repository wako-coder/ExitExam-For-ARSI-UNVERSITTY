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

    </div><!--close menubar-->	
<div id="site_content">
<div id="content">
 <br>
<fieldset id="fieldset">

 <br>
 <center>
<table>

<form action="" method="post">
<tr>
<td>Choose University:</td>
<td>
<select name="university" required >
<option value=""> choose option</option>
<?php
	if($con)
	{
	$sql="select * from university";
	$recordfound=mysql_query($sql,$con);
	if(mysql_affected_rows($con))
	{
	while($row=mysql_fetch_assoc($recordfound))
	{
	?>
<option value="<?php echo $row["uid"];?>"><?php echo $row["uname"];?></option>
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
<td><input type="submit" class="btn btn-info" name="next" value="Next"/></td>
<td><input type="reset"  name="" value="Cancel" class="btn btn-warning" /></td>
</tr>

</form>
</table>
</center>
 <br> <br>
</fieldset>
<?php
if(isset($_POST["next"]))
{
$_SESSION['university']=$_POST["university"];
header("location:regdept.php");	
}
?>
 <br><br>  <br><br>  <br><br> 
  <br><br>  <br><br>  <br><br> 
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
</div
 <br><br><br>  
</div>
<?php
require("footer.php");
?>
</body>
</html>
