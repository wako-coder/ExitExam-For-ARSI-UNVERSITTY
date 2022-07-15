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
  
  <div id="header">
	   <div id="banner">
	    
	    <!--<div id="welcome_slogan"> -->
		 
	   <?php
require("dmu.php");	   
?>
	   <!--</div> <!--close welcome_slogan-->
	   <div class="mdk-header-layout__content page">
                <div class="page__header  page__header-nav mb-0">
                    <div class="container page__container">
                        <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0 d-none d-md-flex"
                            id="secondaryNavbar">
							<?php
require("settermenu.php");	

		
?>
                        </div>
                    </div>
                </div>	
				</div><!--</div> <!--close welcome_slogan-->
	  </div><!--close banner-->
   </div>



	  <div class="container m-3">
	    <!--close sidebar-->

<div class="style1" id=textinput>
<fieldset class="fieldset"><legend>We can update Each Exam Time information </legend>
<br> <br>  
<div style="margin-left: 20px; background-color:#bccdf1;">
<br>
<table width="50%">
<form action="" method="post">
	<tr>
	<td><input type="text" class="form-control" name="key" placeholder="Enter  Timer_ID"/></td>
	<td><input type="submit" name="serarch" value="search"/></td>
	
	</tr>
	
<tr><td colspan="2" width="535px"><hr style="border-color: #801137;width: 600px;margin-left: -20px;"></td></tr>
<?php
 if(isset($_POST["serarch"]))
{
	$key=$_POST["key"];
	$sql="select*from timer where tid='$key'";
	$recordfound=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
while($row=mysql_fetch_assoc($recordfound))
{	

echo "<tr><td>Timer ID :</td><td><input type=text name='tid' value='".$row["tid"]."' readonly/></td></tr>";
echo "<tr><td>year :</td><td><input type=text name='year' value='".$row["year"]."' readonly/></td></tr>";
echo "<tr><td>Department :</td><td><input type=text name='dept' value='".$row["dept"]."' readonly/></td></tr>";
echo "<tr><td>Hour :</td><td><input type=text name='hr' value='".$row["hour"]."'/></td></tr>";
echo "<tr><td>Minute :</td><td><input type=text name='min' value='".$row["min"]."'/></td></tr>";
echo "<tr><td><input type=submit name='update' value='update'></td> ";
echo "<td><input type=reset value=Cancel></td></tr>";
}
}
	else
	echo "No result found!!!";	
	echo"<br><br><br> <br> ";	
}
else
{
	if(isset($_POST["update"]))
	{
$tid=$_POST["tid"];
$h=$_POST["hr"];
$m=$_POST["min"];
if($con)
{	
$sql="update timer  set hour='$h',min='$m' where tid='$tid'";
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

?>
</form>
</table>
</div>
<br><br>
 </fieldset>
<br> <br> <br> 
<br><br><br> <br> 
<br><br> <br> 

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
