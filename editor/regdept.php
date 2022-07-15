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
	$uni=$_SESSION['university'];
$sql=mysql_query("select*from university where uid='$uni' ");
while($r1=mysql_fetch_array($sql))
$uname=$r1["uname"];

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
								require("editormenu.php");	

										
								?>
                            </div>
                        </div>
                    </div>

                </div>

 <div class=" mt-4 container">
<fieldset id="fieldset" ><legend>Register Department which provide Exit Exam </legend>
<br><br>
<div style="margin-left: 20px;width: 500px;">
 <br><br>
<table>
<form action="" method="post" name="myForm"  onsubmit="return validateForm()">
<tr>
<td>Universty Name:</td><td><input type="text" name="uname" value="<?php echo $uname; ?>"  readonly required/></td>
</tr>
<tr>
<td>Department ID:</td><td><input type="text" name="did"  required/></td>
</tr>
<tr>
<td>Collegae Name:</td><td><input type="text" name="cname"  required onKeyPress="return ValidateAlpha(event)"/></td>
</tr>
<tr>
<td>Department Name:</td><td><input type="text" name="dname" onKeyPress="return ValidateAlpha(event)" required /></td>
</tr>
<tr>
<td><input type="submit" class="btn btn-info" name="regdept" value="Register"></td>
<td><input type="reset"  value="Cancel"></td>
</tr>
</form>
</table>
 <br><br>
<?php

//register university

if(isset($_POST['regdept']))
{
$unid=$_POST["uname"];
$did=$_POST["did"];
$dname=$_POST["dname"];
$cname=$_POST["cname"];
$registerexist="select*from department where dname='$dname'  and uid='$uni' ";
$record=mysql_query($registerexist,$con);
if(mysql_num_rows($record)>0)
echo $dname." Department is allready Exist,Not allowed to register one Department More than one times";
else
{
$sql="insert into department values('$did','$cname','$dname','$uni')";
$insert=mysql_query($sql,$con);
if($insert)
echo" Department Sucessfully Registered";
else
echo" NO Department Sucessfully Registered".mysql_error($con);
}
}
?>
</div>
<br><br>
</fieldset>
</div> 
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

