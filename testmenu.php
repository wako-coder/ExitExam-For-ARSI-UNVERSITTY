 <!-- Header -->


 <div class="navbar navbar-expand-sm navbar-main navbar-dark bg-primary pl-md-0 pr-0" id="navbar" data-primary>
     <div class="container">

         <!-- Navbar toggler -->
         <button class="navbar-toggler navbar-toggler-custom d-lg-none d-flex mr-navbar" type="button"
             data-toggle="sidebar">
             <span class="material-icons">short_text</span>
         </button>


         <div class="d-flex sidebar-account flex-shrink-0 mr-auto mr-lg-0">
             <a href="fixed-index.html" class="flex d-flex align-items-center text-underline-0">
                 <span class="mr-1  text-white">
                     <!-- LOGO -->
                     <img src="logo.jpg" alt="" class="rounded-circle" width="54" height="54">

                     <!-- <img width="700" height="50" src="image/Newlog.jpg">  -->
                 </span>
                 <span class="flex d-flex flex-column text-white">
                     <strong class="sidebar-brand">Web Based Exit Examination System For Arsi
                         University</strong>
                 </span>
             </a>
         </div>
         <ul class="ml-auto nav navbar-nav mr-2 d-none d-lg-flex">
             <li class="nav-item"><a href="#" class="nav-link"><?php
			echo"Today:";
			echo(date('d-m-Y'));
			echo"<div id='clock'></div>";
			?></a></li>
         </ul>

         <div class="dropdown">
             <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Login
                 <span class="caret"></span></button>
             <ul class="dropdown-menu">

                 <?php
                    require("login.php");
                    ?>
             </ul>
         </div>
     </div>
 </div>
