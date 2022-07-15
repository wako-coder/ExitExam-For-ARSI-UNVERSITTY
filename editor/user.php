<?php
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title>Register user</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <script type="text/javascript" src="../css/javasscript.js"></script>
  <style type="text/css">

.style1 
{
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size: medium;
}
#fieldset
{
   width: 750px;
	text-align: left;
	margin-left: 100px;
	margin-top: 20px;
	height: auto;
	border-radius:0px;
	border-color: #801137;
	}

  </style>
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
	  <div class="sidebar_container"></div>
	 
		   <div id="content">
<br>
<fieldset id="fieldset" ><legend>Register User</legend>
 <br><br>
<div style="margin-left: 20px; background-color:#bccdf1; width: 750px;">
 <br><br>

<table>
<form action="" method="post" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
<tr>
<td>User_ID:</td><td><input type="text" name="eid" pattern="[a-zA-Z0-9/_.\-+]+" required /></td>
<td>Sex:</td>
<td>
<select name="sex" required >
<option value="">choose option</option>
<option value="m">Male</option>
<option value="f">Female</option>
</select>
</td>
</tr>
<tr>
<td>Frist Name:</td><td><input type="text" name="fn" onKeyPress="return ValidateAlpha(event)" /></td>
<td>Mobile Phone:</td><td><input type="text" name="mb"   placeholder="Enter Phone"  onKeyPress="return isNumberKey(event)"/></td>
</tr>
<tr>
<td>Father Name:</td><td><input type="text" name="mn" onKeyPress="return ValidateAlpha(event)"/></td>
<td>Email:</td><td><input type="text" name="email"  placeholder="Enter Correct Email Address"/></td>
</tr>
<tr>
<td>Grand father Name:</td><td><input type="text" name="gfn" onKeyPress="return ValidateAlpha(event)" /></td>
<td>Photo:</td><td><input type="file" name="photo" required  accept="image/*" onchange="loadFile(event)" id="file"/></td>
</tr>
<tr>
<td>Role:</td>
<td>
<select name="role" required  >
<option value="" >Choose</option>
<option value="Admin" >Administrator</option>
<option value="Exam Editor">Exam Editor</option>

</select>
</td>
<td><input type="submit" name="registereditor" value="Register" onclick="return validateemailform()"></td>
<td><input type="reset"  value="Cancel"></td>
</tr>
<tr><td colspan="4"><img id="output"  width="100" height="170"  style="float: right;"/></td></tr>
</form>
</table>


<?php
if(isset($_POST['registereditor']))
{
$id=$_POST["eid"];
$fname=$_POST["fn"];
$mname=$_POST["mn"];
$lname=$_POST["gfn"];
$sex=$_POST["sex"];
$email=$_POST["email"];
$mobile=$_POST["mb"];
$role=$_POST["role"];
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
$sq="insert into user values('$id','$fname','$mname','$lname','$sex','$mobile','$email','$photopath','$role')";
$insert1=mysql_query($sq,$con);
if($insert1)
{
	if($role=="Exam Editor")
	{
	$in=mysql_query("insert into exameditor values('$id')");
	if($in)
	echo" User Succesfully Registerd";	
	else
	echo"unable to registered".mysql_error($con);	
	}
	else if($role=="Admin")
	echo" User Succesfully Registerd";
	else
	echo "No Registered".mysql_query($con);
	}  
else
echo" No User Succesfully Registerd<br>".mysql_error($con);
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
 <br><br>
</fieldset>

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
