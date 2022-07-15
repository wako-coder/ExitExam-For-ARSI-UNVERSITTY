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

    </div><!--close menubar-->	
  <div id="site_content"></div>  
	<div id="site_content">
 <div id="content">
 <div class="style1">
 <p>Dear User, <?php require("name.php");?> Before update or editing the  notice information,Frist you must expected to know the ID number of the registerd  Exam notice information .After that we can edit/update the profile by enter the ID number of the notice information under below search textbox and then click on search button.after click the search button the profile became fill with form.so we can edit in the textbox and listbox of the form,but the ID number is not update beacuse it is primary key .after fill the form that you want to update click on update button and finally display "a record is update sucessfully".</p>
 </div>
 
 <div style="margin-top:30px;margin-left: 200px;">
 <table  border=0>
 <form action="" method="post"  enctype="multipart/form-data">
 
 
<tr>
<td><input type="text" name="searchkey" placeholder="search by using ID"/> </td>
<td><input type="submit" name="search" value="search"/></td>
</tr>

<?php
 if(isset($_POST["search"]))
{
	$key=$_POST["searchkey"];
	$sql="select*from notice where notice_number='$key'";
	$recordfound=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
while($row=mysql_fetch_assoc($recordfound))
{	
$q=$row["Content"];
?>
<tr><td>Content</td><td><textarea name="content" cols="2" rows="1" ><?php echo $q;?></textarea></td></tr>
<?php
echo "<tr><td>Notice_id :</td><td><input type=text name='nid' value='".$row["notice_number"]."'/></td></tr>";
echo "<tr><td>Notice Title B :</td><td><input type=text name='title' value='".$row["title"]."'/></td></tr>";
echo "<tr><td>Date :</td><td><input type=text name='date' value='".$row["Dates"]."'/></td></tr>";
echo "<tr><td>Expire Date:</td><td><input type=text name='exdate' value='".$row["Ex_Dates"]."'/></td></tr>";
echo"<tr>";
?>
<td>Status:</td>
<td><select name='status' required  >
<option value="">choose status</option>
<option value='regular'>Regular</option>
<option value='reexam'>Other</option>
</select>	
</td>
</tr>
<?php
echo "<tr><td><input type=submit name='update' value='update'></td> ";
echo "<td><input type=reset value=Cancel></td></tr>";
}
}
	else
	echo "No Notice Registerd!!!";		
}
else
{
if(isset($_POST["update"]))
{
$nid=$_POST["nid"];
$status=$_POST["status"];
$title=$_POST["title"];
$conn=$_POST["content"];
$date=$_POST["date"];
$exdate=$_POST["exdate"];

if($con)
{	
$sql="update notice  set Content='$conn',title='$title',Dates='$date',Ex_Dates='$exdate',status='$status' where notice_number='$nid'";
$updated=mysql_query($sql,$con);
if(mysql_affected_rows($con))
echo mysql_affected_rows($con)."  a record/s update successfully!".mysql_error($con);
else
echo "Unable to update!".mysql_error($con);
}

else
die("Connection Failed:".mysql($con));	
	}
}

//view

?>
</form></table>
	</div>
  
 <?php 
  $sql="select*from notice ";
$record=mysql_query($sql,$con);
if(mysql_num_rows($record)>0)
{
?>
<table border="1">
<tr>
<th>ID</th>	
<th>Title</th>
<th>Content</th>
<th>Date</th>
<th>Expire Date</th>
<th>Status</th>
</tr>
<?php
while($row=mysql_fetch_array($record))
{
echo"<tr>

<td>".$row["notice_number"]."</td>
<td>".$row["title"]."</td>
<td>".$row["Content"]."</td>
<td>".$row["Dates"]."</td>
<td>".$row["Ex_Dates"]."</td>
<td>".$row["status"]."</td>

</tr>"	;
}
?>	
</table>
<?php	
}
else
echo"No Notice Is Registerd";


?>
 </div> 
<br><br><br> <br><br><br><br><br><br><br><br><br><br><br><br> 
<br><br><br><br>

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
 <br> <br>  
</div>
<?php
require("footer.php");
?>
</body>
</html>






