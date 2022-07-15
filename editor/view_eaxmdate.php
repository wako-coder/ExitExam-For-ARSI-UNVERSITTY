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
<div class="content_item" style="margin-top:10px; margin-left:250px;">
<fieldset class="fieldset">
<table style="margin-left: 20px;">
<form action="" method="post">
<tr>
<td><input type="text" name="searchkey" placeholder="search by using Year"/> </td>
<td><input type="submit" name="search" value="search" /></td>
</tr>
</form>	
</table>

<hr style="border-color: #801137;width: 700px;">
<br>
<?php
if(isset($_POST["search"]))
{
$searchvalue=$_POST["searchkey"];	
$sql="select * from examdate where year='$searchvalue'";
$recordfound=mysql_query($sql,$con);
if(mysql_num_rows($recordfound)>0)
{	
echo "<table border='1' style='margin-left: 20px;'>";
echo"<tr> <th>Date_ID</th><th>Question_type</th><th>Start_date</th><th>End_Date</th><th>Start_Time</th><th>End_Time</th><th>year</th></tr>";
while($row=mysql_fetch_assoc($recordfound))
{
	
echo "<tr><td>".$row["date_id"]."</td><td>".$row["question_type"]."</td><td>".$row["start_date"]."</td> <td>".$row["end_date"]."</td><td>".$row["start_time"]."</td><td>".$row["end_time"]."</td><td>".$row["year"]."</td></tr>";
}
	echo "</table>";	
}
else
    echo "No records found!";

 }
?>

<br><br><br>
</fieldset>
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


