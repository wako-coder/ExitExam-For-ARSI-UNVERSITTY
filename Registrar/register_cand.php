<?php
session_start();
include("../connection.php");
require("head.php");
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
  
  
</head>

<body>
 <div id="main">
  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
$year=$_SESSION['year'];
$uid=$_SESSION['$uid'];
$username=$_SESSION['sun'];
$role=$_SESSION['role'];
$login_time=$_SESSION['login_time'];
$logout_time="empty";

	
$sql="select * from registrar where rid='$uid'";
$record=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
while($row=mysql_fetch_assoc($record))
{	
$unverid=$row["uid"];
$sql2=mysql_query("select*from university where uid='$unverid'");
     while($unrow=mysql_fetch_array($sql2))
      $university=$unrow["uname"];
	}

	}
	else
	echo "No records found!";
	//$_POST["cname"]=NULL;
?>
  <div id="header">
	   <div id="banner">
	    
	    <!--<div id="welcome_slogan"> -->
		<?php
require("dmu.php");	   
?>
                <!--</div> <!--close welcome_slogan-->
            </div>
            <!--close banner-->
        </div>
        <div class="mdk-header-layout__content page">
            <div class="page__header  page__header-nav mb-0">
                <div class="container page__container">
                    <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0 d-none d-md-flex"
                        id="secondaryNavbar">
                        <?php
require("registrar_menu.php");		

		
?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div><!--close menubar-->	

	<div class="mt-3 container">
 <fieldset class="fieldset"><legend>Register Candidate</legend>
 <br><br>
<form action="" method="post" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">

<div style="margin-left: 50px;">


<table width="90%" align="center">
<tr>
<td>
<label>Colleage/Institute</label>
<br>
<select name="cname" required class="form-control" onchange="this.form.submit()">

<option class="form-control" value="">Select Your Option</option>
<?php
if($con){

	if(isset($_POST["cname"]))
	{
		$sql=mysql_query("select DISTINCT cname from department WHERE uid='$unverid'");

	while($finresult = mysql_fetch_array($sql)){

	//$did = $finresult ['regionid'];
	$name = $finresult ['cname'];

	if($_POST["cname"]==$name)

	{
		$name = $finresult ['cname'];
		?>
	<option value="<?php echo $name; ?>" selected><?php echo $name; ?></option>
	<?php 
	}
	else
	{
	?>
	<option value="<?php echo $name; ?>"><?php echo $name; ?></option>
	<?php
	 }}


	}
	else
	{
	?>
	<option value="" selected>choose option</option>
	<?php
	$result1 = mysql_query("select DISTINCT cname from department WHERE uid='$unverid'");
	while($finresult = mysql_fetch_array($result1)){

	//$did = $finresult ['regionid'];
	$name = $finresult ['cname'];
	?>
	<option value="<?php echo $name; ?>"><?php echo $name; ?></option>
	<?php
	}}} 
	 ?>
	

</select>
</td>
<td>
<label>Department</label>
<br>
<select class="form-control" name="dname" required >

<option value="">Select Your Option</option>
	<?php
	if(isset ($_POST["cname"]))
	{
	$cname1=$_POST["cname"];
	
	if($con)
	{
	$sql="select dname from department WHERE uid='$unverid' and cname='$cname1'";
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
	}
	
	?> 
</select>
</td>

</tr>
<tr>
<td><label>University</label><input class="form-control" type="text" name="unvi" value="<?php echo $university;?>" readonly/></td>
<td><label>Year</label><input class="form-control" type="text" name="year" value="<?php echo $year;?>" readonly width="90%"/></td>
</tr>


<tr>
<td><label>Registrar ID</label><input class="form-control" type="text" name="rid" value="<?php echo $uid;?>" readonly/></td>
<td><label>Candidate ID</label><input class="form-control" type="text" name="cid" pattern="[a-zA-Z0-9/_.\-+]+" required /></td>
</tr>

<tr>
<td><label>Frist Name</label><input class="form-control" type="text" name="fn" onKeyPress="return ValidateAlpha(event)" /></td>
<td><label>Father Name</label><input class="form-control" type="text" name="mn" onKeyPress="return ValidateAlpha(event)" /></td>
</tr>

<tr>
<td><label>Grand Father Name</label><input class="form-control" type="text" name="gfn" onKeyPress="return ValidateAlpha(event)"  /></td>
<td><label>Email</label><input class="form-control" type="text" name="email"  required/></td>
</tr>


<tr>
<td><label>Sex</label>
<br>
<select class="form-control" name="sex" required>
<option value="">choose option</option>
<option value="m">Male</option>
<option value="f">Female</option>
</select>
</td>
<td><label>Mobile Phone</label><input type="text" name="mb"/></td>
</tr>


<tr>
<td><label>Photo</label><br>
<input class="form-control" type="file" name="photo" required accept="image/*" onchange="loadFile(event)" id="file"/></td>
<!-- <td rowspan="3" align="center"><img id="output"  width="140" height="130"/></td> -->
</tr>

<tr>
<td><input class="btn btn-info" type="submit" name="registercand" value="Register" onclick="return validateemailform()">
<input type="reset" class="btn btn-warning" value="Cancel"></td>
</tr>
</table>
</div>
</form>


<?php
if(isset($_POST['registercand']))
{
$rid=$_POST["rid"];
$id=$_POST["cid"];
$fname=$_POST["fn"];
$mname=$_POST["mn"];
$lname=$_POST["gfn"];
$univer=$_POST["unvi"];
$col=$_POST["cname"];
$dept=$_POST["dname"];
$sex=$_POST["sex"];
$email=$_POST["email"];
$mobile=$_POST["mb"];
$year=$_POST["year"];
//photo
$ptmploc=$_FILES["photo"]["tmp_name"];
$pname=$_FILES["photo"]["name"];
$psize=$_FILES["photo"]["size"];
$ptype=$_FILES["photo"]["type"];
$new=$_SESSION['$uid'];
$rolecan="Candidate";
//$unv=mysql_query($sql2,$con);
if($con)
{	
$checkdept=mysql_query("select*from department where cname='$col' and dname='$dept' ",$con);
$database_dept=mysql_num_rows($checkdept);
if($database_dept>0)
{
	
//log file
if(!empty($_SERVER["HTTP_CLIENT_IP"]))
$ipaddress=$http_client_ip;
elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
$ipaddress=$http_x_forwarded_for;	
else
$ipaddress=$_SERVER['REMOTE_ADDR'];
//variable for log file
$time = time();
$start_time = date("d M Y @ h:i:s");
$work_date=date('Y-m-d');
$activity_type="Register Candidate";
$activity="id:$id "." Frist Name:$fname"." Father Name:$mname"." Last Name:$lname"." 
     sex:$sex"."phone:$mobile"."year:$year"."dept:$dept"."university:$univer";
//echo $activity;

if(!file_exists("userphoto"))
mkdir("userphoto");
$photopath="userphoto/$pname";
if(copy($ptmploc,$photopath))
{	

$sq="insert into user values('$id','$fname','$mname','$lname','$sex','$mobile','$email','$photopath','$rolecan')";
$sql="insert into candidate values('$id','$dept','$col','$univer','$rid','$year')";

$logsql=mysql_query("insert into logtable values(' ','$uid','$username','$role','$login_time','$logout_time','$start_time','$activity_type','$activity','$ipaddress','$work_date')");

$insert1=mysql_query($sq,$con);
$insert=mysql_query($sql,$con);
$insert2=mysql_query($logsql,$con);

if($insert1 && $insert)
echo" a Record Is Successfully Inserted!!!";
else
echo" NO record inserted!! ".mysql_error($con);	
}
else
echo "Unable to upload the photo!";
}
else
echo $dept." Is Not Found In $col Colleage";
}
else
die("Connection Failed:".mysql($con));
}

?>


 <br>
  <br>
   <br>
</fieldset>
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
<br><br>
</div>
<?php
require("footer.php");
?>
</body>
</html>
