<html>
<head>
  <title>home page</title>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
   <script type="text/javascript" src="css/javascriptdate.js"></script>
    <script type="text/javascript" src="css/javasscript.js"></script>
  <style type="text/css">
  input[type="password"], input[type="text"]
{
width: 30px;
border-color: #25229f;
border-left-color: #ff1313;
  
}
li {
color: #2323dc;

}
li span {
  color: black; /* text color */
}
  </style>
 <script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>
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

	<h2>Login</h2>
	<?php
	require("login1.php");
	?>
<br>
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
document.write("<table border=5 bgcolor=#egfofl width=215 height=210");
document.write("bordercolor=black><font color=black>");
document.write("<tr bgcolor=#b6c2cd><td colspan=8><center><strong>" 
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
<br><br><br><br><br><br><br><br><br><br>
	</div>
	</div>
	


			 
<div id="content">
<div id="outerpagecontent">
<font size="4" color="Blue" style="bold" ><u>Introduction:</u></font>
<div style="margin: 10px;float: right;border:1px Solid #dadcdc;
					 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);margin-top: -15px;">
					<table cellspacing="0">
						
						<tr><td><center><img src="image/ca1.jpg" height=190 width=250></center></td></tr>
						<tr><td bgcolor="#110ceb"><center><font color="#e0e4e3" > Web Based Examination System</font></center></td></tr>
						
				
			
						
						
					</table>
				</div>

					
A web-based system provides access to a software system using a computer and  Network connection. Web based graduates exit examination system is one of the systems which provide web based test exam services through network connection and it is control by Centralized administrator.

<ul style="list-style-type: square;">
<div style="margin-left: 250px;">
<li><span>The system  helpful for conducting different examination question which can be conducted regularly.</span></li> 
<li><span>It can also be used for provide immediate results and save precious time of to check student s copy and prepare mark sheets, so it is very important for that graduates students to handle the web based examinations system and evaluate their results online.</span></li>
<li><span> It also facilitate the effort of student to revise the core of learning outcome of the course covered also make ensure the student to be competent and monitor the level of achievement in learning outcomes of course.</span></li>
<li><span>The system  also solve the problem which are occur during exam time taken through manual system.</span></li> 
<li><span>The system solve the problems which occur manually such as un-readability of candidate answer or question, manual correction error, view results to candidate after finish exam immediately and other problems which are occur in manual system</span></li>
</div>
</ul>

</div>
</div>
</div>
<div class="container-fluid">

    <?php
require("footer.php");
?>
</div>
<br><br>
<!--close footer-->  
  </div>
</body>
</html>


