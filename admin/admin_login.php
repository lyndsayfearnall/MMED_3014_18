<?php
  //ini_set('display_errors', 1);
  //error_reporting(E_ALL);

  require_once('phpscripts/config.php');

  $ip = $_SERVER['REMOTE_ADDR']; //access ip address so that you can run checks against it. Always check the ip address and store in database just in case
  //echo $ip;
  if(isset($_POST['submit'])){ //check to see if the form has been submitted
    $username = trim($_POST['username']); //trim() checks for white space before and after characters and removes it
    $password = trim($_POST['password']);
    if($username !== "" && $password !== ""){ //make sure it is NOT identitcal to an empty string, adds security. BOTH can't be empty
      $result = logIn($username, $password, $ip);
      $message = $result;
    }else{
      $message = "Please fill in the required fields";
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS Portal Login</title>
  </head>
  <body>
    <h1>Welcome Company Name</h1>
    <?php if(!empty($message)){echo $message;} ?>
      <form action="admin_login.php" method="post">
        <label>Username:</label>
        <input type="text" name="username" value="">
        <br>
        <label>Password:</label>
        <input type="text" name="password" value="">
        <br>
        <input type="submit" name="submit" value="Show me the money">
      </form>
  </body>
</html>
