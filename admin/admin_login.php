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
      <link rel="stylesheet" href="public/css/main.css">
    <title>CMS Portal Login</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <h1 class= "col-sm-12">Welcome to the Admin Login Page!</h1>
        <div><?php if(!empty($message)){echo $message;} ?></div>
        <br>
          <form class = "col-sm-10 form-group" action="admin_login.php" method="post" id="loginForm">
            <label>Username:</label>
            <input type="text" name="username" value="" class="form-control">
            <br>
            <label>Password:</label>
            <input type="text" name="password" value="" class="form-control">
            <br>
            <button class="btn btn-primary" type="submit" name="submit" value="Show me the money" id="login">Let Me In!</button>
          </form>
        </div>
    </div>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="../js/main.js"></script>
  </body>
</html>
