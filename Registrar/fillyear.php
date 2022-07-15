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

<div class="container mt-5 ">

	  
<div id="content">
 <fieldset class="fieldset"><legend>Register Cnadidate</legend>

 <br>
 <table>
<form action="" method="post">
<tr>
<td>Enter year :</td>
<td><input type="number" name="year" class="form-control" min="1" required placeholder="Enter year like 2020....."/></td>
</tr>
<tr>
<td><input type="submit" class="btn btn-info" name="next" value="Next"/></td>
<td><input type="reset"  name="" value="Cancel" /></td>
</tr>

</form>
</table>
<br><br><br><br><br><br><br>
</fieldset>
<?php
if(isset($_POST["next"]))
{
$_SESSION['year']=$_POST["year"];;
header("location:register_cand.php");	
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
 <br><br><br><br>
 <br><br>
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
