<?php
session_start();
//<script type="text/javascript">
include('connect_db.php');
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $position=$_POST['position'];
    switch($position){
    case 'Admin':
    $result=mysqli_query($con,"SELECT admin_id, username FROM admin WHERE username='$username' AND password='$password'");
    $row=mysqli_fetch_array($result);
    if($row>0){
    session_start();
    $_SESSION['admin_id']=$row[0];
    $_SESSION['username']=$row[1];
    header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin.php");
  }else{
    echo "<script>
    alert('invalid username or password');
            window.location.href='login2.php';
</script>";
}
    break;
    case 'Receptionist':
    $result=mysqli_query($con,"SELECT recep_id, first_name,last_name,staff_id,username FROM receptionist WHERE username='$username' AND password='$password'");
    $row=mysqli_fetch_array($result);
    if($row>0){
    session_start();
    $_SESSION['recep_id']=$row[0];
    $_SESSION['first_name']=$row[1];
    $_SESSION['last_name']=$row[2];
    $_SESSION['staff_id']=$row[3];
    $_SESSION['username']=$row[4];
    header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/receptionist.php");
    }else{
      echo "<script>
      alert('invalid username or password');
              window.location.href='login2.php';
 </script>";
}
    break;
    case 'Doctor':
    $result=mysqli_query($con,"SELECT doctor_id, first_name,last_name,staff_id,username FROM doctor WHERE username='$username' AND password='$password'");
    $row=mysqli_fetch_array($result);
    if($row>0){
    session_start();
    $_SESSION['doctor_id']=$row[0];
    $_SESSION['first_name']=$row[1];
    $_SESSION['last_name']=$row[2];
    $_SESSION['staff_id']=$row[3];
    $_SESSION['username']=$row[4];
    header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/doctor.php");
  }else{
    echo "<script>
    alert('invalid username or password');
            window.location.href='login2.php';
</script>";
}
    break;
    case 'Nurse':
    $result=mysqli_query($con,"SELECT nurse_id, first_name,last_name,username FROM nurse WHERE username='$username' AND password='$password'");
    $row=mysqli_fetch_array($result);
    if($row>0){
    session_start();
    $_SESSION['nurse_id']=$row[0];
    $_SESSION['first_name']=$row[1];
    $_SESSION['last_name']=$row[2];
    $_SESSION['username']=$row[3];
    header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/nurse.php");
  }else{
    echo "<script>
    alert('invalid username or password');
            window.location.href='login2.php';
</script>";
}
    break;
    
    case 'labratory':
      $result=mysqli_query($con,"SELECT tech_id, first_name,last_name,username FROM labratory WHERE username='$username' AND password='$password'");
      $row=mysqli_fetch_array($result);
      if($row>0){
      session_start();
      $_SESSION['tech_id']=$row[0];
      $_SESSION['first_name']=$row[1];
      $_SESSION['last_name']=$row[2];
      $_SESSION['username']=$row[3];
      header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/labratory.php");
    }else{
      echo "<script>
      alert('invalid username or password');
              window.location.href='login2.php';
  </script>";
  }
      break;
    case 'Patient':
    $result=mysqli_query($con,"SELECT f_name,l_name,username FROM patients WHERE username='$username' AND password='$password'");
    $row=mysqli_fetch_array($result);
    if($row>0){
    session_start();
    $_SESSION['f_name']=$row[0];
    $_SESSION['l_name']=$row[1];
    $_SESSION['username']=$row[2];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $reg_no="";
    $f_name="";
    $l_name="";
    $age="";
    $sex="";
    $phone="";
    $date="";
    $time="";
    $dbadmnuname="";
    $dbadmnpass="";
    
        mysqli_connect('localhost','root','');
        mysqli_select_db($con,'prs');
        $query=mysqli_query($con,"select * from patients where username='$username' AND password='$password'");
    header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/patients_page.php");
                    }else{
                      echo "<script>
                      alert('invalid username or password');
                              window.location.href='login2.php';
                  </script>";
                  }
    break;
    
    }}?>
    <!DOCTYPE html>
    <html>
    <head>
    <title>Login-Web based patient record Sys</title>
     <style>
    #content {
    height: auto;
    }
    #main{
    height: auto;}
    </style>
    <script type="text/javascript" >
    
      function validate()
    {
    
     
        //validate user account type
       if( document.loginform.position.value == "-1" )
       {
         alert( "Please select your account type!" );
         document.loginform.position.focus() ;
         return false;
       }
       
       //validate user name
      if( document.loginform.username.value == "" )
       {
         alert( "User's name is empty!" );
         document.loginform.username.focus() ;
         return false;
       }
        
       //validate user password
        if( document.loginform.password.value == "" )
       {
         alert( "Empty password. Please enter your password" );
         document.loginform.password.focus() ;
         return false;
       }
       var minlength=4;
      if (document.loginform.password.value.length < minlength) 
    {
    alert("Your password must be at least " + minlength + " characters long. Please create strong password.");
    document.loginform.password.focus();
      return false;
    
    }
    var invalid = " "; // Invalid character is a space
    
    // check for spaces
    
    if (document.loginform.password.value.indexOf(invalid) > -1  ) 
    {
    alert("Sorry, spaces are not allowed in passwords.");
    document.loginform.password.focus();
    return false;
    }
    if(username!=$username&&password!=$password)
    alert("Invalid username or password.");
    document.loginform.password.focus();
    return false;
    }
    
    
    
    </script>
    
    </head>
    <html>
<head>
<title><?php echo $user;?> - Web based Patient record System</title>

<link href="css/styleadmin.css" rel="stylesheet" type="text/css" >
<link href="css/stylehome.css" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href="decoration/css/bootstrap.min.css">
<link rel="stylesheet" href="decoration/css/bootstrap.min.css">
        <link href="css1/logstyle.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="css1/aa.css" rel="stylesheet" type="text/css" media="screen" />
        <script src="css1/aa.js" type="text/javascript"></script>
        <script src="decoration/js/jquery.min.js"></script>
        <script src="decoration/js/bootstrap.min.js"></script>
</head>
<body >
<div class="container" style="background-color:LightSteelBlue; border-radius: 10px; box-shadow: 0px 0px 25px blue;">
 
<table bgcolor="white" width="100%" height="170px" border="2">
 
        <div class="header1">

<tr class="header" height=" " width=""> <td  width="" height="">
      <img src="images/logo.png" width="290" height="200"></td> 
	   
      <td class="title" width="" height="" align="center">
	 
	  <div id="neno"><p> <font style="algerian" color="#0000FF"> ASELLA REFERRAL TEACHING HOSPITAL PATIENT RECORD MANAGMENT SYSTEM(ARTHPRMS)</font> </p><div> </td> </div>
	  </tr> </table>


<table bgcolor="LightSteelBlue" height="9%" width="100%" border="2"><tr><td width="20%" align="center" height="50px"style="font-size: 18px;" > <b> 
<?php
                        $Today = date('y:m:d');
                        $new = date('l, F d, Y', strtotime($Today));
                        echo $new;
                        ?>  </font> 
			    </td> 

<td width="100%" height="" bgcolor=""> 
	 <div id="menu">
	 <ul class="mainlink">
	                   <li id ="home" width="" >  <a href=" index.php" width=""><font color="white"><img src="img/home.png" width="25px">Home </font></a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
					   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <li id="about" width="100px">  <a href="#" width="">
							  <font color="white"><img src="img/about.png" width="25px">About us </font></a>
    

    <ul>
                            <li><a href="about.php "> About us</a></li>
                            <li><a href="mission.php">Mission </a></li>
                             <li><a href="Vision.php">vision </a></li>
</ul></li>		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;					 
					  
                              <li id="gallery" width=" 200px"> <a href="gallery.php" width=""><font color="white"><img src="img/contact.png" width="25px">Gallery </font></a>   </li> 
				    <li class="dropdown"><a href="upload.php"><img src="img/not.png" width="25px">Notice <sup><?php 
$sql="select count(notice) as notice from news where date='".date("Y-m-d")."'";
$query=mysqli_query($con,$sql);
$report=mysqli_num_rows($query);
$fetch=mysqli_fetch_array($query);
if ($report>0) {
echo "<font style='color:red;'>".$fetch['notice']."</font>";
}
else{
   echo "<font style='color:green'>0</font>";
}

?></sup></a></li>
							   </ul>
							 </div>
							 
					           
	</div>
<tr width="" height="500px"> <div class="leftnurse"><td width="600px">
<div class ="function">
<div id="nursemenu">
<ul align="center" class="nursefunc"><br>
	 
		</ul></li>
			
		</ul>	</div>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/H-left up.jpg" width="250px" height="250">
<div class="morelink">
		<div class="morelink">
		<h4 align="">More Links...</h4>
		  <a href=" http://www.facebook.com"><img src="images/facebook.png"><font color=""  align=""> </font> </a><br><br>
		 <a href=" http://www.twitter.com"  > <img src="images/twitter_icon.png"><font color="" align=""></font> </a><br><br>
	  <a href=" http://www.youtube.com" ><img src="images/youtube_icon.png"><font color="" align =""></font> </a></div>
		<br>		
		<br>
		</td>
		<div>
		<div class="nursepage">		
<td colspan="3" style="width: 300px; background-color: white;" align="center" class="text-justify"> 
<br>
<div class="loginform" style="width:380px;  height:400px; margin:0 auto; position:relative; border:2px solid rgba(0,0,0,0); -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:25px; -webkit-box-shadow:0 0 18px green; -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px blue; background-color:; color:blue;">
<form method="post" action="login2.php" name = "loginform" onSubmit="return validate()">
	  
 <div style="background-color:lightblue;border-radius:25px;font-family:Arial, Helvetica, sans-serif; color:#000000; padding:10px; height:40px; "> 
 <div style="float: left;" ><strong><font face=" lucida calligraphy" color="black" size="3px">User Login</font></strong></div>
 <div style="float:right; margin-right:35px;background-color:#cccccc; width:15px;  text-align:center; border-radius:10px; height:12px;"><a href="index.php" title="Close"><img src="img/close_icon.gif"></a>
 </div>
 </div>
<table bgcolor=" #F5F5DC" width="1">
 <fieldset id="">
     <legend><strong><font face=" lucida calligraphy" color="black" size="3px">Don't forget to select your account type</font></strong></legend>
	  <p><select name="position">
      
	<center>	<option value="-1">--Select Account Type--</option>
			<option>Admin</option>
			<option>Receptionist</option>
			<option>Doctor</option>
			<option>Nurse</option>
			<option>Patient</option>
      <option>labratory</option>
			</select></p>
		 <p><input type="text" name="username" value="" placeholder="Username"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
        <p class="submit"><input type="submit" name="submit" value="login"> 
<input type="reset" name="cancel" value="Clear"></p>
		
</center>	
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font face=" lucida calligraphy" color="black" size="3px"> <a href="forget.php">Forgot Password</a>&nbsp;&nbsp;&nbsp;&nbsp;</center>
               
		</fieldset>
      </form>

    </div>
 
	</section>

<tr  class="wellcome"> <td width="300px" class="mission"> <font color="#000000"> 


	<br><br><br><br><br> <br><br><br><br></font></td>
</table></td>
	
	</div>
	
	<tr height="50px" bgcolor="#2F4F4F"><td>    <marquee  direction="left" behavior="slide" scrolldelay="100%" >
<font color="#5F5F5F5" dir="ltr" id="font_20090607210659" face="Jokerman" size="5px" >ARTHPRMS</font></marquee>
</td> 

 <td><center> <font color="white" style="font-size: 18px;">&copy;copy right:<br> ARTH Patient Record Managment system . All right preserved! By Arsi University CS Student</center></font ></td> 
</table>
</div>
</body>
</html>
<head>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="decoration/css/bootstrap.min.css">

        <script src="decoration/js/jquery.min.js"></script>
        <script src="decoration/js/bootstrap.min.js"></script>
        <style type="text/css">
        	
body{
	font-family: Times News Roman;
}
form{
    width:370px;
    height:60px;
    margin: auto;
    padding: 20px;
    background:#E6E6FA;
    font-size: 16px;
}

ul li a{
	font-size: 20px;


}

 </style>