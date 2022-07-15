<html>
<body>
<script type="text/javascript">
function DisplayCurrentTime() 
{
var date = new Date();
var hours = date.getHours() > 12 ? date.getHours() - 12 : date.getHours();
var am_pm = date.getHours() >= 12 ? "PM" : "AM";
        hours = hours < 10 ? "0" + hours : hours;
var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
     time = hours + ":" + minutes  + ":" + seconds + " " + am_pm;  
 var lblTime = document.getElementById("lblTime").innerHTML = time;

  
    }
</script>
<div id='lblTime'></div>
<button onclick="DisplayCurrentTime()">click</button>
<?PHP
echo date("h:i A.", time());     //04:45 PM.
?>
</body>
</html>