<html>
<head>
<style type="text/css">
.name
{
color:#d92641;
font-style:bold;
	
}
</style>
</head>
<body>
<div class="name">
<?php
if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{	
$uid=$_SESSION['$uid'];
$uname=$_SESSION['sun'];
$fullname=$_SESSION['fullname'];
$photo=$_SESSION['sphoto'];
$role=$_SESSION['role'];
if($_SESSION['role']=="Admin")
{
echo"Full Name:".$fullname;
echo("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
echo"<img src='".$_SESSION['sphoto']."' width=100px height=100px>";
echo"<br>User Name:".$uname;
echo"<br>Role:".$role;
}
if($_SESSION['role']=="Candidate")
{
echo"Full Name:".$fullname;
echo("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
echo"<img src='".$_SESSION['sphoto']."' width=100px height=100px>";
echo"<br>User Name:".$uname;
echo"<br>Role:".$role;
}
if($_SESSION['role']=="Department Head")
{
	echo $_SESSION['fullname'];
}
if($_SESSION['role']=="Registrar")
{
echo"Full Name:".$fullname;
echo("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
echo"<img src='".$_SESSION['sphoto']."' width=100px height=100px>";
echo"<br>User Name:".$uname;
echo"<br>Role:".$role;
}
if($_SESSION['role']=="Exam Editor")
{
echo"Full Name:".$fullname;
echo("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
echo"<img src='".$_SESSION['sphoto']."' width=100px height=100px>";
echo"<br>User Name:".$uname;
echo"<br>Role:".$role;
}
if($_SESSION['role']=="Exam setter")
{
echo"Full Name:".$fullname;
echo("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
echo"<img src='".$_SESSION['sphoto']."' width=100px height=100px>";
echo"<br>User Name:".$uname;
echo"<br>Role:".$role;
}
}
else
echo("");
?>
</div>
</body>
</html>