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
//$year=$_SESSION['year'];
$uid=$_SESSION['$uid'];
$username=$_SESSION['sun'];
$role=$_SESSION['role'];
$login_time=$_SESSION['login_time'];
$logout_time="empty";
	
$sql="select * from registrar where rid='$uid'";
$record=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
while($row=mysql_fetch_assoc($record))
{	
$unverid=$row["uid"];
$sql2=mysql_query("select*from university where uid='$unverid'");
     while($unrow=mysql_fetch_array($sql2))
      $university=$unrow["uname"];
	}

	}
	else
	echo "No records found!";
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

	 
<div class="container mt-4">
 <fieldset class="fieldset"><legend>upload from excel</legend>
 <br><br>
 
 
 <form action="" method="post" enctype="multipart/form-data">
 <center>
 <table border="1">
 <tr>
 <td class="m-5"><input type="file" name="file" class="form-control" required title="upload csv file"/>	
 </td>	
</tr><br><br><br>
<tr>
<td><input type="submit" class="btn btn-info m-3" name="registerfromexcel" value="Insert into Database"/>
<input type="reset" class="btn  btn-warning" value="cancel"/></td>
</tr>

 </table>
  </center>
 </form>
<?php


if(isset($_POST["registerfromexcel"]))
{

if($_FILES['file']['name'])
	{
		
include("../connection.php");
$uid=$_SESSION['$uid'];
$rolecan="Candidate";
		$filename=explode(".",$_FILES['file']['name']);
		if($filename[1]=='csv')
		{
			$handle=fopen($_FILES['file']['tmp_name'],"r");
			while($data=fgetcsv($handle))
			{
					$cid=mysql_real_escape_string($data[0]);
					$fname=mysql_real_escape_string($data[1]);
					$mname=mysql_real_escape_string($data[2]);
					$lname=mysql_real_escape_string($data[3]);
					$sex=mysql_real_escape_string($data[4]);
					$dept=mysql_real_escape_string($data[5]);
					$colleage=mysql_real_escape_string($data[6]);
					$university=mysql_real_escape_string($data[7]);
					$year=mysql_real_escape_string($data[8]);
					
$sql1="insert into user  values('$cid','$fname','$mname','$lname','$sex',' ',' ',' ','$rolecan')";
$result1=mysql_query($sql1)or die(mysql_error());
$sql="insert into candidate  values('$cid','$dept','$colleage','$university','$uid','$year')";
$result=mysql_query($sql)or die(mysql_error());
				
			}
			if($result && $result1)
          	print "Successfully Registerd";
          	else
          	print"Not Registerd".mysql_error($con);
		}
		else
		print "<font color=#9355aa>file is not csv type</font>";
	}	
}

?>
 
 
<br><br>
<br>
 </fieldset>

 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
 </div>
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
