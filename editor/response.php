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
<div class="content_item" style="margin-top:0px;">
<div class="style1" id=textinput>
	<?php
	//Include the PS_Pagination id
		include('ps_pagination.php');
?>
<form action="" method="post">									
<?php
$query = mysql_query("select * from notification where editor_status='unread' ORDER BY dates DESC")
or die(mysql_error());
$count = mysql_num_rows($query);
?>											
<a href="unreadd.php"><i></i><font size="4px"> Unseen Request [&nbsp;<?php echo $count?>&nbsp;]</font></a>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;									
<a href="messagedd.php"><i></i><font size="4px"> Approved Request</font></a>									
<font size="3px">
<?php
$sql = "select * from notification where editor_status='unread' ORDER BY dates DESC";
	 
	//Create a PS_Pagination object
	$pager = new PS_Pagination($con, $sql, 3, 8);
 	//The paginate() function returns a mysql result set for the current page
	$rs = $pager->paginate();									
$query1 = mysql_query("select * from notification where editor_status='unread' ORDER BY dates DESC")
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
<th colspan="2" align="center">Action</th>
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
<td><?php echo '<a  href="approvedapplicant.php?id='.$row['request_id'].'">Approve</a>';?></td>
<td><?php echo '<a  href="removeapplica.php?id='.$row['request_id'].'">Reject</a>';?></td>
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



