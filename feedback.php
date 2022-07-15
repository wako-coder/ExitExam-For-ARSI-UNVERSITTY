<head>
  <title>Feedback page</title>

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
	font-size:15px;;
	width:550px;
	text-align:left;
	margin-top: -130px;

	color: black;
	margin-left: -180px;
	line-height: 25px;
	
	
  	} 
  	.fieldset
{
	width: 535px;
	text-align: left;
	margin-left: -1.5px;
	margin-top: 20px;
	height: auto;
	border-radius:0px;
	border-color: #801137;


	}
  </style>
</head>

<body>
<div id="main">
	<?php
	/* if (!isset($_SESSION)) {
	session_start();		
	}*/
	?>
	<div id="header">
	<div id="banner">
	<?php
	require("dmu.php");	
	?>	 
	</div>
	</div>
	<div id="navigation">
	<?php
	require("menu.php");
	?>
	</div>



	<div id="site_content">	

	 
	<div class="sidebar_container">
	<div class="sidebar">
	<div class="sidebar_item">

	<h2>Link</h2>
	<img src="image\ca1.jpg" width="190px" height="210px">
	<br>
	<?php
	require("visitor.php");
	?>
<br><br><br>
	<h2>Social Media</h2> 
   <?php
	require("media.php");
	?>
<br><br><br>
	</div>  
	</div>
	</div>
	
	
	
<!-- right-->
	
	<div class="sidebar_container1">
	<div class="sidebar1">
	<div class="sidebar_item1">

	<h2>News /Urgent Notice</h2> 
	<img src="image\ca1.jpg" width="190px" height="200px">
	<br>
	<li><div align="left"><a href="notice1.php"><font color="white">View notice</font></a></div></li>
  
<br><br><br>
	<h2>Calender</h2>
<script lang="javascript">
monthnames= new Array("January","Februrary","March","April","May","June","July","August","September","October","November","Decemeber");
var linkcount=0;
function addlink(month, day, href) {
var entry = new Array(3);
entry[0] = month;
entry[1] = day;
entry[2] = href;
this[linkcount++] = entry;
}
Array.prototype.addlink = addlink;
linkdays = new Array();
monthdays = new Array(12);
monthdays[0]=31;
monthdays[1]=28;
monthdays[2]=31;
monthdays[3]=30;
monthdays[4]=31;
monthdays[5]=30;
monthdays[6]=31;
monthdays[7]=31;
monthdays[8]=30;
monthdays[9]=31;
monthdays[10]=30;
monthdays[11]=31;
todayDate=new Date();
thisday=todayDate.getDay();
thismonth=todayDate.getMonth();
thisdate=todayDate.getDate();
thisyear=todayDate.getYear();
thisyear = thisyear % 100;
thisyear = ((thisyear < 50) ? (2000 + thisyear) : (1900 + thisyear));
if (((thisyear % 4 == 0) 
&& !(thisyear % 100 == 0))
||(thisyear % 400 == 0)) monthdays[1]++;
startspaces=thisdate;
while (startspaces > 7) startspaces-=7;
startspaces = thisday - startspaces + 1;
if (startspaces < 0) startspaces+=7;
document.write("<table border=5 bgcolor=#egfofl width=200 height=190");
document.write("bordercolor=black><font color=black>");
document.write("<tr bgcolor=#859bad><td colspan=8><center><strong>" 
+ monthnames[thismonth] + " " + thisyear 
+ "</strong></center></font></td></tr>");
document.write("<tr>");
document.write("<td align=center>Su</td>");
document.write("<td align=center>Mo</td>");
document.write("<td align=center>Tu</td>");
document.write("<td align=center>We</td>");
document.write("<td align=center>Th</td>");
document.write("<td align=center>Fr</td>");
document.write("<td align=center>Sa</td>"); 
document.write("</tr>");
document.write("<tr>");
for (s=0;s<startspaces;s++) {
document.write("<td> </td>");
}
count=1;
while (count <= monthdays[thismonth]) {
for (b = startspaces;b<7;b++) {
linktrue=false;
document.write("<td>");
for (c=0;c<linkdays.length;c++) {
if (linkdays[c] != null) {
if ((linkdays[c][0]==thismonth + 1) && (linkdays[c][1]==count)) {
document.write("<a href=\"" + linkdays[c][2] + "\">");
linktrue=true;
      }
   }
}
if (count==thisdate) {
document.write("<font color='FF0000'><strong>");
}
if (count <= monthdays[thismonth]) {
document.write(count);
}
else {
document.write(" ");
}
if (count==thisdate) {
document.write("</strong></font>");
}
if (linktrue)
document.write("</a>");
document.write("</td>");
count++;
}
document.write("</tr>");
document.write("<tr>");
startspaces=0;
}
document.write("</table></p>");
</script>

	</div>  
	</div>
	</div>		
<!-- right-->

			 
<div id="content">
<div class="content_item">
<div class="style1">
<fieldset class="fieldset"><legend>Feedback us</legend>
<table>
<tr>
<td>Frist Name:</td><td><input type="text" name="fn"  required/></td>
</tr>
<tr>
<td>Father Name:</td><td ><input type="text" name="fan"  required /></td>
</tr>
<tr>
<td>Date:</td><td><input type="date" name="date"  required/></td>
</tr>
<tr>
<td>Email:</td><td><input type="email" name="email"  required/></td>
</tr>
<tr>
<td>Comment:</td><td>
<textarea  name="ncontent" pattern="" required cols="50" rows="5"/></textarea></td>
</tr>

<tr>
<td><input type="submit" name="feedback" value="Send"></td>
<td><input type="reset"  value="Cancel"></td>
</tr>
</table>
<br><br><br>
</fieldset>    
</div> 
</div>
</div>
</div>


<div id="footer">
<?php
require("footerout.php");
?>
</div>

<!--close footer-->  
<br><br>
 </div> 
</body>
</html>


