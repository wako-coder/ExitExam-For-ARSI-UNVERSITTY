
<?php
if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
	
$uid=$_SESSION['$uid'];
$uname=$_SESSION['sun'];
$fullname=$_SESSION['fullname'];
$photo=$_SESSION['sphoto'];
$role=$_SESSION['role'];

$sql="select*from candidate where cid='$uid'";
$record=mysql_query($sql,$con);
$true=mysql_num_rows($record);
if($true>0)
{
while($row=mysql_fetch_array($record))
{
$dname=$row["dept"];
$uniname=$row["unversity"];
}	

?>
	

					<table cellspacing="0" border="1">
						<tr  style="background-color: #5078af;height:30px;color: #fff;"><th colspan="2">
						<label>User Full Name:<?php echo ''.$fullname.'';?></label></th></tr>
						<tr><td><b>UserName:</b></td><td><?php echo ''.$uname.'';?></td></tr>
						<tr><td><b>Role:</b></td><td><?php echo ''.$role.'';?></td></tr>
						<tr><td><b>Department:</b></td><td><?php echo ''.$dname.'';?></td></tr>
						<tr><td><b>University:</b></td><td><?php echo ''.$uniname.'';?></td></tr>
						<tr><td><b>Exam Start Time</b></td><td><div id="starttime"></div><br /></td></tr>
						<tr><td><b>Counter Time</b></td><td><div id="showtime"></div><br /></td></tr>
					
					</table><div id="starttime">
					<div id="showtime">
<?php
}
}
?>