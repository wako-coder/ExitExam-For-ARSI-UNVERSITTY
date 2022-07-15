
<?php
	include('../connection.php');
	$con= mysql_connect('localhost','root','');
$id=$_GET['id'];
$query3=mysql_query("select * from notification where editor_status='read'  and user_status='read' and pay_fee='Yes' and check_status='No' and request_id='$id'");
if($row=mysql_fetch_assoc($query3))
$query1=mysql_query("UPDATE notification SET check_status ='Yes' where  request_id='$id'");
	
if ($query1)
{
$x='<script type="text/javascript">alert("Save !!!");
window.location=\'last_unread.php\';</script>';
echo $x;
}
?>