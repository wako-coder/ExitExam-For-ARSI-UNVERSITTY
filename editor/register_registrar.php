
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
  
		   <div class="container">
 <br>
<fieldset id="fieldset" ><legend>Register Registrar</legend>
 <br><br>
<div style="margin-left: 20px;  width: 750px">
 <br><br>

<table>
<form action="" method="post" enctype="multipart/form-data"  name="myForm" onsubmit="return validateForm()">
<tr>
<td>Registrar_ID:</td><td><input type="text" name="rid" pattern="[a-zA-Z0-9/_.\-+]+" required /></td>
<td>Mobile Phone:</td><td><input type="text" name="mb" /></td>
</tr>
<tr>
<td>Frist Name:</td><td><input type="text" name="fn" onKeyPress="return ValidateAlpha(event)" /></td>
<td>Email:</td><td><input type="text" name="email"  /></td>
</tr>
<tr>
<td>Father Name:</td><td><input type="text" name="mn" onKeyPress="return ValidateAlpha(event)"/></td>
<td>Photo:</td><td><input type="file" name="photo" required accept="image/*" onchange="loadFile(event)" id="file"/></td>
</tr>
<tr>
<td>Grand father Name:</td><td><input type="text" name="gfn" onKeyPress="return ValidateAlpha(event)"/></td>
<td>Sex:</td>
<td>
<select name="sex" required readonly>
<option value="">choose option</option>
<option value="m">Male</option>
<option value="f">Female</option>
</select>
</td>
</tr>
 <tr>
<td>Address/University:</td>
<td>
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
<td>Editor_ID:</td><td><input type="text" name="eid" value="<?php echo $uid;?>" readonly /></td>

</tr>
<tr>
<td><input type="submit" name="registercand" value="Register" onclick="return validateemailform()"></td>
<td><input type="reset"  value="Cancel"></td>
<!-- <td colspan="2"><img id="output"  width="130" height="170"  style="float: right;"/></td> -->

</tr>

</form>
</table>

<?php
if(isset($_POST['registercand']))
{
$id=$_POST["rid"];
$eid=$_POST["eid"];
$fname=$_POST["fn"];
$mname=$_POST["mn"];
$lname=$_POST["gfn"];
$univer=$_POST["unvi"];
//$col=$_POST["cname"];
$sex=$_POST["sex"];
$email=$_POST["email"];
$mobile=$_POST["mb"];
$role="Registrar";
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
$sqa=mysql_query("select*from registrar where uid='$univer'");
if(mysql_num_rows($sqa)>0)
echo" The Registrar Is alread Exist";
else
{
$sq="insert into user values('$id','$fname','$mname','$lname','$sex','$mobile','$email','$photopath','$role')";
	$insert1=mysql_query($sq,$con);
	if($insert1)
	{
	$sql="insert into registrar values('$id','$univer','$eid')";	
	$insert=mysql_query($sql,$con);
	if($insert)
    echo" Registrar Successfully Registered";
    else
    echo" Unable To Registered<BR>".mysql_error($con);
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
   </div>
       <div id="footer">
   
</div>
<br><br>  
</div>
<?php
require("footer.php");
?>
               <!--close menubar-->
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
