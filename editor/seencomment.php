
	<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>comment</title>
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
  	.fieldset
{
	width:400px;
	text-align: left;
	margin-left: 15px;
	margin-top: 70px;
	height: auto;
	border-radius:0px;
	border-color: #801137;


	}
table 
{
    border-collapse: collapse;
}

th, td {
    text-align: left;
    padding: 8px;
}
th {
    text-align: center;
   
}
  tr:nth-child(even)
  {
  	background-color: #f2f2f2
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

	 
	<div class="sidebar_container ">
	<div class="sidebar">
	<div class="sidebar_item" style="height: 500px;">

<h2>Additional Link</h2>

   <?php
	require("editorsidelink.php");
	?>
<br><br><br>
	</div>  
	</div>
	</div>		 
<div id="content">
<div class="content_item" style="margin-top:0px";>
<div class="style1" id=textinput>
<?php
	//Include the PS_Pagination id
		include('ps_pagination.php');
	
	//Connect to mysql db
?>
<form action="" method="post">									
<?php
$query = mysql_query("select * from comment where status='unread' ORDER BY Date DESC")
or die(mysql_error());
$coun = mysql_num_rows($query);
?>		
										
<a href="unseencomment.php"><i><font size="4px"> Unseen Comment [&nbsp;<?php echo $coun?>&nbsp;]</font></i></a>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										
				<a href="seencomment.php"><i class="icon-envelope-alt"><font size="4px">Saved Comment</font></i></a>
<font size="3px">
<p align="right" style="color: #2773d8;font-family: time new romans;font-size: 17;">Number of record:<?php 
$count_item=mysql_query("select * from comment where status='read'" ) or die(mysql_error());
$count=mysql_num_rows($count_item);	
echo"<font color='red'>".($count)."</font>"; ?></p>							
									<?php
$query1 = mysql_query("select * from comment where status='read' ORDER BY Date DESC")
or die(mysql_error());
?>

<?php
$sql = "select * from comment where status='read' ORDER BY Date DESC";
	 
	//Create a PS_Pagination object
	$pager = new PS_Pagination($con, $sql, 3, 8);
 	//The paginate() function returns a mysql result set for the current page
	$rs = $pager->paginate();									
$query1 = mysql_query("select * from comment where status='read' ORDER BY Date DESC")
or die(mysql_error());
								$count = mysql_num_rows($query1);	
								if ($count != '0'){?>

<table border="1" id="resultTable">
<tr>
<th>comment_id</th>
<th>User_ID</th>
<th>Frist Name</th>
<th>Last Name</th>
<th>Date</th>
<th>Email</th>
<th>Content</th>
<th colspan="2" align="center">Action</th>
</tr>
        <?php
while($row = mysql_fetch_array($rs))
{	
$id=$row["comment_id"]; 							 
	//mysql_query("UPDATE applicant SET unread='yes'");
	?>
<tr>
<div class="post"  id="del<?php echo $id; ?>">
<td><?php echo $row["comment_id"]; ?></td>
<td><?php echo $row["user_id"]; ?></td>
<td><?php echo $row["fname"]; ?></td>
<td><?php echo $row["lname"]; ?></td>
<td><?php echo $row["Date"]; ?></td>
<td><?php echo $row["email"]; ?></td>
<td><?php echo $row["content"]; ?></td>
<td><?php echo '<a  href="rejectcomment.php?id='.$row['comment_id'].'">Reject</a>';?></td>
</div>
											
<?php
 }
	?>
	</tr></table>
	<?php
		echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
	}						
	else{ ?>
								<div class="alert alert-info"><i class="icon-info-sign"></i> <font size="3px">No  Comment to be saved!</div>
								<?php } ?>
										
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

  