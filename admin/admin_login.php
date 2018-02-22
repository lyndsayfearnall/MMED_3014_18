<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  require_once('phpscripts/config.php');

  $ip = $_SERVER['REMOTE_ADDR']; //access ip address so that you can run checks against it. Always check the ip address and store in database just in case
  $timestamp = date('Y-m-d G:i:s');

  if(isset($_POST['submit'])){ //check to see if the form has been submitted
    $username = trim($_POST['username']); //trim() checks for white space before and after characters and removes it
    $password = trim($_POST['password']);
    if($username !== "" && $password !== ""){ //make sure it is NOT identitcal to an empty string, adds security. BOTH can't be empty
      $result = logIn($username, $password, $ip, $timestamp);
      $message = $result;
    }else{
      $message = "*Please fill in the required fields";
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="../public/css/main.css">
    <title>CMS Portal Login</title>
  </head>
  <body class="admin_login">
    <div class="container">
      <div class="row">
        <div class= "col-sm-5 loginForm">
          <h1 class= "text-center"> Welcome to the Admin Login Page!</h1>
          <p class="text-center">Enter your username <span class="font-weight-bold">(testUser)</span> and password <span class="font-weight-bold">(test)</span> to login</p>
          <div><?php if(!empty($message)){echo $message;} ?></div>
          <br>

          <form action="admin_login.php" method="post">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="material-icons">perm_identity</i></span>
              </div>
                <input type="text" name="username" value="" class="form-control col-sm-8" placeholder="Username">
            </div>
            <br>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="material-icons">lock_outline</i></span>
              </div>
                <input type="password" name="password" value="" class="form-control" placeholder="Password">
            </div>
            <br>

            <input class="form-control" type="submit" name="submit" value="Let Me In!" id="login"></input>
          </form>
        </div>
      </div>

    </div>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="../js/main.js"></script>
  </body>
</html>
