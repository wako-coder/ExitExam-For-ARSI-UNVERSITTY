<?php
session_start();
include("../connection.php");

?>
<html>
<head>
  <title>Upddate user info</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <style type="text/css">

.style1 
{
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size: medium;
	margin-left: 25px;
	width: 940px;
	text-align: justify;
	margin-top: 10px;
}
#fieldset
{
	width: 535px;
	text-align: left;
	margin-left: 100px;
	margin-top: 20px;
	height: auto;
	border-radius:0px;
	border-color: #801137;

	}
	
input[type="text"], input[type="submit"],input[type="email"],select
 {
width: 180px;
height: 30px;

  
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
	    
	    <!--<div id="welcome_slogan"> -->
		 
	   <?php
require("dmu.php");	   
?>
	   <!--</div> <!--close welcome_slogan-->
	  </div><!--close banner-->
   </div><!--close header-->
	<div id="navigation">
	<?php
require("editormenu.php");	

		
?>

    </div><!--close menubar-->	
	<div id="site_content">
 <div id="content">
  <?php
$fullname=$_SESSION['fullname'];
$uname=$_SESSION['sun'];
$role=$_SESSION['role'];
$photo=$_SESSION['sphoto'];
?>
<div style="margin: 10px;float: right;border:1px Solid #dadcdc;
					 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);margin-top: -15px;">
					<table cellspacing="0">
						
						<tr><td colspan="2"><center><?php echo "<img src='../editor/$photo' height=150 width=150>"?></center></td></tr>
						<tr><td><b>User Name:</b></td><td><font color="#e9163c"><?php echo $uname;?></font></td></tr>
						<tr><td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Role:</b></td><td><font color="#e9163c">                                   <?php echo $role;?></font></td></tr>
						
					</table>
					</div>
 <div class="style1">
 <p>Dear User,<font color="red"> <?php echo $fullname;?></font>  Before update or editing the  Exam editor profile,Frist you must expected to know the ID number of the registerd  Exam editor .After that we can edit/update the profile by enter the ID number of the  Exam editor under below search textbox and then click on search button.after click the search button the profile became fill with form.so we can edit in the textbox and listbox of the form,but the ID number is not update beacuse it is primary key .after fill the form that you want to update click on update button and finally display "a record is update sucessfully".</p>
 </div>
  <hr>
<fieldset id="fieldset" ><legend>Update User info</legend>
<div style="margin-left:20px; background-color:#bccdf1; width: 540px;">
 <br>
 <table  border=0>
 <form action="" method="post"  enctype="multipart/form-data">
<tr>
<td><input type="text" name="searchkey" placeholder="search by using ID"/> </td>
<td><input type="submit" name="search" value="search"/></td>
</tr>
<tr><td colspan="2" width="535px"><hr style="border-color: #801137;"></td></tr>

 <?php
 if(isset($_POST["search"]))
{
$searchvalue=$_POST["searchkey"];	
 $sql="select * from user where uid='$searchvalue'";
 $recordfound=mysql_query($sql,$con);
 if(mysql_affected_rows($con))
	{
	$row=mysql_fetch_assoc($recordfound);
{
echo"<tr><td>User_ID:</td><td><input type=text name='eid' value='".$row["uid"]."'readonly></td></tr>";
echo "<tr><td>Frist Name:</td><td><input type=text name='fname1' value='".$row["ufname"]."' required pattern='[a-zA-Z]+'></td></tr>";
echo "<tr><td>Father Name:</td><td><input type=text name='fname2' value='".$row["umname"]."' required pattern='[a-zA-Z]+'></td></tr>";
echo "<tr><td>Grand Father Name :</td><td><input type=text name='lname2' value='".$row["ulname"]."' required pattern='[a-zA-Z]+'></td></tr>";
echo "<tr><td>Sex:</td><td><input type=text name='sex' value='".$row["sex"]."' required></td></tr>";
echo "<tr><td>Mobile :</td><td><input type=text name='mb' value='".$row["mobile"]."' required></td></tr>";
echo "<tr><td>Email :</td><td><input type=email name='email' value='".$row["email"]."' required></td></tr>";


}
	echo "<tr><td><input type=submit name='update' value='update'></td> ";
	echo "<td><input type=reset value=Cancel></td></tr>";
}
	else
	echo "<div class='style1'>No result found</div>";	
}

elseif(isset($_POST["update"]))
{
$id=$_POST["eid"];
$fname=$_POST["fname1"];
$mname=$_POST["fname2"];
$lname=$_POST["lname2"];
$sex=$_POST["sex"];
$email=$_POST["email"];
$mb=$_POST["mb"];
//photo
if($con)
{	
$sql="update user  set ufname='$fname',umname='$mname',ulname='$lname',sex='$sex',mobile='$mb',email='$email' where uid='$id'";
echo"<div class='style1'>";
$updated=mysql_query($sql,$con);
if(mysql_affected_rows($con))
echo mysql_affected_rows($con)."  a record/s update successfully!";
else
echo "Unable to update!".mysql_error($con);
echo"</div>";
}

else
die("Connection Failed:".mysql($con));	
}
else
echo"<div class='style1'>well come to editing Exam Editor information/profile</div>";
 ?>
</form>
</table>
</div>
</fieldset>
</div>

<?php
if($con)
 {
 $sql="select * from user";
$recordfound=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
	
	?>
<div style="height: auto;width: 800px;
border:solid 4px #dldbeg;
overflow-y:scroll;
overflow-x:scroll; margin-left: 50px;" >
	<?php
	echo "	<table border='1'>";
	echo"<tr><th>Editor ID</th><th>Frist Name</th><th>Father Name</th><th>Grandfather Name</th> <th>Sex </th><th>Mobile</th><th>Email</th><th>Photo</th></tr>";
	while($row=mysql_fetch_assoc($recordfound))
	echo "<tr> <td>". $row["uid"]."</td><td>".$row["ufname"]."</td> <td>".$row["umname"]."</td> <td>".$row["ulname"]."</td> <td>".$row["sex"]."</td> <td>".$row["mobile"]."</td> <td>".$row["email"]."</td> <td><img width='40' height='30'src=".$row["photo"]."></td></tr>";
	echo "</table>";
	
}
     else
     echo "No records found!";
   }
   else
   echo"connection failed";
?>
 
 </div> 
<br><br>

  </div>
   
   <?php
}
else
{
header("location:../index.php");
}
?>
       <div id="footer">
<?php
require("../footer.php");
?>
 </div>  
 <br> <br>
</div>
</body>
</html>






