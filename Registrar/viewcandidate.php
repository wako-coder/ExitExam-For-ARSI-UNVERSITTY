<?php
session_start();
include("../connection.php");
require("head.php");
?>


<body>
 <div id="main">
  <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
		$year=$_SESSION['year'];
		$uid=$_SESSION['$uid'];
if($con)
 {
$sql="select * from registrar where rid='$uid'";
$recordfound=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
while($row=mysql_fetch_assoc($recordfound))
{
$unverid=$row["uid"];
$sql2=mysql_query("select*from university where uid='$unverid'");
while($unrow=mysql_fetch_array($sql2))
$university=$unrow["uname"];
}

}
else
echo "No records found!";
}
else
echo"connection failed";
?>
  <div id="header">
	   <div id="banner">
	    
	    <!--<div id="welcome_slogan"> -->
		 
		<?php
require("dmu.php");	   
?>
                <!--</div> <!--close welcome_slogan-->
            </div>
            <!--close banner-->
        </div>
        <div class="mdk-header-layout__content page">
            <div class="page__header  page__header-nav mb-0">
                <div class="container page__container">
                    <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0 d-none d-md-flex"
                        id="secondaryNavbar">
                        <?php
require("registrar_menu.php");		

		
?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div><!--close menubar-->	
  <div id="site_content"></div>  
	<div id="site_content">

	  <div class="sidebar_container">
	  </div>
 <div id="content" style="margin-left:30px;margin-top: 20px;">
 <fieldset class="fieldset">
 <br> <br>
 <fieldset style="border-radius: 0px;width: 200px; margin-top: 5px;margin-left: 250px;"><legend>Enter Year to view Candidate Information</legend>
 <br> 
 <table >
<form action="" method="post">
<tr>
<td><input type="text" name="key" placeholder="Enter year you need" required/></td>
<td><input type="submit" class="btn btn-info" name="serarch" value="search"/></td>
</tr>
</form>
</table>
<br> 
<br> 	
 </fieldset>
 <br> <br>


<br>
<?php
if(isset($_POST["serarch"]))
{
$key=$_POST["key"];	
?>
<h2 style="margin-left: 15px;">Gradute student profile in <?php echo $key;?> year  for <?php echo $university;?> who take exam</h2>
<hr style="margin-left:-1px;">
<br>
<?php
if($con)
 {
 ?>
  <div style="height:500px;width:940px;
border:solid 4px #dldbeg;
overflow-y:scroll;
overflow-x:scroll;">
<div style="margin-left: 20px;">
 
 <?php
 $sql="select * from candidate where year='$key' and unversity='$university'";
$recordfound=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
	echo "<table border='1'>";
	echo"<tr> <th>Candidate_ID</th><th>Frist Name</th><th>Father Name</th><th>Grandfather Name</th> <th>Sex </th>
	<th>Mobile</th><th>Email</th><th>Photo</th><th>Department</th><th>College</th><th>University</th><th>year</th>
	</tr>";
	while($row=mysql_fetch_assoc($recordfound))
	{
		$candidateid=$row["cid"];
$sql=mysql_query("select*from user where uid='$candidateid'");
while($rw1=mysql_fetch_assoc($sql))		
echo "<tr> <td>". $row["cid"]."</td><td>".$rw1["ufname"]."</td> <td>".$rw1["umname"]."</td> <td>".$rw1["ulname"]."</td> <td>".$rw1["sex"]."</td> <td>".$rw1["mobile"]."</td> <td>".$rw1["email"]."</td><td><img src=".$rw1["photo"]." width=40 height=30/></td> <td>".$row["dept"]."</td>  <td>".$row["colleage"]."</td> <td>".$row["unversity"]."</td><td>".$row["year"]."</td></tr>";
}
	echo "</table></div>";
}
     else
     echo "No records found!";
   }
   else
   echo"connection failed";
}
?>
<br>
 <br><br><br><br><br><br><br><br><br><br><br><br>  
  <br><br><br><br><br><br><br><br> 
  
 </div> 
 </fieldset>  
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
		   </div>
		   <br><br>
		</div>
<?php
require("footer.php");
?>
   
</body>
</html>
