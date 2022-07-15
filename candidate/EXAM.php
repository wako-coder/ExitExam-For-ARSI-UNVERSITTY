<?php
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Take exam</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/image_slide.js"></script>
     <script type="text/javascript" src="../css/javascriptdate.js"></script>
  <style type="text/css">
.style1 
{
font-family: "Times New Roman", Times, serif;
font-size:25px;;
width:850px;
margin-top: 10px;
margin-left: 50px;
text-align: left;
}
#question
{
text-align: justify;
color: #0f0000;
font-size: 20px;
font-style: normal;
}
.fieldset
{
	width: 950px;
	margin-left: 30px;
	margin-top: 40px;
	height: auto;
	border-radius:0px;
	border-color: #801137;


	}
  </style>
  
</head>

<body onload="f1()">

<div id="main">
 <?php
if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
$uid=$_SESSION['$uid'];
$uname=$_SESSION['sun'];
$count=0;//check take exam before this or not
$number=0;//role number question
	//check department
 $sql="select * from candidate where cid='$uid'";
$recordfound=mysql_query($sql,$con);
while($row=mysql_fetch_assoc($recordfound))
{
 $dept=$row["dept"];
 $univesity=$row["unversity"];
 $year=$row["year"];
 }
?>
  <div id="header">
	   <div id="banner">
	    
	    <!--<div id="welcome_slogan"> -->
		 
	   <?php
require("dmu.php");	   
?>
	   <!--</div> <!--close welcome_slogan-->
	  </div><!--close banner-->
   </div><!--close header-->
	<div id="navigation">
	<?php
require("candmenu.php");	

		
?>

    </div><!--close menubar-->	
  <div id="site_content"></div>  
	<div id="site_content">
<div class="sidebar_container">
</div>
	  
<div id="content">
<fieldset class="fieldset">
<div class="style1">
<?php require("name.php");?>
<hr style="border-color: #801137;">
<?php
	
//chech exam  date


	//check start and ending exam date
//check take exam before or not
	
// Retrive time According to Department
$sq="select * from timer where dept='$dept' and question_type='Regular' and year='$year'";
$t=mysql_query($sq,$con);
while($row=mysql_fetch_array($t))
{
	$h=$row["hour"];
	$m=$row["min"];
}
$query="select *from question  WHERE dept='$dept' and status='active' and year='$year' and question_type='Regular'";
$rand=mysql_num_rows(mysql_query($query,$con));


//set question
$sq="select *from question";
    	include('ps_pagination.php');
    	//Create a PS_Pagination object
	$pager = new PS_Pagination($con, $sq, 1);
 	//The paginate() function returns a mysql result set for the current page
$rs = $pager->paginate();	
$result = mysql_query($sq,$con);
// Loop through each records
 if(mysql_num_rows($result)>0)
 {
while($row = mysql_fetch_array($rs))
{
$qid=$row["qid"];
$question=$row["question"];
$option1=$row["optiona"];
$option2=$row["optionb"];
$option3=$row["optionc"];
$option4=$row["optiond"];
$number++;
?>
<div id="radio_button">
  <table id="question" border="1">
  <form id="Exam" action="display.php" method="post" > 
  <hr>
<tr ><td colspan="4">&nbsp;&nbsp;<?php  echo $question;?></td> </tr>
<tr><td width="1"><input type="radio"  name="<?php echo $qid;?>" value="A"/></td>  <td colspan="2">A)&nbsp;&nbsp;<?php echo  $option1;?> </td></tr>
<tr><td  width="1"><input type="radio"  name="<?php echo $qid;?>" value="B"/></td>  <td colspan="2">B)&nbsp;&nbsp;<?php echo  $option2;?> </td></tr>
<tr><td  width="1"><input type="radio"  name="<?php echo $qid;?>" value="C"/></td>  <td colspan="2">C)&nbsp;&nbsp;<?php echo  $option3;?> </td></tr>
<tr><td  width="1"><input type="radio"  name="<?php echo $qid;?>" value="D"/></td>  <td colspan="2">D)&nbsp;&nbsp;<?php echo  $option4;?> </td></tr>                  
<?php
}
?>
<tr>
<td><input type="submit" name="Submit" value="submit answer"/></td>
<td><?php echo '<div style="text-align:center">'.$pager->renderFullNavprev().'</div>';?></td>
<td><?php echo '<div style="text-align:center">'.$pager->renderFullNavnext().'</div>';?></td>
</tr>
</form>
</table>  
</div>
<?php
 }
 else
 echo"The Question Is Not Post";

?>
</div>
<br><br><br>
</fieldset>
</div>
<br><br><br><br>
<br><br><br><br>
<?php
}
else
{
header("location:../index.php");
}?>     
</div>
       <div id="footer">
<?php
require("../footer.php");
?>
   
</div>
 <br> <br>
</div>
</body>
</html>
