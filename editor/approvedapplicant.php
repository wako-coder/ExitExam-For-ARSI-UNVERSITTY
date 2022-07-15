
<?php
	include('../connection.php');
	$con= mysql_connect('localhost','root','');
$id=$_GET['id'];
$query3=mysql_query("select * from notification where editor_status='unread' and request_id='$id'");
if($row=mysql_fetch_assoc($query3))
$query1=mysql_query("UPDATE notification SET editor_status='read' where request_id='$id'");
	
if ($query1)
{
$x='<script type="text/javascript">alert("Approved !!!");
window.location=\'unreadd.php\';</script>';
echo $x;
}
?>