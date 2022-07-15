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
// some variable declaration
$start_time = date("d M Y @ h:i:s");
$work_date=date('Y-m-d');
$activity_type="Update user account ";
//log file
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


</div><!--close menubar-->	

<div id="site_content">
<div class="sidebar_container">
</div>
<div id="content">
<br><br><br>
<div class="style1" id=textinput>
<fieldset class="fieldset"><legend>We can block or update  user status by searching id number</legend>
<br><br>
<div style="margin-left: 20px;">
<table>
<form action="" method="post">
<tr>
<td><input type="text" name="key" placeholder="Enter User ID number" required/></td>
<td><input type="submit" name="serarch" value="search"/></td>
</tr>
<tr><td colspan="2" width="535px"><hr style="border-color: #801137;"></td></tr>
</form>
<form action="" method="post">
<?php
if(isset($_POST["serarch"]))
{
$key=$_POST["key"];
$sql="select*from account where uid='$key'";
$recordfound=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
while($row=mysql_fetch_assoc($recordfound))
{	

echo"<tr><td>User_ID:</td><td><input type=text name='uid' value='".$row["uid"]."'readonly></td></tr>";
echo"<tr><td>User Name:</td><td><input type=text name='un' value='".$row["username"]."'></td></tr>";
echo"<tr><td>Status</td><td>";
?>
<select name="status" required>
<option value="">choose option</option>
<option value="active"  >active</option>
<option value="inactive">inactive</option>
</select></td>
<tr>
<?php
echo"<tr><td>Role</td><td>";
$sql=mysql_query("select*from user where uid='$key'");
while($r=mysql_fetch_array($sql))
{
$role=$r["role"];
}
?>
<select name="role" required>
<option value="">choose option</option>
<?php
if($role=="Admin")
{
?>
<option value="<?php echo $role;?>" selected><?php echo $role;?></option>
<option value="Candidate" >Candidate</option>
<option value="Exam setter">Exam Setter</option>
<option value="Exam Editor">Exam Editor</option>
<option value="Registrar">Registrar</option>
<option value="Department Head">Department Head</option>

<?php	
}
else if($role=="Exam Editor")
{
?>
<option value="<?php echo $role;?>" selected><?php echo $role;?></option>
<option value="Candidate" >Candidate</option>
<option value="Exam setter">Exam Setter</option>
<option value="Registrar">Registrar</option>
<option value="Department Head">Department Head</option>
<option value="Admin">Admin</option>
<?php
	
}
else if($role=="Registrar")
{
?>
<option value="<?php echo $role;?>" selected><?php echo $role;?></option>
<option value="Candidate" >Candidate</option>
<option value="Exam setter">Exam Setter</option>
<option value="Exam Editor">Exam Editor</option>

<option value="Department Head">Department Head</option>
<option value="Admin">Admin</option>
<?php
}
else if($role=="Candidate")
{
?>
<option value="<?php echo $role;?>" selected><?php echo $role;?></option>

<option value="Exam setter">Exam Setter</option>
<option value="Exam Editor">Exam Editor</option>
<option value="Registrar">Registrar</option>
<option value="Department Head">Department Head</option>
<option value="Admin">Admin</option>
<?php
}
else if($role=="Exam setter")
{
?>
<option value="<?php echo $role;?>" selected><?php echo $role;?></option>
<option value="Candidate" >Candidate</option>

<option value="Exam Editor">Exam Editor</option>
<option value="Registrar">Registrar</option>
<option value="Department Head">Department Head</option>
<option value="Admin">Admin</option>
<?php
}
else if($role=="Department Head")
{
?>
<option value="<?php echo $role;?>" selected><?php echo $role;?></option>
<option value="Candidate" >Candidate</option>

<option value="Exam Editor">Exam Editor</option>
<option value="Registrar">Registrar</option>
<option value="Department Head">Department Head</option>
<option value="Admin">Admin</option>
<?php
}
else 
{
	
if($role=="Exam Editor")
{
?>
<option value="<?php echo $role;?>" selected><?php echo $role;?></option>
<option value="Candidate" >Candidate</option>
<option value="Exam setter">Exam Setter</option>

<option value="Registrar">Registrar</option>
<option value="Department Head">Department Head</option>
<option value="Admin">Admin</option>
<?php
}
}


?>
</select></td>
<tr>
<td><input type="submit" name="bolcked" value="Block/update"/></td>
</tr>
<?php
}}
else
echo "No result found!!!";		
}
else
{
if(isset($_POST["bolcked"]))
{
$id=$_POST["uid"];
$status=$_POST["status"];
$un=$_POST["un"];
$role=$_POST["role"];

if($con)
{	
$sql="update account  set status='$status',username='$un' where uid='$id'";
$sql1="update user  set role='$role' where uid='$id'";
$updated=mysql_query($sql,$con);
$updated1=mysql_query($sql1,$con);
if(mysql_affected_rows($con))
{
if($status=="inactive")
{
echo mysql_affected_rows($con)."  User IS Successfully Blocked!";
$activity="update User account Information(userid=$id,username=$un,status of  active user change by inactive or blocked)";
$logsql=mysql_query("insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");
}
else
{	
echo mysql_affected_rows($con)."  User IS Successfully Updated!";
$activity="update User account Information(userid=$id,change username by $un)";
$logsql=mysql_query("insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");
}
}
else
echo "changed!".mysql_error($con);
}
else
die("Connection Failed:".mysql($con));	
}
}

?>
</form>
</table>
<br><br><br><br>
</div>
<br><br>
</fieldset>

</div>

</div>
<br><br><br><br><br><br>
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
