<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Exam setter account page</title>
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
	width: 500px;
	text-align: left;
	margin-left: 250px;
	margin-top: 20px;
	height: auto;
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
require("adminmenu.php");	

		
?>

    </div><!--close menubar-->	
  <div id="site_content"></div>  
	<div id="site_content">
	  <div class="sidebar_container">
	 
		   <div id="content">
 <fieldset class="fieldset">
<table>
<form action="" method="post">
<tr>
<td>ID:</td><td><input type="text" name="cid" pattern="" required/></td>
</tr>
<tr>
<td>Frist Name:</td><td><input type="text" name="fn" pattern="" required/></td>
</tr>
<tr>
<td>Father Name:</td><td><input type="text" name="mn" pattern="" required/></td>
</tr>
<tr>
<td>Grand father Name:</td><td><input type="text" name="gfn" pattern="" required/></td>
</tr>
<tr>
<td>Age:</td><td><input type="number" name="age" min="0" required/></td>
</tr>
<tr>
<td>Sex:</td>
<td>
<select name="sex" required readonly>
<option value="m">Male</option>
<option value="f">Female</option>
</select>
</td>
</tr>

<tr>
<td>Mobile Phone:</td><td><input type="text" name="mp" pattern="" required/></td>
</tr>

<tr>
<td>Email:</td><td><input type="email" name="email" pattern="" required/></td>
</tr>
<tr>
<td>Photo:</td><td><input type="file" name="can_photo" pattern="" required/></td>
</tr>
<tr>
<td>User Name:</td><td><input type="text" name="un" pattern="" required/></td>
</tr>

<tr>
<td>Password:</td><td><input type="password" name="pw" pattern="" required/></td>
</tr>
<tr>
<td>Role:</td>
<td>
<select name="role" required readonly >
<option value="Admin" >Administrator</option>
<option value="Candidate" >Candidate</option>
<option value="Exam setter">Exam Setter</option>
<option value="Exam Editor">Exam Editor</option>
<option value="Registrar">Registrar</option>
<option value="Department Head">Department Head</option>
</select>
</td>
</tr>
<tr>
<td>Status:</td>
<td>
<select name="status" required readonly>
  <option value="Active">Active</option>
  <option value="Inactive">Inactive</option>

</select>
</td>
</tr>

<tr>
<td><input type="submit" name="createacc" value="Register"></td>
<td><input type="reset"  value="Cancel"></td>
</tr>

</form>
</table>
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
