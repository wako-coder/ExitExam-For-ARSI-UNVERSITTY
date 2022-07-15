<?php
if(isset($_POST["login"]))
{
include("connection.php");
function encryptpassword($password ) 
{
$cryptKey='qJB0rGtIn5UB1xG03efyCp';
$passwordEncoded= base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $password, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
return($passwordEncoded);
}
$uname=$_POST["un"];
$pass=$_POST["pass"];
$plaintext_password=$pass;
$password=encryptpassword($plaintext_password);
if($con)
{ 
//account
$sql="select * from account where username='$uname' and password='$password'";
$matchfound=mysql_query($sql,$con);
$userexist=mysql_num_rows($matchfound);
if($userexist>0)
{
$sql=mysql_query("delete from attempt");	
while($row=mysql_fetch_assoc($matchfound))
{
$id=$row["uid"];
$un=$row["username"];
$pw=$row["password"];
$status=$row["status"];	
$pw_status=$row["password_status"];
}
if($pw_status=="unchanged")	
{
$_SESSION['userid']=$id;
$_SESSION['oldpassword']=$pass;
header("location:change_password.php");		
}
else
{
$sqll="select * from user where uid='$id'";	
$matchfound1=mysql_query($sqll,$con);
while($user=mysql_fetch_assoc($matchfound1))
{
$fname=$user["ufname"];
$mname=$user["umname"];
$lname=$user["ulname"];
$role=$user["role"];
$photo=$user["photo"];	
}
//store value in session
$fullname=$fname." ".$mname." ".$lname;
$_SESSION['fullname']=$fullname;
$_SESSION['sun']=$un;
$_SESSION['spw']=$pw;
$_SESSION['role']=$role;
$_SESSION['$uid']=$id;
$_SESSION['sphoto']=$photo;



// variable declaration for log file registration
$login_time = date("h:i:s");
$_SESSION['login_time']=$login_time;

//end log record
//Go to Page
if($role=="Admin" &&  $status=="active"){
      	flush(); // Flush the buffer
        
header('location:admin/adminpage.php');	

}
else if($role=="Candidate" &&  $status=="active")
header("location:candidate/candidatepage.php");

else if($role=="Exam setter" &&  $status=="active")
header("location:setter/examsetterpage.php");

else if($role=="Exam Editor" &&  $status=="active")
header("location:editor/exameditorpage.php");

else if($role=="Registrar" &&  $status=="active")
header("location:Registrar/Registrar.php");

else if($role=="Department Head" &&  $status=="active")
header("location:dept/deptheadpage.php");
else
{
if($status=="inactive")
echo"<font color='red' size=4><b><i>Sorry Your Account Is Bolcked!!!</i></b></font>";
else
{
echo "<h1>Invalid username/passwords<h1>";
header("location:index.php");		
}

}
}
}
else
{
$count="insert";
$sql=mysql_query("select*from attempt");
$total=mysql_num_rows($sql);
$total++;
if($total>3)
{
//$sql=mysql_query("delete from attempt");
header("location:index1.php");
}
else
{
echo "<h1>Invalid username/password<h1>";
echo "<br>you are tries $total times,but allowed 4 times<h1>";
$insert=mysql_query("insert into attempt values(' ','$count')");	
}
}

}
else
echo"Connection fail".mysql_error();		 
}
?>
