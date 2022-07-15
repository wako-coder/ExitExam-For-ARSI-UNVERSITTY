<?php
session_start();
include("../connection.php");
require("head.php");
?>

   <div id="main">
     <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{

	$uid=$_SESSION['$uid'];
	//dept and year
	$sql="select * from Examsetter where sid='$uid'";
	$record=mysql_query($sql,$con);
	if(mysql_affected_rows($con))
	{
	while($row=mysql_fetch_assoc($record))
	{
	$year=$row["year"];
    $dept=$row["dname"];
    $sid=$row["sid"];
    
	}

	}
	else
	echo "No Result found!";

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
     <div class="container p-5">
<table>
<form action="" method="post">
<tr>
<td><select name="program" required>
<option value="">Choose Question Type</option>
<option value="Regular">Regular</option>
<option value="Re_Exam">Re_Exam</option>	
</select>
</td>
<td><input type="submit" name="search" value="Search"/></td>
</tr>
</form>
</table>
<?php
if(isset($_POST["search"]))
{
$qtype=$_POST["program"];


 ?>


<font size="4" color="Blue" style="font-style:italic;">

Well Come TO Exit Exam Question Display<br>
Department:<?php echo $dept;?><br>
Year:<?php echo $year." E.C";?><br>
Question Type:<?php echo $qtype;?>
</font>
<br>

<hr color="#0d0000" style="margin-left: -50px;width: 1050px;">
<br>
<p align="justify">
<!--</fieldset>-->
<?php
//view question
if($con)
{	
$i=0;
$sql="select * from question where dept='$dept' and year='$year' and question_type='$qtype'";
$recordfound=mysql_query($sql,$con);
$number=mysql_num_rows($recordfound);
if(mysql_affected_rows($con))
{
while($row=mysql_fetch_assoc($recordfound))
{
$i++;
$qid=$row["qid"];	
$answer=$row["answer"];
echo "$i.".$row["question"]."<br>";	
echo "A.".$row["optiona"]."<br>";
echo "B.".$row["optionb"]."<br>";	
echo "C.".$row["optionc"]."<br>";	
echo "D.".$row["optiond"]."<br>";
echo"<br>Question ID:$qid and answer is $answer ";	
echo"<br><hr color='#0d0000'><br>";
}
}
     else
     echo "No records found!";
  }
  else
  echo"Connection Failed!!!".mysql_error($con);
  }
?>
</p>
</div>
<br> <br> <br> 
<br> <br> <br> 
<br><br> <br> 
<br> <br> <br> 
<br>

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
<div class="float-bottom">

	<?php
require("footer.php");
?>
</div>
</body>
</html>
