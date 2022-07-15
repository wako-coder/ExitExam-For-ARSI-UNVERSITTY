<?php
include("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>select Department</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/image_slide.js"></script>
 <script type="text/javascript" src="css/javascriptdate.js"></script>
  <style type="text/css">

.style1 
{
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size: medium;
}
.fieldset
{
	width: 350px;
	text-align: left;
	margin-left: 250px;
	margin-top: 20px;
	height:400px;

	}

  </style>
  
</head>

<body>
 <div id="main">
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
require("menu.php");	

		
?>

    </div><!--close menubar-->	
  <div id="site_content"></div>  
	<div id="site_content">

	  <div class="sidebar_container">
	  </div>
 <div id="content">
 <fieldset class="fieldset">
 <table>
<form action="" method="post">
<tr>
<td>Select Department :</td>
	<td>
<select name="deptname" required >
<option value="">Select Your Option</option>
	<?php
	if($con)
	{
	$sql="select dname from department";
	$recordfound=mysql_query($sql,$con);
	if(mysql_affected_rows($con))
	{
	while($row=mysql_fetch_assoc($recordfound))
	{
	?>
<option value="<?php echo $row["dname"];?>"><?php echo $row["dname"];?></option>
	<?php
	}
	}
	else
	echo "No records found!";
	}
	else
	echo"connection failed";
	?> 
	</select>
	</td>
</tr>
<tr>
<td><input type="submit" name="back" value="Back"/></td>
<td><input type="submit" name="next" value="Next"/></td>
<td><input type="reset"  name="" value="Cancel" /></td>
</tr>

</form>
</table>
<?php
if(isset($_POST["next"]))
{
header("location:examsetterpage.php");	
}
else if(isset($_POST["back"]))
{
header("location:index.php");	
}
else
{
echo " Well come to DR.Exam Setter"	;
}

?>
 </fieldset>
 </div>       
  </div>
      </div>   
   </div>
       <div id="navigation">
<?php
require("footer.php");
?>
   
</div>
</body>
</html>
