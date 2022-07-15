<?php
session_start();
include("../connection.php");
require("head.php");

	?>
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
	   
	  </div>
   </div>
	
	<?php
require("candmenu.php");			
?>
  </div>
  </div>
  </div>
  </div>
<div class="container-fluid">

<div class="row">
	<div class=" col-2">


	
   <?php
	require("cansidelink.php");
	?>
	
	</div>
	<div class=" col-8">
	
             <img src="userphoto/pp.jpeg" class="" style="width:800px;" >
<p class="p-3">

	When the candidate take reexam,can perform  fee for taking reexam ,then after pay fee can send request the resean for taking re exam.after send request then approved the request by exam editor .<BR>
Then the exam editor send  notification for uploading  bank receit form and the candidate upload the bank receit  send to exam editor.the exam editor approve the reciet and allowed to take reexam.

</p>
	</div>
</div>

	<div id="site_content">	

	 
<br><br><br>
	</div>  
	</div>
	</div>		 
<div id="content">
<div class="content_item">
<div class="style1">



</div> 
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

<!--close footer-->  
    <br> <br>
</div>
<?php
require("footer.php");
?>
</body>
</html>


