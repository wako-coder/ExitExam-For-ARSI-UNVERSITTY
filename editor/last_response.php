<?php
session_start();
include("../connection.php");
require("head.php");

?>


<body>
    <div id="main">
        <?php
if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
?>
        <?php
require("dmu.php");	   
?>
        <div id="header">
            <div id="banner">

                <!--<div id="welcome_slogan"> -->
                <!-- Header Layout Content -->
                <div class="mdk-header-layout__content page">
                    <div class="page__header  page__header-nav mb-0">
                        <div class="container page__container">
                            <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0 d-none d-md-flex"
                                id="secondaryNavbar">
                                <?php
								require("editormenu.php");	

										
								?>
                            </div>
                        </div>
                    </div>

                </div>



				<div class="conatiner">
			<div class="row">
				<div class="col-2">
				
				<?php
								 require("editorsidelink.php");
								 ?>
				</div>
				<div class="col-7">
	 
<div id="content">
<div class="content_item" style="margin-top: 0px;">
<div class="style1" id=textinput>
	<?php
	//Include the PS_Pagination id
		include('ps_pagination.php');
?>
<div style="height: 500px;width:759px;
border:solid 4px #dldbeg;
overflow-y:scroll;
overflow-x:scroll;">
<form action="" method="post">									
<?php
$query1 = mysql_query("select * from notification where editor_status='read' and user_status='read' and pay_fee='Yes' and check_status='No' and user_last_response='No'")
or die(mysql_error());
$counts = mysql_num_rows($query1);
?>											
<a href="last_unread.php"><i class="icon-check"><font size="4px"> Unseen Pay Fee Request [&nbsp;<?php echo $counts;?>&nbsp;]</font></i></a>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										
<a href="seen_last_response.php"><i class="icon-envelope-alt"><font size="4px">Seen Pay  Fee Request</font></i></a>									
<font size="3px">
<?php
$sql = "select * from notification where editor_status='read'  and user_status='read' and pay_fee='Yes' and check_status='No' and user_last_response='No' ORDER BY dates DESC";
	 
	//Create a PS_Pagination object
	$pager = new PS_Pagination($con, $sql, 3, 8);
 	//The paginate() function returns a mysql result set for the current page
	$rs = $pager->paginate();									
$query1 = mysql_query("select * from notification where editor_status='read'  and user_status='read' and pay_fee='Yes' and check_status='No' and user_last_response='No' ORDER BY dates DESC")
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
<th colspan="2">Action</th>

</tr>
        <?php
while($row = mysql_fetch_array($rs))
{	
$id=$row["request_id"]; 							 
	//mysql_query("UPDATE notification SET status='unread'");
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
<td><div class="zoomimage"><?php echo "<img src=".$row["image"]." width='100' height='100' alt='NO Bank_Receipt'/>"; ?></div></td>
<td><?php echo '<a  href="save_last.php?id='.$row['request_id'].'">Accept</a>';?></td>
<td><?php echo '<a  href="Reject.php?id='.$row['request_id'].'">Reject</a>';?></td>
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
</div>
</div>
 <?php
}
else
{
header("location:../index.php");
}
?>

<div id="footer">
</div>

<!--close footer-->  
 <br> <br>  
</div>  
<?php
require("footer.php");
?>
</body>
</html>



