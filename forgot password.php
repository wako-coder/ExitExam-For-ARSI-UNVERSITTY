<?php
       ob_start();
	require("head.php");
	?>


<body >

    <div class="preloader"></div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">
        <?php
	require("testmenu.php");
	?>



        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content page">
            <div class="page__header  page__header-nav mb-0">
                <div class="container page__container">
                    <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0 d-none d-md-flex"
                        id="secondaryNavbar">
                        <?php 
	                    require("bar.php");
                        ?>
                    </div>
                </div>
            </div>


	
<fieldset><legend align="center">Fill The Form Correctly</a></legend>
<br><br>
<form action="" method="post">
<center>
<div id="forgot">
<table>
<tr><td>Enter User Name	</td><td><input  type="text" name="username"  required /></td>	</tr>
<tr><td>Phone Number</td><td><input  type="text" name="mb"  required /></td>	</tr>
<tr><td>Last Name</td><td><input  type="text" name="lname"  required /></td>	</tr>
<tr><td>Email</td><td><input  type="text" name="email"  required /></td>	</tr>
<tr>
<td><input type="submit" name="forgot" value="Next"/></td>
<td><input type="reset" value="Cancel" style=" height: 25px;"
  width: 150px;;
  background:white;
  color: #150000;
  font-size: 15px;
  border-color: #a20000;"/></td>
</tr>
</table>
</div>
</center>
<br><br>
</form>
<?php
if(isset($_POST["forgot"]))
{
include("connection.php");
$uname=$_POST["username"];
$phone=$_POST["mb"];
$name=$_POST["lname"];
$email=$_POST["email"];

$exist=0;	
$sql=mysql_query("select*from account where username='$uname'",$con);
$exist=mysql_num_rows($sql);
if($exist>0)
{	
if($row1=mysql_fetch_array($sql))
{
$userid=$row1["uid"];
$un=$row1["username"];
$chekeit=mysql_query("select*from user WHERE uid='$userid'");
if(mysql_num_rows($chekeit)>0)
{
while($row=mysql_fetch_array($chekeit))
{
$name1=$row["ulname"];	
$mb1=$row["mobile"];	
$emai1=$row["email"];
}
if($name==$name1 && $phone=$mb1 && $un==$uname && $emai1==$email)
{
$_SESSION['uname']=$uname;
$_SESSION['userid']=$userid;

//header("location:forgot_passord_change.php");		
}
else
echo "<br>In Correct Entry";
	
}
else
echo "<br>You Enter Invalid Entry";
}
}
else
echo "<br>Invalid UserName That You Enter";
}


?>
<br><br>
</fieldset>

			 
<div id="content">
<div class="content_item" style="margin-top: 0px; margin-left:250px;width:700px; >
<div id="style1">


   
</div> 
</div>
</div>


<div id="footer">
</div>
<br><br>
<!--close footer-->  
  </div>
<?php
require("footerout.php");
?>
</body>
</html>


