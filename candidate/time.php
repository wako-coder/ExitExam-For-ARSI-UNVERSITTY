<?php
 //session_start();
include("../connection.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">

    <title></title>
</head>
<body onload="f1()" >

<?php
$uid=$_SESSION['$uid'];
 $sql="select * from candidate where cid='$uid'";
$recordfound=mysql_query($sql,$con);
while($row=mysql_fetch_assoc($recordfound))
{
 $dept=$row["dept"];
 $year=$row["year"];
 }
 $sq="select * from timer where dept='$dept' and question_type='Regular' and year='$year'";
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
var min =<?php echo $m;?>;
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
		document.getElementById("showtime").innerHTML = "Your Left Time  is "+hour+" :"+min+" :" + sec;
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
		location.href ="display.php";
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
 
<div id="starttime"></div><br />
<div id="showtime"></div>
        
  
</body>
</html>