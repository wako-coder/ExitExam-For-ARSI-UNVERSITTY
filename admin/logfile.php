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
        <!--close header-->
        <div class="mdk-header-layout__content page">
            <div class="page__header  page__header-nav mb-0">
                <div class="container page__container">
                    <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0 d-none d-md-flex"
                        id="secondaryNavbar">
                        <?php 
	                   require("adminmenu.php");	
                        ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>
    </div>
    <br> <br>
    <!--close menubar-->
    <div class="container">
	</div><!--close menubar-->	

	<div id="site_content" >
	<div id="content">
	<br><br><br>
	<fieldset class="fieldset"><legend>All User Activity </legend>
	<br>
	<div style="margin-left: 20px;">
	<div id="content" style="margin-top: 20px;">
	<div style="height:900px ;width:900px;
	border:solid 4px #dldbeg;
	overflow-y:scroll;
	overflow-x:scroll;">
	<?php
		if($con)
		{
			$sql="select * from logtable ORDER BY  date DESC";
			$log=mysql_query($sql,$con);
			$logexist=mysql_num_rows($log);
			if($logexist>0)
			{
			$no=1;
			?>
	<table border="1">
			<tr>
			<th>&nbsp;&nbsp;&nbsp;</th>	
			<th>User_ID</th>
			<th>User Name</th>
			<th>Role</th>
			<th>Login_Time</th>
			<th>Logout_Time</th>
			<th>Start Time</th>
			<th>Activity Type</th>
			<th>Activity Performed</th>
			<th>IP Address</th>
			<th>Work Done Date</th>
			</tr>
			<?php
			while($row=mysql_fetch_assoc($log))
			{
			echo "<tr> <td> $no</td><td>". $row["user_id"]."</td><td>".$row["username"]."</td><td>".$row["role"].
			"</td><td>".$row["login_time"]."</td><td>".$row["logout_time"]."</td><td>".$row["start_time"]."</td>
			<td>".$row["activity_type"]."</td><td>".$row["activity_performed"]."</td><td>".$row["ip_address"]."
			</td><td>".$row["date"]."</td></tr>";
			$no++;	
			}


			?>	
	</table>

			<?php	
			}
			else
			echo"No User Activity Is Registered";

		}
		else
		echo"connection failed";
			?>
	
	</div>
	</div>
	</fieldset>
	<br><br><br><br><br><br><br><br><br><br><br><br>

	</div>
	<?php
	}
	else
	{
	header("location:../index.php");
	}
	?>    
	</div>
	<div id="footer">
	</div> 
	<br> <br> 
	</div>
	<?php
	require("footer.php");
	?>
	</body>
	</html>
