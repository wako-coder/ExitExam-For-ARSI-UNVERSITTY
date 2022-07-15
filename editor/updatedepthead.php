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
 <p>Dear User,<font color="red"> <?php echo $fullname;?></font> Before update or editing the Departmnent Head profile,Frist you must expected to know the ID number of the registerd department .After that we can edit/update the profile by enter the ID number of the Departmnent Head under below search textbox and then click on search button.</p>
</div>

<fieldset id="fieldset" ><legend>Update Department head info</legend>
	<div style="margin-left: 20px; background-color:#bccdf1;width: 540px;">
	<br>

	<table  border=0>
	<form action="" method="post"  enctype="multipart/form-data">
	<tr>
	<td><input type="text" name="searchkey" placeholder="search by using ID"/> </td>
	<td><input type="submit" name="search" value="search"/></td>
	</tr>
	<tr>
	<td colspan="2"><hr style="border-color: #801137;width: 535px;"></td>
	</tr>

	<?php
	if(isset($_POST["search"]))
	{
	$searchvalue=$_POST["searchkey"];	
	$d=mysql_query("select*from depthead where did='$searchvalue'");
	while($r=mysql_fetch_array($d))
	{
	$dept=$r["dname"];
	$uname1=$r["uid"];	
	$eid=$r["eid"];	
	}
	if(mysql_num_rows($d)>0)
	{
	$sql="select * from user where uid='$searchvalue'";
	$recordfound=mysql_query($sql,$con);
	if(mysql_affected_rows($con))
	{

	while($row=mysql_fetch_assoc($recordfound))
	{



	echo"<tr><td>ID:</td><td><input type=text name='did1' value='".$row["uid"]."'readonly></td></tr>";
	echo "<tr><td>Frist Name:</td><td><input type=text name='fname1' value='".$row["ufname"]."' required pattern='[a-zA-Z]+'></td></tr>";
	echo "<tr><td>Father Name:</td><td><input type=text name='fname2' value='".$row["umname"]."' required pattern='[a-zA-Z]+'></td></tr>";
	echo "<tr><td>Grand Father Name :</td><td><input type=text name='lname2' value='".$row["ulname"]."' required pattern='[a-zA-Z]+'></td></tr>";
	echo "<tr><td>Sex:</td><td><input type=text name='sex' value='".$row["sex"]."' required></td></tr>";
	echo "<tr><td>Mobile :</td><td><input type=text name='mb' value='".$row["mobile"]."' required></td></tr>";
	echo "<tr><td>Email :</td><td><input type='email' name='email' value='".$row["email"]."' required></td></tr>";
	echo "<tr><td>Department:</td>";
	//Display all department list
	if($con)
	{
	$sql1="select DISTINCT dname from department";
	$recordfound1=mysql_query($sql1,$con);
	if(mysql_affected_rows($con))
	{
	echo"<td><select name='dname1'>";
	while($row1=mysql_fetch_assoc($recordfound1))
	{
	$dept1=$row1["dname"];
	if($dept1==$dept)
	{
	?>
	<option value="<?php echo $dept;?>" selected ><?php echo  $dept;?></option>
	<?php	
	}	
	else
	{
	?>
	<option value="<?php echo $dept1;?>" ><?php echo $dept1;?></option>
	<?php	
	}


	}


	echo"</td></tr></select";
	}
	else
	echo "No records found!";
	}
	else
	echo"connection failed";
	//ending  department edition
	echo "<tr><td>University:</td>";
	//Display all university  list

	if($con)
	{
	$sql2="select uid from university";
	$recordfound2=mysql_query($sql2,$con);
	if(mysql_affected_rows($con))
	{
	echo"<td><select name='uname11'>";
	while($row1=mysql_fetch_assoc($recordfound2))
	{
	$uname=$row1["uid"];
	if($uname==$uname1)
	{
	?>
	<option value="<?php echo $uname1;?>" selected ><?php echo  $uname1;?></option>
	<?php	
	}	
	else
	{
	?>
	<option value="<?php echo $uname;?>" ><?php echo $uname;?></option>
	<?php	
	}


	}


	echo"</td></tr></select";
	}
	else
	echo "No records found!";
	}
	else
	echo"connection failed";
	//ending universty edition
	echo "<tr><td>Editor_ID</td><td><input type=text name='eid' value='".$eid."' readonly required></td></tr>";

	}
	echo "<tr><td><input type=submit name='update' value='update'></td> ";
	echo "<td><input type=reset value=Cancel></td></tr>";
	}
	else
	echo "<div class='style1'>No result found</div>";

	}
	else
	echo "No Record Found";
	}

	elseif(isset($_POST["update"]))
	{
	$id=$_POST["did1"];
	$eid=$_POST["eid"];
	$fname=$_POST["fname1"];
	$mname=$_POST["fname2"];
	$lname=$_POST["lname2"];
	$univer=$_POST["uname11"];
	//$col=$_POST["cname"];
	$dept=$_POST["dname1"];
	$sex=$_POST["sex"];
	$email=$_POST["email"];
	$mobile=$_POST["mb"];
	//photo
	if($con)
	{	
	$sql="update user  set ufname='$fname',umname='$mname',ulname='$lname',sex='$sex',mobile='$mobile',email='$email' where uid='$id'";
	$sq="update depthead  set dname='$dept',uid='$univer' where did='$id'";
	echo"<div class='style1'>";
	$updated=mysql_query($sql,$con);
	$updated1=mysql_query($sq,$con);
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
	echo"<div class='style1'>well come to editing department head information/profile</div>";
	?>
</form>
</table>
</div>
</fieldset>


<?php
	if($con)
	{
	$sql="select * from depthead";
	$recordfound=mysql_query($sql,$con);
	if(mysql_affected_rows($con))
	{
	?>
	<div style="height: auto;width: 955px;
	border:solid 4px #dldbeg;
	overflow-y:scroll;
	overflow-x:scroll; margin-left: 20px;" >
	<?php
	echo "<table border='1'>";
	echo"<tr> <th>ID_Number</th><th>Frist Name</th><th>Father Name</th><th>Grandfather Name</th> <th>Sex </th>
	<th>Mobile</th><th>photo</th><th>Email</th><th>Department</th><th>university</th><th>Exam editor ID</th></tr>";
	while($row=mysql_fetch_assoc($recordfound))
	{
	$did=$row["did"];
	$deptid=$row["dname"];
	$unverid=$row["uid"];
	$dept=mysql_query("select*from department where dname='$deptid'");
	while($deptrow=mysql_fetch_array($dept))
	$deptname=$deptrow["dname"];	
	$un=mysql_query("select*from university where uid='$unverid'");
	while($unrow=mysql_fetch_array($un))
	$unname=$unrow["uname"];	
	$sql=mysql_query("select*from user where uid='$did'");
	$user=mysql_num_rows($sql);
	if($user>0)
	{
	while($row1=mysql_fetch_assoc($sql))
	echo "<tr> <td>". $row["did"]."</td><td>".$row1["ufname"]."</td> <td>".$row1["umname"]."</td> <td>".$row1["ulname"]."</td> <td>".$row1["sex"]."</td> <td>".$row1["mobile"]."</td> <td><img src=".$row1["photo"]." width=50 height=60 alt='image'/></td> <td>".$row1["email"]."</td> <td>".$deptname."</td> <td>".$unname."</td>  <td>".$row["eid"]."</td></tr>";
	}
	else
	echo"No Record Found";
	}
	echo "</table></div>";
	}
	else
	echo "No records found!";
	}
	else
	echo"connection failed";
	?>




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
 <br><br>
</div>
<?php
require("footer.php");
?>
</body>
</html>






