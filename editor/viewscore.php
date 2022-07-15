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
				<div class="col-7">
<div id="content">
<div class="content_item">
<div class="style1" id=textinput>
<fieldset class="fieldset"><legend>View Each Score For All Department</legend>
<BR><BR>
<div style="margin-left: 20px; background-color:#bccdf1;">
 
</div>
<?php
if($con)
 {
 $sql="select * from set_score ORDER by year ASC" or die(mysql_error());;
$recordfound=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
	
?>
<div style="height: 300px;width: auto;margin-left: 20px;
border:solid 4px #dldbeg;
overflow-y:scroll;
overflow-x:scroll;">
<center>
	<?php
	echo "<table border='1'>";
	echo"<tr> <th>score_ID</th><th>Department</th><th>Passing score</th><th>year</th></tr>";
	while($row=mysql_fetch_assoc($recordfound))
	echo "<tr> <td>". $row["score_id"]."</td><td>".$row["dept"]."</td> <td>".$row["score"]."</td><td>".$row["year"]."</td></tr>";
	echo "</table>";	
}
    else
     echo "No records found!";
 }
   else
   echo"connection failed";
?>
</center>
</div>
<br>
 </fieldset>


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



