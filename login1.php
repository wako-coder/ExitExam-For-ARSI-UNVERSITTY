<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="css/javasscript.js"></script>
<style type="text/css">

input[type="text"],input[type="password"]
 {
width: 180px;
height: 30px; 
}
</style>
<script language ="javascript" >
var tim;
var min =1;
var sec =10;
function f1()
{
f2();
}
function f2() 
{
		if (parseInt(sec) > 0)
		{
		sec = parseInt(sec) - 1;
		document.getElementById("showtime").innerHTML = min+" :" + sec;
		tim = setTimeout("f2()", 1000);
		}
		else
		 {
		if (parseInt(sec) == 0)
		 {
		min = parseInt(min) - 1;
		
		if (parseInt(min) == 0) 
		{
		clearTimeout(tim);
		location.href ="index.php";
		
		}
		else
		 {
		sec = 60;
		document.getElementById("showtime").innerHTML = min+" :" + sec;
		tim = setTimeout("f2()", 1000);
		}
		}
		}
}
</script> 
</head>
<body onload="f1()">
  	<div class="login">
  
		<form action=" " method="post" name="myForm" onsubmit="return validateuser()">
	
		<h1><br>&nbsp;&nbsp;&nbsp;Enter UserName</h1><input type="text" name ="un"  readonly >
		<h1>&nbsp;&nbsp;&nbsp;Enter Password</h1> <input type="password" name ="pass"  readonly >
		<input type="Submit" name="login" value ="login" disabled >
		<input type="reset" name="reset" value ="Reset" readonly >
		<?php
include("connection.php");
$sql1=mysql_query("select * from attempt");
$c=mysql_num_rows($sql1);
if($c>0)
$sql=mysql_query("delete from attempt");	
?>
		</form>
	Wait 10 Seconds
<div id="showtime"></div>
</div>


</body>
</html>