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
    <div class="container"><!--close menubar-->	
  <div id="site_content"></div>  
	<div id="site_content">
<div class="sidebar_container">
</div>
	  
<div id="content">
 <fieldset class="fieldset">
 <center>
<br>
 <br>
 <table>
<form action="" method="post">
<tr><td colspan="2">Enter Year To see Exam Date:</td></tr>
<tr>
<td><input type="number" name="year" required placeholder="Enter Year" /></td>
<td><input type="submit" name="search" value="Search" /></td>
</tr>

</form>
</table>
 <br>

<?php
if(isset($_POST["search"]))
{
$y=$_POST["year"];
 $sql="select * from examdate where year='$y'";
 $year=mysql_query($sql,$con);
 $yearexist=mysql_num_rows($year);
 if($yearexist>0)
 {
 echo "<table border=1><tr> <th>Question_type</th><th>Start_date</th><th>End_Date</th><th>Start_Time</th><th>End_Time</th><th>year</th></tr>";
 while($row=mysql_fetch_assoc($year))
 {
 echo "<tr><td>".$row["question_type"]."</td><td>".$row["start_date"]."</td> <td>".$row["end_date"]."</td><td>".$row["start_time"]."</td><td>".$row["end_time"]."</td><td>".$row["year"]."</td></tr>";	
 }	
 echo "</table>";	
 }
 else
 echo "NO Exam Date Post For $y Year.";
}
?>
	
</center>
 <br>
</fieldset>
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
