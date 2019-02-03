<?php
$Today=date('Y-m-d');
$NewDate=Date('Y-m-d', strtotime("-10 days"));


$sql = "SELECT MAX(date) AS max FROM winter UNION ALL SELECT MAX(date)  AS max FROM autumn UNION ALL SELECT MAX(date) AS max  FROM spring UNION ALL SELECT MAX(date) AS max  FROM summer";
                   
$result =  mysqli_query($db, $sql);


while($row = mysqli_fetch_array($result))
{

$Maxdatas[]=$row;  
 }
foreach($Maxdatas as $Maxdata){
  $max[]=$Maxdata['max'];
}
$lastDay= max($max);
$start_ts = strtotime($lastDay);
$end_ts = strtotime($Today);
$diff = $end_ts - $start_ts;
$dif = round($diff / 86400);
 
$mes = 0;
if($dif>0){

  $mes = 1;
}
 

 ?>

  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar" style="background-color: #003333;">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center" style="background-color: #004D26">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="img/avatar-7.png" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5"><?=$_SESSION['username'] ?></h2><span> </span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.php" class="brand-small text-center"> <strong>W</strong><strong class="text-primary">P</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled ">                  
            <li ><a href="index.php"><i class="icon-home"></i>Home                             </a></li>
            <li><a href="Prediction.php"> <i class="icon-form "></i>Prediction                             </a></li>
            <li><a href="data_add.php"> <i class="icon-form"></i>upload Data                             </a></li>
            <li><a href="show_tb.php"> <i class="fa fa-bar-chart"></i>Table Data                            </a></li>
            <li><a href=""> <i class="icon-grid"></i>Tables                             </a></li>
    
            <li><a href="register.php"> <i class="icon-interface-windows"></i>Register page                             </a></li>
           
          </ul>
        </div>

      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar" style="background-color: #003333">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header" ><a id="toggle-btn" href="#" class="menu-btn" style="background-color: #00806A"><i class="icon-bars" > </i></a><a href="index.php" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span>Weather Prediction </span><strong class="text-primary">System</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Notifications dropdown-->
                <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell"></i><span class="badge badge-warning">

                <?=$mes?></span></a>
                  <?php if ($dif!=0) {
                  ?>

                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="data_add.php" class="dropdown-item"> 
                        <div class="notification d-flex justify-content-between">
                          <div class="notification-content"><i class="fa fa-envelope"></i>

                          <?php
                          
                            echo "you need to enter "."$dif"." day date in database";
                          }else{
                            ?>


                            <ul  class="dropdown-menu">
                    <li> 
                        <div class="notification d-flex justify-content-between">
                          <p>Updated</p>
                          <div class="notification-content">
                            <?php


                          } ?> </div>
                          <div class="notification-time"><small>...</small></div>
                        </div></a></li>
                   
                  </ul>
                </li>
           
                <!-- Log out-->
				 
                <li class="nav-item"><a href="index.php?logout='1'" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>

