<?php
session_start();
include("../connection.php");
require("head.php");

?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115115077-3"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-115115077-3');
    </script>

    <!-- Facebook Pixel Code -->
    <script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        '../connect.facebook.net/en_US/fbevents.js');
    fbq('init', '257843818545228');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=257843818545228&amp;ev=PageView&amp;noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->

  
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
   
		   <div class="mt-4 container">
 <br>
<fieldset id="fieldset" ><legend>Register Exam setter</legend>
<br><br>
<div style="margin-left: 20px; width: 750px;">
 <br><br>
<table>
<form action="" method="post" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
<tr>
<td>Setter-ID:</td><td><input type="text" name="sid" pattern="[a-zA-Z0-9/_.\-+]+" required /></td>
<td>Department:</td>
<td>
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
<td>Frist Name:</td><td><input type="text" name="fn" onKeyPress="return ValidateAlpha(event)" /></td>
<td>Mobile Phone:</td><td><input type="text" name="mb"   placeholder="Enter Phone Number"/></td>
</tr>
<tr>
<td>Father Name:</td><td><input type="text" name="mn" onKeyPress="return ValidateAlpha(event)" /></td>
<td>Email:</td><td><input type="text" name="email"   placeholder="Enter Corrrect Email Format"/></td>
</tr>
<tr>
<td>Grand father Name:</td><td><input type="text" name="gfn"onKeyPress="return ValidateAlpha(event)" /></td>
<td>Photo:</td><td><input type="file" name="photo" required accept="image/*" onchange="loadFile(event)" id="file"/></td>
</tr>
<tr>
<td>Sex:</td>
<td>
<select name="sex" required readonly>
<option value="">choose option</option>
<option value="m">Male</option>
<option value="f">Female</option>
</select>
</td>
<td>Year:</td><td><input type="text" name="year"  onKeyPress="return isNumberKey(event)" /></td>
</tr>
<tr>
<td>Editor_ID:</td><td><input type="text" name="eid" value="<?php echo $uid;?>" readonly /></td>
<td><input type="submit" name="registersetter" value="Register" onclick="return validateemailform()"></td>
<td><input type="reset"  value="Cancel"></td>
</tr>
<!-- <tr><td></td><td colspan="2"><img id="output"  width="100" height="102" style="float: right;" /></td><td></td></tr> -->
</form>

</table>
<br>
<?php
if(isset($_POST['registersetter']))
{
$id=$_POST["sid"];
$eid=$_POST["eid"];
$fname=$_POST["fn"];
$mname=$_POST["mn"];
$lname=$_POST["gfn"];
$dept=$_POST["dname"];
$sex=$_POST["sex"];
$email=$_POST["email"];
$mobile=$_POST["mb"];
$year=$_POST["year"];
$role="Exam setter";
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
  $sql="insert into Examsetter values('$id','$dept','$eid','$year')";
	$insert=mysql_query($sql,$con);
	if($insert)
    echo" Exam Setter Successfully Registered";
    else
    echo" Unable To Registered<BR>".mysql_error($con);
    }
	else
	echo" Unable To Registered<BR>".mysql_error($con);


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
       <div id="footer">
   
</div>
 <br> <br>  
</div>
<?php
require("footer.php");
?>
</body>
</html>
