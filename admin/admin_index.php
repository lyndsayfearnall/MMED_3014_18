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
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="public/css/main.css">
  </head>
  <body>
    <div class = "container">
      <h1>Welcome to your admin page!</h1>
      <?php echo "<h2>$greeting</h2>"; ?>
      <?php echo "<p>Today is $currentTimestamp </p>"; ?>
      <?php echo "<p>The date and time of your last session was: {$_SESSION['user_date']}</p>"; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>
  </body>
</html>
