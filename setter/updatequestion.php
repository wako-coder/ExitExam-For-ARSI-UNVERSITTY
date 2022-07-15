<?php
session_start();
include("../connection.php");
require("head.php");
?>


</body>
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

	  <div class="container p-3">
	 
<div class="style1" id=textinput>
<fieldset class="fieldset"><legend>We can update Each Question information </legend>
<br> <br>  
<div style="margin-left: 20px; background-color:#bccdf1;">
<br>
<table width="50%">
<form action="" method="post">
	<tr>
	<td><input type="text" name="key" placeholder="Enter  Question_ID"/></td>
	<td><input type="submit" name="serarch" value="search"/></td>
	
	</tr>
	
<tr><td colspan="2" width="535px"><hr style="border-color: #801137;"></td></tr>
<?php
 if(isset($_POST["serarch"]))
{
	$key=$_POST["key"];
	$sql="select*from question where qid='$key'";
	$recordfound=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
while($row=mysql_fetch_assoc($recordfound))
{	
$q=$row["question"];
?>
<tr><td>Question</td><td><textarea name="question1" class="form-control" cols="2" rows="1" ><?php echo $q;?></textarea></td></tr>
<?php
echo "<tr><td>Choice A :</td><td><input type=text name='ch1' value='".$row["optiona"]."'/></td></tr>";
echo "<tr><td>Choice B :</td><td><input type=text name='ch2' value='".$row["optionb"]."'/></td></tr>";
echo "<tr><td>Choice C :</td><td><input type=text name='ch3' value='".$row["optionc"]."'/></td></tr>";
echo "<tr><td>Choice D :</td><td><input type=text name='ch4' value='".$row["optiond"]."'/></td></tr>";
echo "<tr><td>Answer[Set Capital letter[A-B]]:</td><td><input type=text name='answer' value='".$row["answer"]."' pattern='[A-E]+' /></td></tr>";
echo"<tr><td>Question_ID:</td><td><input type=text name='qid' value='".$row["qid"]."' readonly /></td></tr>";
echo "<tr><td><input type=submit name='update' value='update'></td> ";
echo "<td><input type=reset value=Cancel></td></tr>";
}
}
	else
	echo "No result found!!!";		
}
else
{
	if(isset($_POST["update"]))
	{
$qus=$_POST["question1"];
$a=$_POST["ch1"];
$b=$_POST["ch2"];
$c=$_POST["ch3"];
$d=$_POST["ch4"];
$ans=$_POST["answer"];
$id=$_POST["qid"];

if($con)
{	
$sql="update question  set question='$qus',optiona='$a',optionb='$b',optionc='$c',optiond='$d',answer='$ans' where qid='$id'";
$updated=mysql_query($sql,$con);
if(mysql_affected_rows($con))
echo mysql_affected_rows($con)."  a record/s update successfully!".mysql_error($con);
else
echo "Unable to update!".mysql_error($con);
}

else
die("Connection Failed:".mysql($con));	
	}
}

?>
</form>
</table>
</div>
<br><br>
 </fieldset>


</div> 

<br>
</div>
<br><br>
<br> <br> <br> 
<br> <br> <br> 
<br> <br> <br> 
<br> <br> <br> 
<br> <br> <br> 
<br> <br> <br> 
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
  <?php
require("footer.php");
?>
</body>
</html>
