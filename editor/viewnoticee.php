<?php
session_start();
include("../connection.php");
?>
<html>
<head>
  <title>View Candidate</title>
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
	font-weight: bold;
	font-size: medium;
}
.fieldset
{
	width: 600px;
	text-align: left;
	margin-left: 200px;
	margin-top: 20px;
	height:400px;

	}
	.td,th
	{
	width:100px;

	}
	

  </style>
  
</head>

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
	  </div><!--close banner-->
   </div><!--close header-->
	<div id="navigation">
	<?php
require("editormenu.php");	

		
?>

    </div><!--close menubar-->	
  <div id="site_content"></div>  
	<div id="site_content">

	  <div class="sidebar_container">
	  </div>
 <div id="content" style="margin-left:30px;margin-top: 20px;">
 
<table>
<tr>

<td width="700px">
<div style="height:490px;
border:solid 4px #dldbeg;
overflow-x:scroll;">

	<div clas="style1">
	<fieldset class="fieldset"><legend>Notice Bord</legend>
<?php
	$date=date('Y-m-d');
	$sql1=mysql_query("SELECT * from notice where Ex_Dates>='$date' ORDER BY dates ASC") or die(mysql_error());
	$ro=mysql_num_rows($sql1);
	if($ro!='0')
	{
	$sql=mysql_query("SELECT * from notice where Ex_Dates>='$date' ORDER BY dates ASC") or die(mysql_error());
	while($row=mysql_fetch_array($sql))
	{
	
            echo"<p align='right'><b>Date:</b>"."<u>".$row['Dates']."</u>"."</p>";
            echo"<font face='monotype corsiva' size='7' color='#347098'><center>"."<u>".$row['Title']."</u>"."</center>"."</p>";
             
           	
			echo"<font face='monotype corsiva' size='5' color='#0c395f'><center>".$row['Dates']."</center>"."</p>"."</font>";
			echo "<font  size='3' color='#00000b'>".$row['Content'];
           echo"<font size='4' color='#0000CD'><center>".$row['sender']."</center>"."</p>";
         		

	}
	}
	else
	{
		echo '<script type="text/javascript">alert("There No Post Notice!!!");</script>';
		
	}
?>
</fieldset>

</div>
</div>
</td>		
</tr>
	
</table>

 <br><br><br><br><br><br>
 <br><br><br><br><br><br>
 <br><br><br><br><br><br> 
  <br><br><br>
 
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
<?php
require("../footer.php");
?>
   
</div>
<br><br>
</div>
</body>
</html>
