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
$uid=$_SESSION['$uid'];
$sql="select*from user where uid='$uid'";
$query=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
while($row=mysql_fetch_array($query))
$role=$row["role"];	
}
else
echo"The Record Is Not Found";
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

	  <div class="sidebar_container">
	  </div>
 <div id="content" >
 <br>
<fieldset id="fieldset" ><legend>Write and post new notice</legend>
<br>
<center>
<div style="margin-left: 20px; width: 400px;">
 <br><br>
 <table>
<form action="" method="post">
<tr>
<td>Status:</td>
<td>
<select name="status" required  >
<option value="">choose status</option>
<option value="regular">Regular</option>
<option value="reexam">Other</option>
</select>	
</td>
</tr>
<tr>
<td>Date:</td><td><input type="text" name="ndate" value="<?php echo date("Y-m-d");?>" required/></td>
</tr>
<tr>
<td>Expire Date:</td><td><input type="date" name="exdate" required/></td>
</tr>
<tr>
<td>Title:</td><td><input type="text" name="title"  required/></td>
</tr>
<tr>
<td>Content:</td><td>
<textarea  name="ncontent"  required cols="50" rows="5"></textarea></td>
</tr>
<tr>
<td>sender Name:</td><td>
<input type="text" name="sender" readonly value="<?php echo $role;?>"/> </td>
</tr>
<tr>
<td><input type="submit" name="notice" value="Post"></td>
<td><input type="reset"  value="Cancel"></td>
</tr>

</form>
</table>
<?php

if(isset($_POST['notice']))
{
$ndate=$_POST["ndate"];
$status=$_POST["status"];
$ex_date=$_POST["exdate"];
$tilte=$_POST["title"];
$content=$_POST["ncontent"];
$sender=$_POST["sender"];

if($con)
{
  $sql="insert into notice values(' ','$status','$tilte','$ndate','$ex_date','$content','$sender')";
   $insert=mysql_query($sql,$con);
   if($insert)
    echo" a record is inserted sucessfully";
	else
	echo" NO record inserted".mysql_error($con);
	
}
else
echo"Connection Failed:".mysql_error($con);
}
?>


</div></center>
<br><br>
</fieldset>
</div> 
<br><br><br><br><br>
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
