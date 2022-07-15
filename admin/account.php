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
$login_time=$_SESSION['login_time'];
$logout_time="empty";


//start log file record....
//log file find ip address
if(!empty($_SERVER["HTTP_CLIENT_IP"]))
$ipaddress=$http_client_ip;
elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
$ipaddress=$http_x_forwarded_for;	
else
$ipaddress=$_SERVER['REMOTE_ADDR'];
// variable declaration
$start_time = date("d M Y @ h:i:s");
$work_date=date('Y-m-d');
$activity_type="create account";
//log file

function encryptpassword($password ) 
{
$cryptKey='qJB0rGtIn5UB1xG03efyCp';
$passwordEncoded= base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $password, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
return( $passwordEncoded );
}
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
        <!--close header-->
        <div class="mdk-header-layout__content page">
            <div class="page__header  page__header-nav mb-0">
                <div class="container page__container">
                    <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0 d-none d-md-flex"
                        id="secondaryNavbar">
                        <?php 
	                   require("adminmenu.php");	
                        ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>
    </div>
    <br> <br>
    <!--close menubar-->
    <div class="container">

<body>
 

    </div><!--close menubar-->	 
<div id="site_content">
<div id="content">
<fieldset class="fieldset"><legend>Create User Account </legend>
<br/>
<div style="margin-left: 20px;width: 500px;">
<table>
<form action="" method="post" enctype="multipart/form-data">
<tr>
<td>
<select name="role" required  >
<option value="" >Choose</option>
<option value="Candidate" >Candidate</option>
<option value="Exam setter">Exam Setter</option>
<option value="Exam Editor">Exam Editor</option>
<option value="Registrar">Registrar</option>
<option value="Department Head">Department Head</option>
</select>
</td>
<td><input type="submit" name="auto" value="Create Automatically"  width="300px;"/></td>
</tr></form>
</table>
<br>
<?php
if(isset($_POST["auto"]))
{
$value=10;
$userrole=$_POST["role"];
$insert=0;
if($userrole=="Admin")
{
$accountcreatedexist=0;
$sql="select*from user where role='$role'";
$record=mysql_query($sql,$con);
$recordexist=mysql_num_rows($record);
if($recordexist>0)
{
while($r=mysql_fetch_assoc($record))
{
$id=$r["uid"];
$accountcreated="select*from account where uid='$id'";
$yesexist=mysql_query($accountcreated,$con);
$accountcreatedexist=mysql_num_rows($yesexist);
if($accountcreatedexist<=0)
{

$plaintext_password=$id."dmu";
$encryptedpassword=encryptpassword($plaintext_password);
$sq="insert into account values('$id','admin_$value','$encryptedpassword','active','unchanged')";
$insert=mysql_query($sq,$con);

$activity="created User account Information(userid=$id,username=cand_$value,password=$encryptedpassword,status=active)";
$logsql=mysql_query("insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");

$value++;
}
}
if($insert!=0)
echo" User account is successfully created";
else
echo" NO account is  created! ".mysql_error($con);		
}
echo"<br>No New Admin User IS Registered";	
}
else if($userrole=="Candidate")
{
$accountcreatedexist=0;
$sql="select*from user where role='$userrole'";
$record=mysql_query($sql,$con);
$recordexist=mysql_num_rows($record);
if($recordexist>0)
{
while($r=mysql_fetch_assoc($record))
{
$id=$r["uid"];
$accountcreated="select*from account where uid='$id'";
$yesexist=mysql_query($accountcreated,$con);
$accountcreatedexist=mysql_num_rows($yesexist);
if($accountcreatedexist==0)
{
$plaintext_password=$id."dmu";
$encryptedpassword=encryptpassword($plaintext_password);
$uname="cand_".$value."_$id";
$sq="insert into account values('$id','$uname','$encryptedpassword','active','unchanged')";
$insert=mysql_query($sq,$con);

$activity="created User account Information(userid=$id,username=cand_$value,password=$encryptedpassword,status=active)";
$logsql=mysql_query("insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");

$value++;
}
}
if($insert!=0)
echo" User account is successfully created";
else
echo" NO account is  created! ".mysql_error($con);	
}	
echo"<br>No New Candidate User IS Registered";	
}
else if($userrole=="Exam setter" )
{
//$accountcreatedexist=0;
$sql="select*from user where role='$role'";
$record=mysql_query($sql,$con);
$recordexist=mysql_num_rows($record);
if($recordexist>0)
{
while($r=mysql_fetch_assoc($record))
{
$id=$r["uid"];
$accountcreated="select*from account where uid='$id'";
$yesexist=mysql_query($accountcreated,$con);
$accountcreatedexist=mysql_num_rows($yesexist);
if($accountcreatedexist<=0)
{

$plaintext_password=$id."dmu";
$encryptedpassword=encryptpassword($plaintext_password);
$sq="insert into account values('$id','setter_$value','$encryptedpassword','active','unchanged')";
$insert=mysql_query($sq,$con);

$activity="created User account Information(userid=$id,username=cand_$value,password=$encryptedpassword,status=active)";
$logsql=mysql_query("insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");

$value++;
}
}
if($insert!=0)
echo" User account is successfully created";
else
echo" NO account is  created! ".mysql_error($con);	
}
echo"<br>No New Exam setter User IS Registered";			
}
else if($userrole=="Exam Editor")
{
	//$accountcreatedexist=0;
$sql="select*from user where role='$role'";
$record=mysql_query($sql,$con);
$recordexist=mysql_num_rows($record);
if($recordexist>0)
{
while($r=mysql_fetch_assoc($record))
{
$id=$r["uid"];
$accountcreated="select*from account where uid='$id'";
$yesexist=mysql_query($accountcreated,$con);
$accountcreatedexist=mysql_num_rows($yesexist);
if($accountcreatedexist<=0)
{

$plaintext_password=$id."dmu";
$encryptedpassword=encryptpassword($plaintext_password);
$sq="insert into account values('$id','editor_$value','$encryptedpassword','active','unchanged')";
$insert=mysql_query($sq,$con);

$activity="created User account Information(userid=$id,username=cand_$value,password=$encryptedpassword,status=active)";
$logsql=mysql_query("insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");

$value++;
}
}
if($insert!=0)
echo" User account is successfully created";
else
echo" NO account is  created! ".mysql_error($con);	
}
echo"<br>No New Exam Editor User IS Registered";			
}
else if($userrole=="Registrar" )
{
	//$accountcreatedexist=0;
$sql="select*from user where role='$role'";
$record=mysql_query($sql,$con);
$recordexist=mysql_num_rows($record);
if($recordexist>0)
{
while($r=mysql_fetch_assoc($record))
{
$id=$r["uid"];
$accountcreated="select*from account where uid='$id'";
$yesexist=mysql_query($accountcreated,$con);
$accountcreatedexist=mysql_num_rows($yesexist);
if($accountcreatedexist<=0)
{

$plaintext_password=$id."dmu";
$encryptedpassword=encryptpassword($plaintext_password);
$sq="insert into account values('$id','reg_$value','$encryptedpassword','active','unchanged')";
$insert=mysql_query($sq,$con);

$activity="created User account Information(userid=$id,username=cand_$value,password=$encryptedpassword,status=active)";
$logsql=mysql_query("insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");

$value++;
}
}
if($insert!=0)
echo" User account is successfully created";
else
echo" NO account is  created! ".mysql_error($con);	
}
echo"<br>No New Registrar  User IS Registered";			
}
else if($userrole=="Department Head")
{
	//$accountcreatedexist=0;
$sql="select*from user where role='$role'";
$record=mysql_query($sql,$con);
$recordexist=mysql_num_rows($record);
if($recordexist>0)
{
while($r=mysql_fetch_assoc($record))
{
$id=$r["uid"];
$accountcreated="select*from account where uid='$id'";
$yesexist=mysql_query($accountcreated,$con);
$accountcreatedexist=mysql_num_rows($yesexist);
if($accountcreatedexist<=0)
{

$plaintext_password=$id."dmu";
$encryptedpassword=encryptpassword($plaintext_password);
$sq="insert into account values('$id','dept_$value','$encryptedpassword','active','unchanged')";
$insert=mysql_query($sq,$con);

$activity="created User account Information(userid=$id,username=cand_$value,password=$encryptedpassword,status=active)";
$logsql=mysql_query("insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");

$value++;
}
}
if($insert!=0)

echo" User account is successfully created";
else
echo" NO account is  created! ".mysql_error($con);	
}
echo"<br>No New Department Head User IS Registered";			
}
else
echo"unable to create user account";
}
?>
<br><br>
<hr>
<br><br>
<table>
<form action="" method="post" enctype="multipart/form-data">
<tr>
<td>User_ID:</td><td><input type="text" name="uid"  pattern="[a-zA-Z0-9/ _.\-+]+" required/></td>
</tr>

<tr>
<td>User Name:</td><td><input type="text" name="un"  pattern="[a-zA-Z0-9/ _.\-+]+" required/></td>
</tr>
<tr>
<td>Password:</td><td><input type="password" name="pw"  pattern="[a-zA-Z0-9/ _.\-+]+" required/></td>
</tr>
<tr>
<td>Status:</td>
<td>
<select name="status" required >
<option value="">choose option</option>
<option value="active">active</option>
<option value="inactive">inactive</option>
</select>
</td>
</tr>
<tr>
<td><input type="submit" name="useracc" value="Create account"></td>
<td><input type="reset"  value="Cancel"></td>
</tr>

</form>
</table>
<br>
<?php
if(isset($_POST["useracc"]))
{
$id=$_POST["uid"];	
$un=$_POST["un"];	
$pw=$_POST["pw"];
if(strlen($pw)<=5)
echo "Password Length IS Must Be Between 6 and 8 Character";
elseif(strlen($pw)>=9)
echo "Password Length IS Must Be Between 6 and 8 Character";
else
{
$encryptedpassword=encryptpassword($pw);
$status=$_POST["status"];
$pwstatus="unchanged";		
	
$sql="insert into account values('$id','$un','$encryptedpassword','$status','$pwstatus')";
$insert=mysql_query($sql,$con);
if($insert)
{
$activity="created User account Information(userid=$id,username=$un,password=$encryptedpassword,status=active)";
$logsql=mysql_query("insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");
echo" User account is successfully created";	
}
else
echo" NO account is  created! ".mysql_error($con);	
}
}

?>
</div>
<br><br/>
</fieldset>
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
 
  <br><br>  
  </div>
<?php
require("footer.php");
?>
</body>
</html>
