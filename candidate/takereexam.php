<?php
session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Take Re_exam</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <style type="text/css">
.style1 
{
font-family: "Times New Roman", Times, serif;
font-size:20px;;
width:850px;
margin-top: 10px;
color: black;
margin-left: 50px;
text-align: justify;
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

$number=0;//role number question
	//check department
 $sql="select * from candidate where cid='$uid'";
$recordfound=mysql_query($sql,$con);
while($row=mysql_fetch_assoc($recordfound))
{
 $dept=$row["dept"];
 $univesity=$row["unversity"];
 $year=$row["year"];
 
 $_SESSION['dept']=$dept;
$_SESSION['univesity']=$univesity;
$_SESSION['year']=$year;
 
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
<br><br>
<?php
$fullname=$_SESSION['fullname'];
$uname=$_SESSION['sun'];
$role=$_SESSION['role'];
$photo=$_SESSION['sphoto'];
?>
<div style="margin: 10px;float: right;border:1px Solid #dadcdc;
					 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);margin-top: -15px;">
					<table cellspacing="0" height="70">
						
					  <tr><td colspan="2"><center><?php echo "<img src='../editor/$photo' height=150 width=150>"?></center></td></tr>
						<tr><td><b>User Name:</b></td><td><font color="#e9163c"><?php echo $uname;?></font></td></tr>
						<tr><td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Role:</b></td><td><font color="#e9163c">                                   <?php echo $role;?></font></td></tr>
						<tr><td>Time Allowed&nbsp;&nbsp;</td> <td style="font-weight: bold;font-size: 20px;"><div id="showtime" ></div></td> </tr>
						
					</table>
					</div>
<div class="style1">

<hr style="border-color: #801137;">
<?php	
// Retrive time According to Department
$sq="select * from timer where dept='$dept' and question_type='Re_Exam' and year='$year'";
$t=mysql_query($sq,$con);
while($row=mysql_fetch_array($t))
{
	$h=$row["hour"];
	$m=$row["min"];
}
?>
<script language ="javascript" >
var tim;
var hour=<?php echo $h;?>;
var min =<?php echo $m+1;?>;
var sec = 0;
var f = new Date();
function f1()
{
f2();
document.getElementById("starttime").innerHTML = "Your started  Exam at " + f.getHours() + ":" + f.getMinutes();
}
function f2() 
{
		if (parseInt(sec) > 0)
		{
		sec = parseInt(sec) - 1;
		document.getElementById("showtime").innerHTML = +hour+" :"+min+" :" + sec;
		tim = setTimeout("f2()", 1000);
		}
		else
		 {
		if (parseInt(sec) == 0)
		 {
		min = parseInt(min) - 1;
		
		if (parseInt(min) == 0) 
		{
		var m=document.getElementById('Exam');	
		 m.submit();
		clearTimeout(tim);
		
		}
		else
		 {
		sec = 60;
		document.getElementById("showtime").innerHTML = "Your Left Time  is :" + min + " Minutes ," + sec + " Seconds";
		tim = setTimeout("f2()", 1000);
		}
		}
		}
}
</script> 
<?php
//set question
$sq="select *from question WHERE dept='$dept' and status='active' and year='$year' and question_type='Re_Exam'";
$result = mysql_query($sq);
// Loop through each records
 
while($row = mysql_fetch_array($result))
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
  <table>
  <form id="Exam" action="display1.php" method="post" > 
  <hr>
<tr ><td colspan="2"><?php echo $number;?>. &nbsp;&nbsp;<?php echo $question;?></td> </tr>
<tr><td width="1"><input type="radio"  name="<?php echo $qid;?>" value="A"/></td>  <td>A)&nbsp;&nbsp;<?php echo  $option1;?> </td></tr>
<tr><td  width="1"><input type="radio"  name="<?php echo $qid;?>" value="B"/></td>  <td>B)&nbsp;&nbsp;<?php echo  $option2;?> </td></tr>
<tr><td  width="1"><input type="radio"  name="<?php echo $qid;?>" value="C"/></td>  <td>C)&nbsp;&nbsp;<?php echo  $option3;?> </td></tr>
<tr><td  width="1"><input type="radio"  name="<?php echo $qid;?>" value="D"/></td>  <td>D)&nbsp;&nbsp;<?php echo  $option4;?> </td></tr>
<?php
}
?>
<tr><td colspan="2"><input type="submit" name="Submit" value="submit answer"/></td></tr><br/>
</form>
</table>  
</div>
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
