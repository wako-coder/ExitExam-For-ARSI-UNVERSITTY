
<?php
	include('../connection.php');
	$con= mysql_connect('localhost','root','');
$id=$_GET['id'];
$query3=mysql_query("select * from comment where status='unread' and comment_id='$id'");
if($row=mysql_fetch_assoc($query3))
$query1=mysql_query("UPDATE comment SET  status='read' where comment_id='$id'");
	
if ($query1)
{
$x='<script type="text/javascript">alert("Comment Saved !!!");
window.location=\'unseencomment.php\';</script>';
echo $x;
}
?>