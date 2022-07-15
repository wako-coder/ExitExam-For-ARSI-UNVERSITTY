<?php
$conn=mysql_connect("localhost","root","") or die(mysql_error());
	$sdb=mysql_select_db("exitexam",$conn) or die(mysql_error()); 
if(isset($_GET['id']))
{
	$email=$_GET['id'];
	$select_status=mysql_query("select * from notification where request_id='$email'");
	while($row=mysql_fetch_object($select_status))
	{
		//$st=$row->email;
	

	$query1=mysql_query("UPDATE notification SET editor_status ='reject' where  request_id='$email'");
	if($query1)
	{
	$x='<script type="text/javascript">alert("Reject !!!");
window.location=\'messagedd.php\';</script>';
echo $x;
	}
	else
	{
		echo mysql_error();
	}
	}
	?>
     
    <?php
}
?>