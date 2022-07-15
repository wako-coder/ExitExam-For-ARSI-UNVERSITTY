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
            </div>
            <!--close banner-->
        </div>
        <!--close header-->
        <div class="mdk-header-layout__content page">
            <div class="page__header  page__header-nav mb-0">
                <div class="container page__container">
                    <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0 d-none d-md-flex"
                        id="secondaryNavbar">
                        <?php 
	                   require("adminmenu.php");	
                        ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>
    </div>
    <br> <br>
    <!--close menubar-->
    <div class="container">

    </div><!--close menubar-->	
  <div id="site_content"></div>  
	<div id="site_content">
<div class="sidebar_container">
</div>
	  
<div id="content">
 <fieldset class="fieldset"><legend>View Report</legend>
<br>
 <br>
 <center><table style="margin-left: 30px;">
<form action="" method="post">
<tr>
<td>Select University:</td>
<td><select name="unanme" required >
<?php
$sql=mysql_query("select*from university",$con);
if(mysql_num_rows($sql)>0)
{
echo"<option value=''>Choose</option>"	;
while($row=mysql_fetch_array($sql))
{
?>
<option value="<?php echo $row["uname"];?>"><?php echo $row["uname"];?></option>
<?php
}	
}
?>	

</select></td></tr>
<tr><td>Enter Year :</td><td><input type="number" name="year" required /></td></tr>

<tr>
<td>Question Type:</td>
<td><select name="qtype" required>
<option value="">select type</option>
<option value="Regular">Regular</option>
<option value="Re_Exam">Re_Exam</option>
</select>
</td>
</tr>
<tr><td><input type="submit" name="search" value="Search"/></td></tr>
</form>
</table>
</center>
 <br>
  <br>
</fieldset>
<?php
if(isset($_POST["search"]))
{
$_SESSION['year']=$_POST["year"];
$_SESSION['unanme']=$_POST["unanme"];
$_SESSION['qtype']=$_POST["qtype"];
//header("location:indiv_report.php");	
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
