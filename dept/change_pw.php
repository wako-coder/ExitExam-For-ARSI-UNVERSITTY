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
require("deptmenu.php");			
?>
          </div>
                    </div>
                </div>

            </div>

    </div><!--close menubar-->	
  <div id="site_content"></div>  
	<div id="site_content">
<div class="sidebar_container">
</div>
	  
<div class="mt-4 container">

<fieldset class="fieldset"><legend>Change Password</legend>
<form name="myForm" method="post" action="">
<table>
<tr class="m-3 p-4">
<td >Old Password:</td><td><input type="password" name="opw"   required  placeholder="Enter Old Password"/></td><br>
</tr>
<tr class="m-3 p-4">
<td  >New Password</td><td ><input type="password" name="npw" placeholder="Enter New Password" required /></td>
</tr>
<tr>
<td >Confrim Password::</td><td><input type="password" name="cpw"  placeholder=" Confrim New Password" required/></td>
</tr>
<tr>
<td><input type="submit" class="btn btn-warning mt-3" name="changepw" value="Change Password" ></td>
<td><input type="reset"  class="btn btn-danger mt-3 ml-2" value="Cancel"></td>
</tr>
</table>
</form>  
<br><br>
<?php
if(isset($_POST["changepw"]))
{
$oldpw=$_POST["opw"];
$oldpw1=encryptpassword($oldpw);
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
$old=mysql_query("select*from  account where uid='$uid'");
while($row=mysql_fetch_array($old))
$oldpass=$row["password"];
if($oldpw1==$oldpass)
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
echo "Old Password Is Incorrect";
}
else
echo"New Password and Confrim Password is Not Match!!!";	
}
}
?>
<br>
</fieldset>
<br><br><br><br><br><br>
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
