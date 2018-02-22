<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  require_once('phpscripts/config.php');
  confirm_logged_in();

  $currentTimestamp = date('l F d, Y');
  $currentHour = date('G');
  //echo $currentHour;
  if ($currentHour >= 0){ //midnight till 5 am
    $greeting = "Sleep is for the weak, {$_SESSION['user_name']}.";
  }
   if ($currentHour >= 6) { //6-12
    $greeting= "Good morning {$_SESSION['user_name']}!";
  }
  if ($currentHour >= 12){
     $greeting = "Good afternoon {$_SESSION['user_name']}!";
  }
  if ($currentHour >= 17){
    $greeting = "Good evening {$_SESSION['user_name']}!";
   }
   if ($currentHour >= 22){
     $greeting = "Hey {$_SESSION['user_name']}, it's getting kinda late.";
   }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS Portal</title>
      <link rel="icon" href="../../favicon.ico">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="../public/css/main.css">

  </head>
  <body class="admin_index_pages">
    <?php include('../includes/adminNav.php');?>

    <!-- Greeting -->
    <div class="container-fluid">
      <div class="row" id="greeting">
        <div class="ml-2">
          <div class="col-">
            <h2><?php echo "$greeting";?></h2>
            <p>Today is <?php echo "$currentTimestamp"; ?></p>
            <p><small>The date and time of your last session login was:  <?php echo "{$_SESSION['user_date']}"; ?></p>
          </div>
        </div>
      </div>

    <!--sidebar-->
    <div class="row mainArea">
      <?php include('../includes/adminSidebar.php');?>

      <div class="col-sm-9 col-md-10" id="mainContent">
        <div class="card">
          <div class="card-header">
            Welcome to your admin page
          </div>
          <div class="card-body">
            <h5 class="card-title">Create a new admin</h5>
            <p class="card-text">Click the link to add an admin.</p>
            <a href="admin_createuser.php" class="btn" id="goSomewhere">Add admin</a>
          </div>
        </div>
      </div>



    </div>
  </div>

  <?php include('../includes/adminFooter.php');?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>
  </body>
</html>
