//HTML code for User Login

<form name="frmUser" method="post" action="">
<?php if($message!="") { ?>
<div class="message"><?php echo $message; ?></div>
<?php } ?>
<table border="0" cellpadding="10" cellspacing="1" width="100%" class="tblLogin">
<tr class="tableheader">
<td align="center" colspan="2">Enter Login Details</td>
</tr>
<tr class="tablerow">
<td align="right">Username</td>
<td><input type="text" name="user_name"></td>
</tr>
<tr class="tablerow">
<td align="right">Password</td>
<td><input type="password" name="password"></td>
</tr>
<tr class="tableheader">
<td align="center" colspan="2"><input type="submit" name="submit" value="Submit"></td>
</tr>
</table>
</form>


//Creating User Login Session
<?php
if(count($_POST)>0) {
	if( $_POST["user_name"] == "admin" and $_POST["password"] == "admin") {
		$_SESSION["user_id"] = 1001;
		$_SESSION["user_name"] = $_POST["user_name"];
		$_SESSION['loggedin_time'] = time();  
	} else {
		$message = "Invalid Username or Password!";
	}
}

if(isset($_SESSION["user_id"])) {
	if(!isLoginSessionExpired()) {
		header("Location:user_dashboard.php");
	} else {
		header("Location:logout.php?session_expired=1");
	}
}




//PHP Function for Checking Login Session Timeout

function isLoginSessionExpired() {
	$login_session_duration = 10; 
	$current_time = time(); 
	if(isset($_SESSION['loggedin_time']) and isset($_SESSION["user_id"])){  
		if(((time() - $_SESSION['loggedin_time']) > $login_session_duration)){ 
			return true; 
		} 
	}
	return false;
}

//User Login Session Expiration Logout
session_start();
unset($_SESSION["user_id"]);
unset($_SESSION["user_name"]);
$url = "index.php";
if(isset($_GET["session_expired"])) {
	$url .= "?session_expired=" . $_GET["session_expired"];
}
header("Location:$url");

?>



Login Page:-

<form name="loginform" class="form-horizontal" action="includes/login.php" method="post" onsubmit="return validateloginForm()">

  <div class="form-group">
    <label for="username" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="username" placeholder="Enter the username" id="username">
    </div>
  </div>

  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password" placeholder="Password" id="password">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="signin" class="btn btn-primary">Sign in</button>
    </div>
  </div>
</form>
<?php
//How to limit the number of login attempts in a login script?
if($login_incorrect){
     if(isset($_COOKIE['login'])){
          if($_COOKIE['login'] < 3){
               $attempts = $_COOKIE['login'] + 1;
               setcookie('login', $attempts, time()+60*10); //set the cookie for 10 minutes with the number of attempts stored
          } else{
               echo 'You are banned for 10 minutes. Try again later';
          }
     } else{
          setcookie('login', 1, time()+60*10); //set the cookie for 10 minutes with the initial value of 1
     }
}

?>