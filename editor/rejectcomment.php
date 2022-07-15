<?php
$conn=mysql_connect("localhost","root","") or die(mysql_error());
	$sdb=mysql_select_db("exitexam",$conn) or die(mysql_error()); 
if(isset($_GET['id']))
{
	$email=$_GET['id'];
	$select_status=mysql_query("select * from comment where comment_id='$email'");
	while($row=mysql_fetch_object($select_status))
	{
		$st=$row->email;
	

	$delet=mysql_query("DELETE FROM  comment WHERE comment_id='$email' ");
	if($delet)
	{
		header("Location:unseencomment.php");
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