<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>unread Request</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <style type="text/css">
  .style1
  {
  	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size:15px;;
	width:550px;
	text-align:left;
	margin-top: 0px;

	color: black;
	margin-left: -180px;
	line-height: 25px;
	
	
  	} 

  </style>
</head>

<body>
<div id="main">
 	  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
	
?>
	<div id="header">
	<div id="banner">
	<?php
	require("dmu.php");	
	?>	 
	</div>
	</div>
	<div id="navigation">
	<?php
	require("editormenu.php");
	?>
	</div>



	<div id="site_content">	

	 
	<div class="sidebar_container">
	<div class="sidebar">
	<div class="sidebar_item" style="height: 500px;">

<h2>Additional Link</h2>

   <?php
	require("editorsidelink.php");
	?>

	</div>
	<br><br><br><br>  
	</div>
	</div>		 
<div id="content">
<div class="content_item" style="margin-top: 0px;">
<div class="style1" id=textinput>

<?php
	//Include the PS_Pagination id
		include('ps_pagination.php');
?>
<form action="" method="post">									
<?php

$query = mysql_query("select * from notification where editor_status='read'  and user_status='read' and pay_fee='Yes' and check_status='No' ORDER BY dates DESC")
or die(mysql_error());
$count = mysql_num_rows($query);
?>		
<a href="last_unread.php"><i></i><font size="4px"> Unseen Pay Fee Request [&nbsp;<?php echo $count?>&nbsp;]</font></a>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;									
<a href="seen_last_response.php"><i></i><font size="4px">Seen Pay Fee Request</font></a>									
<font size="3px">
<?php
$sql = "select * from notification where editor_status='read'  and user_status='read' and pay_fee='Yes' and check_status='No' ORDER BY dates DESC";
	 
	//Create a PS_Pagination object
	$pager = new PS_Pagination($con, $sql, 3, 8);
 	//The paginate() function returns a mysql result set for the current page
	$rs = $pager->paginate();
										
$query1 = mysql_query("select * from notification where editor_status='read'  and user_status='read' and pay_fee='Yes' and check_status='No' ORDER BY dates DESC")
or die(mysql_error());
$count = mysql_num_rows($query1);	
if ($count != '0')
{
?>
<table border="1" >
<tr>
<th>Request_id</th>
<th>User_ID</th>
<th>Department</th>
<th>University</th>
<th>Resean Of Request</th>
<th>Year</th>
<th>Date</th>
<th>Bank Receipt</th>
<th>Action</th>
</tr>
        <?php
while($row = mysql_fetch_array($rs))
{	
$id=$row["request_id"]; 							 
	//mysql_query("UPDATE applicant SET unread='yes'");
	?>
<tr>
<div class="post"  id="del<?php echo $id; ?>">
<td><?php echo $row["request_id"]; ?></td>
<td><?php echo $row["uid"]; ?></td>
<td><?php echo $row["dept"]; ?></td>
<td><?php echo $row["unvisersity"]; ?></td>
<td><?php echo $row["resean"]; ?></td>
<td><?php echo $row["year"]; ?></td>
<td><?php echo $row["dates"]; ?></td>
<td><div class="zoomimage"><?php echo "<img src=".$row["image"]." width='95' height='100' alt='NO Bank_Receipt' align='center'/>"; ?> </div></td>
<td><?php echo '<a  href="save_last.php?id='.$row['request_id'].'">Save</a>';?></td>
</div>											
<?php
 }
	?>
	</tr></table>
	<?php
		echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
	}						
	else
	{ 
	?>
<div class="alert alert-info"><i class="icon-info-sign"></i> <font size="3px">No New Request found!</div>
	<?php 
	} 
	?>
										
</form>		
                               
                        <!-- /block -->
</div>
</div>
</div>
	 <?php
}
else
{
header("location:../index.php");
}
?>
</div>

<div id="footer">
<?php
require("../footer.php");
?>
</div>

<!--close footer-->  
<br><br>
 </div>  
</body>
</html>

  