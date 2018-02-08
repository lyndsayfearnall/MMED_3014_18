<?php
  //ini_set('display_errors', 1);
  //error_reporting(E_ALL);
  require_once('phpscripts/config.php');
  confirm_logged_in()

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS Portal</title>
  </head>
  <body>
    <h1>Welcome Company Name to your admin page</h1>
    <?php echo "<h2>Hi {$_SESSION['user_name']}</h2>"; ?>
  </body>
</html>
