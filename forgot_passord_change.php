<?php
       ob_start();
	require("head.php");
	?>


<body >

    <div class="preloader"></div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">
        <?php
	require("testmenu.php");
	?>
			 
 <!-- Header Layout Content -->
 <div class="mdk-header-layout__content page">
            <div class="page__header  page__header-nav mb-0">
                <div class="container page__container">
                    <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0 d-none d-md-flex"
                        id="secondaryNavbar">
                        <?php 
	                    require("bar.php");
                        ?>
                    </div>
                </div>
            </div>


<?php
//password encryption
function encryptpassword($password ) 
{
$cryptKey='qJB0rGtIn5UB1xG03efyCp';
$passwordEncoded= base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $password, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
return( $passwordEncoded );
}

?>
<div class="content_item p-4" style="margin-top: 0px; margin-left:250px;width:700px;" >
<div id="style1">
 
 
 <fieldset class="fieldset"><legend>Change Password</legend>
<form name="myForm" method="post" action="">
<table>
<tr>
<td>New Password</td><td ><input type="password" name="npw" placeholder="Enter New Password" required /></td>
</tr>
<tr>
<td>Confrim Password::</td><td><input type="password" name="cpw"  placeholder=" Confrim New Password" required/></td>
</tr>
<tr>
<td><input type="submit" name="changepw" class="btn btn-success" value="Change Password" ></td>
<td><input type="reset"  value="Cancel"></td>
</tr>
</table>
</form>  
<br><br>
<?php
if(isset($_POST["changepw"]))
{
include("connection.php");
$userid=$_SESSION['userid'];
$newpw=$_POST["npw"];	
$confrimpw=$_POST["cpw"];	
if(strlen($newpw)<=5)
echo "Password Length Must BE Greater Than 5";
elseif(strlen($newpw)>=9)
echo "Password Length Must BE Less than Than 9";
else
{
if($newpw==$confrimpw)
{
$newpassword=encryptpassword($newpw);
$sql="update account set password='$newpassword',password_status='changed' where uid='$userid'";
$updatepassword=mysql_query($sql,$con);	
if($updatepassword)
{
$x='<script type="text/javascript">alert("Your Password Is Successfully Changed!!!! click Ok Login To The System");window.location=\'index.php\';</script>';
echo $x;
}
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
</div>
</div>


<div id="footer">
</div>
<br><br>
<br><br>

<!--close footer-->  
  </div>
<?php
require("footerout.php");
?>
</body>
</html>


