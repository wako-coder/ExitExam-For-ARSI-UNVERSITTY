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
	  <div class="sidebar_container"></div>
	 
		   <div id="content">
<br>
<fieldset id="fieldset" ><legend>Register Department Head</legend>
 <br>
<div style="margin-left: 120px;  width: 500px;">
 <br><br>
<table>
<form action="" method="post" enctype="multipart/form-data"  name="myForm" onsubmit="return validateForm()">
<tr>
<td>ID<input type="text" name="did" pattern="[a-zA-Z0-9/_.\-+]+" required /></td>

<td>Sex<br>
<select name="sex" required readonly>
<option value="">choose option</option>
<option value="m">Male</option>
<option value="f">Female</option>
</select>
</td>
</tr>
<tr>
<td>Frist Name:<input type="text" name="fn" onKeyPress="return ValidateAlpha(event)" /></td>
<td>Mobile Phone:<input type="text" name="mb" /></td>
</tr>
<tr>
<td>Father Name<input type="text" name="mn" onKeyPress="return ValidateAlpha(event)" /></td>
<td>Email<input type="email" name="email" placeholder="Enter Correct Email Format"  /></td>
</tr>
<tr>
<td>Grand father Name<input type="text" name="gfn" onKeyPress="return ValidateAlpha(event)" /></td>
<td>Department
<select name="dname" required >

<option value="">Select Your Option</option>
	<?php
	if($con)
	{
	$sql="select  DISTINCT dname from department";
	$recordfound=mysql_query($sql,$con);
	if(mysql_affected_rows($con))
	{
	while($row=mysql_fetch_assoc($recordfound))
	{
	?>
<option value="<?php echo $row["dname"];?>"><?php echo $row["dname"];?></option>
	<?php
	}
	}
	else
	echo "No records found!";
	}
	else
	echo"connection failed";
	?> 
</select>
</td>
</tr>
 <tr>
 <td>Photo<input type="file" name="photo" accept="image/*" onchange="loadFile(event)" id="file" required/></td>
<td>Address/University<br>
<select name="unvi" required >
<option value="">Select Your Option</option>

 <?php
	if($con)
	{
	$sql="select * from university";
	$recordfound=mysql_query($sql,$con);
	if(mysql_affected_rows($con))
	{
	while($row=mysql_fetch_assoc($recordfound))
	{
	?>
<option value="<?php echo $row["uid"];?>"><?php echo $row["uname"];?></option>
	<?php
	}
	}
	else
	echo "No records found!";
	}
	else
	echo"connection failed";
	?> 
</select>
</td>
</tr>
<tr>
<td>Editor_ID<input type="texr" name="eid" readonly value="<?php echo $uid;?>" /></td>
<!-- <td colspan="2" rowspan="3"><img id="output"  width="150" height="170"  style="float: left;"/></td> -->
</tr>
<tr>
<td><input type="submit" name="registerhead" value="Register" onclick="return validateemailform()"></td>
</tr>
<tr>
<td><input type="reset"  value="Cancel"></td>
</tr>

</form>
</table>

<?php
if(isset($_POST['registerhead']))
{
$id=$_POST["did"];
$eid=$_POST["eid"];
$fname=$_POST["fn"];
$mname=$_POST["mn"];
$lname=$_POST["gfn"];
$univer=$_POST["unvi"];
//$col=$_POST["cname"];
$dept=$_POST["dname"];
$sex=$_POST["sex"];
$email=$_POST["email"];
$mobile=$_POST["mb"];
$role="Department Head";
//photo
$ptmploc=$_FILES["photo"]["tmp_name"];
$pname=$_FILES["photo"]["name"];
$psize=$_FILES["photo"]["size"];
$ptype=$_FILES["photo"]["type"];
if($con)
{	
if(!file_exists("userphoto"))
mkdir("userphoto");
$photopath="userphoto/$pname";
if(copy($ptmploc,$photopath))
{
$exist=mysql_query("select*from depthead where uid='$univer' and dname='$dept'");
if(mysql_num_rows($exist)>0)
echo" The University and Department Name Is Allready exist ";
else
{
$sq="insert into user values('$id','$fname','$mname','$lname','$sex','$mobile','$email','$photopath','$role')";
$insert1=mysql_query($sq,$con);
if($insert1)
{
$sql="insert into depthead values('$id','$dept','$univer','$eid')";
$insert=mysql_query($sql,$con);
if($insert)
echo" Department Head Successfully Registered";	
else
echo" Unable To Registered<br>".mysql_error($con);
}
else
echo" Unable To Registered<br>".mysql_error($con);
}
}

else
echo "Unable to upload the photo!";
}
else
die("Connection Failed:".mysql($con));
}
?>
<br><br>
</div>
<br> <br>
</fieldset>
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
 <br> <br>  
</div>
<?php
require("footer.php");
?>
<script lang="javascript">
function validateemailform()
{
 var mb = document.forms["myForm"]["mb"].value;
if (mb == "") 
{
alert("Phone Number Is Empty please Fill");
return false;
}
var str=document.forms["myForm"]["mb"].value;
var valid="0123456789+"; 
for(i=0;i<str.length;i++)
{
if(valid.indexOf(str.charAt(i))==-1)
{
alert("please insert phone_number number only number");
document.forms["myForm"]["mb"].value="";
document.forms["myForm"]["mb"].focus();
return false;
}
}
if(str.length!=10)
{
alert("please enter phone number 10  digit.");
document.forms["myForm"]["mb"].focus();
return false;
}  
if (str.charAt(0)!="0")
{
alert("phone number should be start with 0");
document.forms["myForm"]["mb"].focus();
return false;
} 
if (str.charAt(1)!="9")			   
{
alert("phone number should be start with 09");
document.forms["myForm"]["mb"].focus();
return false;
}

//email
if(document.myForm.email.value == "" )
{
alert("Please fill your 's email!" );
document.myForm.email.focus() ;
return false;
}
var x=document.forms["myForm"]["email"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
{
alert("Not a valid e-mail address");
document.myForm.email.value="";
return false;
}


}
</script> 
</body>
</html>
