<?php
session_start();
include("../connection.php");
require("head.php");

	?>
 <div id="main">
 	  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
$uid=$_SESSION['$uid'];
$username=$_SESSION['sun'];
$role=$_SESSION['role'];

function decryptpassword( $encryptedpassword)
{
$cryptKey= 'qJB0rGtIn5UB1xG03efyCp';
$decryptpassword= rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $encryptedpassword ),
           MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
return($decryptpassword );
}
function encryptpassword($password ) 
{
$cryptKey='qJB0rGtIn5UB1xG03efyCp';
$passwordEncoded= base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $password, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
return( $passwordEncoded );
}
$oldp=$_SESSION['spw'];
$oldp=decryptpassword($oldp);

?>
  <div id="header">
	   <div id="banner">
	    
	    <!--<div id="welcome_slogan"> -->
		 
	   <?php
require("dmu.php");	   
?>
	   
	  </div>
   </div>
	<div id="navigation">
	<?php
require("candmenu.php");			
?>
<div class="container">
  <div id="site_content"></div>  
	<div id="site_content">
<div class="sidebar_container">
</div>
	  
<div class="mt-4 container">

<fieldset class="fieldset"><legend>Change Password</legend>
<form name="myForm" method="post" action="">
<table>
<tr>
<td>Old Password:</td><td><input type="text" name="opw"  required value="<?php echo $oldp;?>" readonly/></td>
</tr>
<tr>
<td>New Password</td><td ><input type="password" name="npw" placeholder="Enter New Password" required /></td>
</tr>
<tr>
<td>Confrim Password::</td><td><input type="password" name="cpw"  placeholder=" Confrim New Password" required/></td>
</tr>
<tr>
<td><input type="submit" name="changepw" class="btn btn-info     " value="Change Password" ></td>
<td><input type="reset"  value="Cancel"></td>
</tr>
</table>
</form>  
<br><br>
<?php
if(isset($_POST["changepw"]))
{
$oldpw=$_POST["opw"];
$newpw=$_POST["npw"];	
$confrimpw=$_POST["cpw"];	
if(strlen($newpw)<=5)
echo "Password Length IS Must Be Between 6 and 8 Character";
elseif(strlen($newpw)>=9)
echo "Password Length IS Must Be Between 6 and 8 Character";
else
{
if($newpw==$confrimpw)
{
$newpassword=encryptpassword($newpw);
$sql="update account set password='$newpassword' where uid='$uid'";
$updatepassword=mysql_query($sql,$con);	
if($updatepassword)
echo"Your Password Is Successfully Changed!!!!";
else
echo"No Password Successfully Changed".mysql_error($con);
}
else
echo"New Password and Confrim Password is Not Match!!!";	
}
}
?>
<br>
</fieldset>
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
