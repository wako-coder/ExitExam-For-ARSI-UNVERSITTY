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
 	


	

                <div class="conatiner">
			<div class="row">
				<div class="col-2">
				
				<?php
								 require("editorsidelink.php");
								 ?>
				</div>
				<div class="mt-4 col-7">
<div class="style1">
<h1 <tr><td bgcolor="#110ceb"><center><font color="#00ffff" > Exam Editor Page</font></center></td></tr></h1>
                           
<img src="userphoto/ff.jpg" class="" style="width:1000px;" >
<br></br>
Exam editor can also perform diffrent tasks which are listed in the side link.therefore can do or access tasks which are granted to access to you.
</div> 
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

<!--close footer-->  
  <br> <br>  
</div> 
<?php
require("footer.php");
?>
</body>
</html>


