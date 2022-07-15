<?php
//session_start();
include("../connection.php");
?>
<html>
<head>
<style type="text/css">
.name
{
color:#d92641;
font-style:bold;
	
}
#table_style
{
width: 500px;
height: auto;
text-align: left;
margin-left: 80px;

}
</style>
</head>
<body>
<div class="name" id="table_style">
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
$sq="select*from candidate WHERE cid='$uid'";
$recordexist=mysql_query($sq,$con);
if(mysql_affected_rows($con))
{
while($row=mysql_fetch_array($recordexist))
{
$university=$row["unversity"];	
$dept=$row["dept"];
$year=$row["year"]	;
} 
echo "<br><table>";
echo"<tr><th colspan='4' style='text-align: center;' >Candidate Information</th></tr>";
echo"<tr><td>FullName:</td><td><td>".$fullname."</td><td rowspan='6'><img src=".$photo." width=100px height=100px alt='Image'></td></tr>";
echo"<tr><td>University:</td><td><td>".$university."</td></tr>";
echo"<tr><td>Department:</td><td><td>".$dept."</td></tr>";
echo"<tr><td>User Name:</td><td><td>".$uname."</td></tr>";
echo"<tr><td>Role:</td><td><td>".$role."</td></tr>";
echo"<tr><td>UserID:</td><td><td>".$uid."</td></tr>";
echo"<tr><td>year :</td><td><td>".$year." E.C </td></tr>";
echo "</table><br>";
}
else
echo"No Candidate Record Found"	;
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
echo "<br><table>";
echo"<tr><th colspan='4' style='text-align: center;' >User Information</th></tr>";
echo"<tr><td>FullName:</td><td><td>".$fullname."</td><td rowspan='3'><img src=".$photo." width=100px height=100px alt='Image'></td></tr>";
echo"<tr><td>User Name:</td><td><td>".$uname."</td></tr>";
echo"<tr><td>Role:</td><td><td>".$role."</td></tr>";
echo "</table><br>";
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