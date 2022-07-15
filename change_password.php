<?php
	 if (!isset($_SESSION)) {
	session_start();		
	}
	require("head.php");
	?>
<body>
<body>
    <div id="main">
        <?php
	require("testmenu.php");
	?>
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
        </div>	 
	

   <!-- Header Layout Content -->
   <div class="mdk-header-layout__content">

<div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
	<div class="mdk-drawer-layout__content page">
		<div class="container page__container">



			 
<div class="container mt-5 pt-6">

<?php
//password encryption
function encryptpassword($password ) 
{
$cryptKey='qJB0rGtIn5UB1xG03efyCp';
$passwordEncoded= base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $password, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
return( $passwordEncoded );
}

?>
<div class="content_item" style="margin-top: 0px; margin-left:250px;width:700px; >
<div id="style1">
 <div id="forgot">
 
 <fieldset class="fieldset"><legend>Change Password</legend>
<form name="myForm" method="post" action="">
<table>
<tr>
<td>Old Password:</td><td><input type="password" name="opw"  required   placeholder="Enter Old Password"/></td>
</tr>
<tr>
<td>New Password</td><td ><input type="password" name="npw" placeholder="Enter New Password" required /></td>
</tr>
<tr>
<td>Confrim Password::</td><td><input type="password" name="cpw"  placeholder=" Confrim New Password" required/></td>
</tr>
<tr>
<td><input type="submit" name="changepw" class="btn btn-info mt-3" value="Change Password" ></td>
<td><input type="reset" value="Cancel" class="btn btn-danger mt-3 " style=" height: 25px;
  width: 150px;;
  background:white;
  color: #150000;
  font-size: 15px;
  border-color: #a20000;"/></td>
</tr>
</table>
</form>  
<br><br>
<?php
if(isset($_POST["changepw"]))
{
	include("connection.php");
$userid=$_SESSION['userid'];
$oldpw=$_POST["opw"];
$oldencript=encryptpassword($oldpw);
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
$old=mysql_query("select*from  account where uid='$userid'");
while($row=mysql_fetch_array($old))
$oldpass=$row["password"];
if($oldencript==$oldpass)
{
$newpassword=encryptpassword($newpw);
$sql="update account set password='$newpassword',password_status='changed' where uid='$userid' and password='$oldencript'";
$updatepassword=mysql_query($sql,$con);	
if($updatepassword)
{
$x='<script type="text/javascript">alert("Your Password Is Successfully Changed!!!!");window.location=\'index.php\';</script>';
echo $x;
}
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
</div>
 
 
</div> 
</div>
</div>
</div> 
</div>



<div id="footer">
</div>
<br><br><br><br><br><br>
<br><br><br><br><br><br>
<!--close footer-->  
  </div>
<?php
require("footerout.php");
?>
</body>
</html>


