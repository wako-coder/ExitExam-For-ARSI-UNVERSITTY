 
<?php  
session_start();
include("connection.php");
$logout_time=date("h:i:s");
$uid=$_SESSION['$uid'];
$work_date=date('Y-m-d');

//unset all session
unset($_SESSION['fullname']);
unset($_SESSION['sun']);
unset($_SESSION['spw']);
unset($_SESSION['login_time']);
unset($_SESSION['role']);

if( !isset($_SESSION['sun']) || !isset($_SESSION['spw'])||!isset($_SESSION['fullname'])||!isset($_SESSION['role']))
{
$sql="update logtable  set logout_time='$logout_time' where user_id='$uid' and date='$work_date' and logout_time='empty' "; 
$updated=mysql_query($sql);
if($updated)
header("location:index.php");	
else
echo" Make Error ".mysql_error();
}


?>  
