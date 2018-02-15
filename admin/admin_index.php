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
  </head>
  <body>
    <h1>Welcome to your admin page!</h1>
    <?php echo "<h2>$greeting</h2>"; ?>
    <?php echo "<p>Today is $currentTimestamp </p>"; ?>
    <?php echo "<p>The date and time of your last session was: {$_SESSION['user_date']}</p>"; ?>



    <script src="../js/main.js"></script>
  </body>
</html>
