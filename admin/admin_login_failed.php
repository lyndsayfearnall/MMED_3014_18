<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  require_once('phpscripts/config.php');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>OOPS</h1>
    <p>You have exceeded the number of login attempts. Please contact your admin to get things sorted out.</p>
    <p>Or just keep trying because this doesn't actually lock you out.</p>
  </body>
</html>
