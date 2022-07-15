<?php
  ob_start();
session_start();
include("../connection.php");
require("head.php");
?>

<script>
function validateform() {
    var question = document.forms["myForm"]["txtquest"].value;
    if (question == "") {
        alert("The Question Is Empty");
        document.myForm.txtquest.focus();
        return false;
    }
    var a = document.forms["myForm"]["txta"].value;
    if (a == "") {
        alert("The Exam Question Choice A Is Empty");
        document.myForm.txta.focus();
        return false;
    }
    var b = document.forms["myForm"]["txtb"].value;
    if (b == "") {
        alert("The Exam Question Choice B Is Empty");
        document.myForm.txtb.focus();
        return false;
    }
    var d = document.forms["myForm"]["txtc"].value;
    if (d == "") {
        alert("The Exam Question Choice C Is Empty");
        document.myForm.txtc.focus();
        return false;
    }
    var d = document.forms["myForm"]["txtd"].value;
    if (d == "") {
        alert("The Exam Question Choice D Is Empty");
        document.myForm.txtd.focus();
        return false;
    }

    var answ = document.forms["myForm"]["txtansw"].value;
    if (answ == "") {
        alert("The Exam Question Selection Answer Is Empty");
        document.myForm.txtansw.focus();
        return false;
    }

}
</script>

<body>
    <div id="main">
        <?php

if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
{
$uid=$_SESSION['$uid'];
$year=$_SESSION['year'];
$qtype=$_SESSION['questiontype'];
$sql="select * from Examsetter where sid='$uid'";
$record=mysql_query($sql,$con);
if(mysql_affected_rows($con))
{
	while($row=mysql_fetch_assoc($record))
	{
//$dept=$row["dept"];
$id=$row["sid"];
$dept=$row["dname"];
//$unverid=$row["uid"];
    	
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

                <div class="mdk-header-layout__content page">
                    <div class="page__header  page__header-nav mb-0">
                        <div class="container page__container">
                            <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0 d-none d-md-flex"
                                id="secondaryNavbar">
                                <?php
require("settermenu.php");	

		
?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--close banner-->
        </div>
        <div class="container"  style="background-color:orange;">
            <div class="card card-form">
                <div class="row ">
                    <div  style="background-color:orange;" class="card-body">
                        <p><strong class="headings-color">Any Exam Setter Can Set Question In Below Form!</strong></p>
                    </div>
                </div>
                <div  style="background-color:lightgray;"class=" card-form__body card-body">
                    <form action="" method="post" name="myForm">
                       
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">

                                    <label for="validationSample01">Exam Setter_ID</label>
                                    <input type="text" class="form-control" name="sid" value="<?php echo($id);?>"
                                        readonly />
                                </div>

                                <div class="col-12 col-md-6 mb-3">


                                    <label for="validationSample02">Year</label>
                                    <input type="text" class="form-control" name="years" readonly
                                        value="<?php echo $year;?>" />
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="col-12 col-md-6 mb-3">
                                    <label for="Department">Department</label>
                                    <input type="text" class="form-control" name="departmentname" readonly
                                        value="<?php echo $dept;?>" />
                                </div>

                                <div class="col-12 col-md-6 mb-3">

                                    <label for="qtype">Question Type</label>
                                    <input type="text" name="qtype" readonly class="form-control"
                                        value="<?php echo $qtype;?>" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">

                                    <label for="question">Question</label><br>
                                    <textarea name="txtquest" rows="10" class="form-control"
                                        placeholder="FillQuestion Detail..."></textarea>
                                </div>

                                <div class="col-12 col-md-6 mb-3">

                                    <label>Select Answer</label><br>
                                    <select name="txtansw">
                                        <option value="">choose correct answer</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
</div>

                                </div>
                                <div class="form-row">

                                    <div class="col-12 col-md-6 mb-3">

                                        <label>Choice A</label>
                                        <input type="text" name="txta" placeholder="Fill Choice 1...."
                                            class="form-control" />
                                    </div>


                                    <div class="col-12 col-md-6 mb-3" bgcolor="#ffffff">

                                        <label>Choice B</label>
                                        <input type="text" name="txtb" class="form-control"
                                            placeholder="Fill Choice 2...." />

                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="col-12 col-md-6 mb-3">

                                        <label>Choice C</label><input type="text" name="txtc" class="form-control"
                                            placeholder="Fill Choice 3...." />
                                    </div>

                                    <div class="col-12 col-md-6 mb-3">

                                        <label>Choice D</label><input type="text" name="txtd" class="form-control"
                                            placeholder="Fill Choice 4...." />


                                    </div>
</div>

                                    <input type="submit" name="savequestion" value="save" class="btn btn-success m-3"
                                        onclick="return validateform()">

                                    <input class="btn btn-primary m-3" type="reset" value="Cancel">
                    </form>
                    <hr>

                </div>
            </div>
        </div>
    </div>
    <div style="margin-left: 20px;">
        <?php
if(isset($_POST['savequestion']))
{
$dname=$_POST["departmentname"];
$txtquest=$_POST["txtquest"];
$txta=$_POST["txta"];
$txtb=$_POST["txtb"];
$txtc=$_POST["txtc"];
$txtd=$_POST["txtd"];
$txtansw=$_POST["txtansw"];
$qstatus="active";
$sid=$_POST["sid"];
$qtype1=$_POST["qtype"];
if($con)
{

  $sql="insert into question values(' ','$year','$dname','$txtquest','$txta','$txtb','$txtc','$txtd','$txtansw','$qtype','$qstatus','$sid')";
   $insert=mysql_query($sql,$con);
   if($insert)
    echo"Exam Question Is Saved Sucessfully";
	else
	echo" NO Exam Question Saved Sucessfully".mysql_error($con);			
}
else
echo"Connection Failed:".mysql_error($con);
}
?>
    </div>
    <br><br><br><br>
    </fieldset>
    <br><br>
    </div>
	<div  style="background-color:orange;" class="container">
    <div style="background-color:lightgray;"class="card card-form">
        <div  style="background-color:orange;"class="row no-gutters">
            <div  class=" text-center card-body">
                <p><strong class="headings-color"> Matching!</strong></p>
</div>
</div>
<div class="container text-center" style="background-color:lightgray;">
				<div style="background-color:lightgray;" class=" card-form__body card-body ">
                <form action="" method="post" name="myForm">



				<div style="background-color:lightgray;" class="form-row">
					
				<div class="col-12 col-md-6 mb-3">

                        
                            <label for="Sid">Exam Setter_ID</label><input type="text" name="sid" class="form-control"
                                    value="<?php echo($id);?>" readonly />
									</div>
									<div class="col-12 col-md-6 mb-3">

                             <label for="year">Year</label><input type="text" name="years" readonly
							 class="form-control"   value="<?php echo $year;?>" />
									</div> </div>
									<div class="form-row">
                        
									<div class="col-12 col-md-6 mb-3">

                            <label for="Department">Department</label><input type="text" name="departmentname"
							class="form-control"    readonly value="<?php echo $dept;?>" />
									</div>
									<div class="col-12 col-md-6 mb-3">

                            <label for="qtype">Question Type</label><input type="text" name="qtype" readonly
							class="form-control"    value="<?php echo $qtype;?>" />
									</div> </div>
									<div class="form-row">
									<div class="col-12 col-md-6 mb-3">

                        
                            <label for="question">Question 1</label><br>
                                <textarea name="txtquest1" rows="10"class="form-control" placeholder="FillQuestion Detail..."></textarea>
								</div>
                                <div class="col-12 col-md-6 mb-3">

                            <label>Select Answer</label><br>
                                <select name="txtansw1" class="form-control">
                                    <option value="">choose correct answer</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                </select> </div> </div>
                            
								<div class="form-row">
                                <div class="col-12 col-md-6 mb-3">

                        
                            <label for="question">Question 2</label><br>
                                <textarea name="txtquest2" rows="10" class="form-control"placeholder="FillQuestion Detail..."></textarea>
								</div>
                                <div class="col-12 col-md-6 mb-3">

                            <label>Select Answer</label><br>
                                <select name="txtansw2"class="form-control">
                                    <option value="">choose correct answer</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                </select>
								</div> </div>
                        
								<div class="form-row">
                                <div class="col-12 col-md-6 mb-3">

                            <label for="question">Question 3</label><br>
                                <textarea name="txtquest3" rows="10" class="form-control"placeholder="FillQuestion Detail..."></textarea>
								</div>
                                <div class="col-12 col-md-6 mb-3">

                            <label>Select Answer</label><br>
                                <select name="txtansw3"class="form-control">
                                    <option value="">choose correct answer</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                </select>
								</div> </div>
								<div class="form-row">
                                <div class="col-12 col-md-6 mb-3">

                        
                            <label for="question">Question 4</label><br>
                                <textarea name="txtquest4" class="form-control"rows="10" placeholder="FillQuestion Detail..."></textarea>
								</div>
                                <div class="col-12 col-md-6 mb-3">

                            <label>Select Answer</label><br>
                                <select name="txtansw4"class="form-control">
                                    <option value="">choose correct answer</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                </select> </div> </div>
								<div class="form-row">
                        
                                <div class="col-12 col-md-6 mb-3">

                        
                            <label for="question">Question 5</label><br>
                                <textarea name="txtquest5" class="form-control"rows="10" placeholder="FillQuestion Detail..."></textarea>
								</div>
                                <div class="col-12 col-md-6 mb-3">

                            <label>Select Answer</label><br>
                                <select name="txtansw5"class="form-control">
                                    <option value="">choose correct answer</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                </select> </div> </div>
								<div class="form-row">
                                <div class="col-12 col-md-6 mb-3">

                        
                        
                            <label>Choice A</label><input type="text" name="txta" placeholder="Fill Choice 1...." class="form-control"/>
                            </div>
							<div class="col-12 col-md-6 mb-3">

                            <label>Choice B</label><input type="text" name="txtb" placeholder="Fill Choice 2...." class="form-control"/>
							</div> </div>
							<div class="form-row">
							<div class="col-12 col-md-6 mb-3">

                        
                            <label>Choice C</label><input type="text" name="txtc" placeholder="Fill Choice 3...."class="form-control" />
							</div>
							<div class="col-12 col-md-6 mb-3">

                            <label>Choice D</label><input type="text" name="txtd" placeholder="Fill Choice 4...." class="form-control"/>
							</div> </div>
							<div class="form-row">
							<div class="col-12 col-md-6 mb-3">

                        
                            <label>Choice E</label><input type="text" name="txte" placeholder="Fill Choice 5...."class="form-control" />
							</div>
							<div class="col-12 col-md-6 mb-3">

                            <label>Choice F</label><input type="text" name="txtf" placeholder="Fill Choice 6...." class="form-control"/>
							</div> </div>
							<div class="form-row">
                        
							<div class="col-12 col-md-6 mb-3">

                            <label>Choice G</label><input type="text" name="txtg" placeholder="Fill Choice 7...." class="form-control"/>
							</div>
							<div class="col-12 col-md-6 mb-3" background:red >

                            <label>Choice H</label><input type="text" name="txth" placeholder="Fill Choice 8...." class="form-control"/>
                            
							</div> </div>
                        
                            <input type="submit" name="savematching" value="save" onclick="return validateform()" class="btn btn-success">
                            
                            <input type="reset" value="Cancel" class="btn btn-primary">
                        

                    



                </form>

            </div>
            <div style="margin-left: 20px;">
                <?php
if(isset($_POST['savequestion']))
{
$dname=$_POST["departmentname"];
$txtquest=$_POST["txtquest"];
$txta=$_POST["txta"];
$txtb=$_POST["txtb"];
$txtc=$_POST["txtc"];
$txtd=$_POST["txtd"];
$txtansw=$_POST["txtansw"];
$qstatus="active";
$sid=$_POST["sid"];
$qtype1=$_POST["qtype"];
if($con)
{

  $sql="insert into question values(' ','$year','$dname','$txtquest','$txta','$txtb','$txtc','$txtd','$txtansw','$qtype','$qstatus','$sid')";
   $insert=mysql_query($sql,$con);
   if($insert)
    echo"Exam Question Is Saved Sucessfully";
	else
	echo" NO Exam Question Saved Sucessfully".mysql_error($con);			
}
else
echo"Connection Failed:".mysql_error($con);
}


if(isset($_POST['savematching']))
{
$dname=$_POST["departmentname"];
$txtquest1=$_POST["txtquest1"];
$txtquest2=$_POST["txtquest2"];
$txtquest3=$_POST["txtquest3"];
$txtquest4=$_POST["txtquest4"];
$txtquest5=$_POST["txtquest5"];
$txta=$_POST["txta"];
$txtb=$_POST["txtb"];
$txtc=$_POST["txtc"];
$txtd=$_POST["txtd"];
$txte=$_POST["txte"];
$txtf=$_POST["txtf"];
$txtg=$_POST["txtg"];
$txth=$_POST["txth"];
$txtansw1=$_POST["txtansw1"];
$txtansw2=$_POST["txtansw2"];
$txtansw3=$_POST["txtansw3"];
$txtansw4=$_POST["txtansw4"];
$txtansw5=$_POST["txtansw5"];
$qstatus="active";
$sid=$_POST["sid"];
$qtype1=$_POST["qtype"];
if($con)
{

  $sql="insert into matching values(' ','$year','$dname','$txtquest1','$txtquest2','$txtquest3','$txtquest4','$txtquest5','$txta','$txtb','$txtc','$txtd','$txte','$txtf','$txtg','$txth','$txtansw1','$txtansw2','$txtansw3','$txtansw4','$txtansw5','$qtype','$qstatus','$sid')";
   $insert=mysql_query($sql,$con);
   if($insert)
    echo"Exam Question Is Saved Sucessfully";
	else
	echo" NO Exam Question Saved Sucessfully".mysql_error($con);			
}
else
echo"Connection Failed:".mysql_error($con);
}
?>
            </div>
            <br><br><br><br>
            </fieldset>
            <br><br>
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