<?php
  ob_start();
session_start();
include("../connection.php");
require("head.php");
?>
 <div id="main">
   <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
	
	$uid=$_SESSION['$uid'];
	
$sql="select * from examsetter where sid='$uid'";
$record=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
	while($row=mysql_fetch_assoc($record))
	{
      $year=$row["year"];	
	}

	}
	else
	echo "No records found!";
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
<div id="content">
 <fieldset class="fieldset">
<br><br>
<center>
 <table>
<form action="" method="post">
<tr>
<td>Enter year which set exam:</td>
<td><input type="number" name="year" value="<?php echo $year;?>" readonly/></td>
</tr>

<tr>

<td>Question Type:</td>
<td>

<select name="qtype" required>
<option value="">select type</option>
<option value="Regular">Regular</option>
<option value="Re_Exam">Re_Exam</option>
</select>
</td>

</tr>
<tr>
<td><input type="submit" name="next" value="Next"/></td>
<td><input type="reset"  name="" value="Cancel" /></td>
</tr>

</form>
</table></center>
<br><br>
</fieldset>
<?php
if(isset($_POST["next"]))
{
$_SESSION['year']=$_POST["year"];
$_SESSION['questiontype']=$_POST["qtype"];
header("location:addquestion.php");	
}
?>

 <?php
}
else
{
header("location:../index.php");
}
?>
</div>
 <br><br><br><br><br><br>
 <br><br><br><br> <br><br>
 <br><br><br><br><br><br>
</div>
       <div id="footer">
   
</div>
 <br><br>
</div>
<?php
require("footer.php");
?>
</body>
</html>
