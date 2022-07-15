<?php
 ob_start();
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
require("deptmenu.php");			
?>
          </div>
                    </div>
                </div>

            </div>
	  
<div class="container">
 <fieldset class="fieldset">
<br>
 <br>
 <table style="margin-left: 30px;">
<form action="" method="post" name="myForm" onsubmit="return validateForm()">
<tr>
<td><label for="num"> Enter year to see Report: </label><br>
<input type="number" class="form-control" required onKeyPress="return isNumberKey(event)" name="year" /></td>
</tr>

<tr>
<td><input type="submit" class="m-3 btn btn-info" name="next" value="Next"/></td>
</tr>

</form>
</table>
 <br>
  <br>
</fieldset>
<?php
if(isset($_POST["next"]))
{
$_SESSION['year']=$_POST["year"];
header("location:viewreport.php");	
}
?>

 <?php
}
else
{
header("location:../index.php");
}
?>
 <br><br><br><br> <br><br><br><br> <br><br><br><br>
 <br><br>
</div>
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
