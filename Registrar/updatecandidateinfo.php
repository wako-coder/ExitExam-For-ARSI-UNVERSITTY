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
		//$year=$_SESSION['year'];
		$uid=$_SESSION['$uid'];
if($con)
 {
$sql="select * from registrar where rid='$uid'";
$recordfound=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
while($row=mysql_fetch_assoc($recordfound))
{
$unverid=$row["uid"];
$sql2=mysql_query("select*from university where uid='$unverid'");
while($unrow=mysql_fetch_array($sql2))
$university=$unrow["uname"];
}

}
else
echo "No records found!";
}
else
echo"connection failed";
?>
  <div id="header">
	   <div id="banner">
	    
	    <!--<div id="welcome_slogan"> -->
      <?php
require("dmu.php");	   
?>
                <!--</div> <!--close welcome_slogan-->
            </div>
            <!--close banner-->
        </div>
        <div class="mdk-header-layout__content page">
            <div class="page__header  page__header-nav mb-0">
                <div class="container page__container">
                    <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0 d-none d-md-flex"
                        id="secondaryNavbar">
                        <?php
require("registrar_menu.php");		

		
?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div><!--close menubar-->	
  <div id="site_content"></div>  
	<div id="site_content">

	  <div class="sidebar_container">
	  </div>
 <div id="content" style="margin-left:30px;margin-top: 20px;">
 <fieldset class="fieldset">
 <br> <br>
 <fieldset style="border-radius: 0px;width: 500px; margin-top: 5px;margin-left: 250px;"><legend>Enter Candidate ID  to edit</legend>
 <br> 
 <center>
 <table  width="80%">
<form action="" method="post">
<tr>
<td><input type="text" name="key" placeholder="Enter Id " required/></td>
<td><input type="submit" name="serarch" class="btn btn-info" value="search"/></td>
</tr>
</form>
</table>
</center>
<br> 
<br> 	
 </fieldset>
 <br> <br>


<br>
<?php
if(isset($_POST["serarch"]))
{
$cid=$_POST["key"];	
$sql="select*from candidate WHERE cid='$cid'";
$cand=mysql_query($sql);
if(mysql_num_rows($cand)>0)
{
	echo"<center><table width='60%'>";
while($row=mysql_fetch_array($cand))
{

$sq=mysql_query("select*from user WHERE uid='$cid'");
while($row1=mysql_fetch_array($sq))	
{?>
<form action="" method="post">
	
<tr>
<td>
candidate id<input  type="text" value="<?php echo $row["cid"]; ?>" readonly  name="cid"/></td>
<td>Fname<input  type="text" value="<?php echo $row1["ufname"]; ?>"  name="fname" />	</td>	
</tr>	

<tr>
<td>
mname<input  type="text" value="<?php echo $row1["umname"]; ?>" readonly  name="umname"/></td>
<td>lname<input  type="text" value="<?php echo $row1["ulname"]; ?>"  name="lname" />	</td>	
</tr>	
<tr>
<td>Email<input  type="email" value="<?php echo $row1["email"]; ?>"   name="email"/></td>
<td>phone<input  type="text" value="<?php echo $row1["mobile"]; ?>"  name="mb" /></td>	
</tr>
<tr>
<td colspan="2">Sex<br>
<select name="sex">
<option value=""> choose</option>
<option value="m">Male</option>
<option value="f">Female</option>
	
</select>
</td>	
</tr>

<tr>
<td><input  type="submit" value="Update"  name="update" /></td>	
<td><input  type="reset" value="Cancel"  /></td>	
</tr>
</form>


<?php
echo"</center></table>"	;
}
}}
else
echo"No Result Found";
}
?>
<?php
if(isset($_POST["update"]))
{	
$id=$_POST["cid"];	
$fname=$_POST["fname"];	
$mname=$_POST["umname"];	
$lname=$_POST["lname"];	
$sex=$_POST["sex"];	
$email=$_POST["email"];	
$phone=$_POST["mb"];

$update="update user set ufname='$fname',ulname='$mname',umname='$lname',mobile='$phone',email='$email',sex='$sex' where uid='$id'";
$udted=mysql_query($update);
if($udted)
echo"update successfully";
else
echo"UNABLE TO UPDATE".mysql_error($con);

}

?>

<br/><br/><br/> <br/><br/><br/> 
 </fieldset>  
 </div> 
 
 <br/><br/><br/><br/><br/><br/><br/><br/>
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
