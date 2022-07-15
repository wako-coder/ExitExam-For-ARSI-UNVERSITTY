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
    </div><!--close menubar-->	
  <div id="site_content"></div>  
	<div id="site_content">
<div class="sidebar_container">
</div>
	  
<div id="content">
 <fieldset class="fieldset">
<br>
 <br>
 <table style="margin-left: 30px;" class="border-solid">
<form action="" method="post">
<tr>
<td>Enter Year To Take Certificate:<br>
<input type="number" name="year" required onKeyPress="return isNumberKey(event)"/></td>
</tr>

<tr>
<td><input type="submit" class="btn btn-info mt-3" name="next" value="Next"/></td>
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
header("location:certificate.php");	
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
