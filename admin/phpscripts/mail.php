<?php

  function sendUserMessage($fname, $username, $password, $email, $userlvl) {

    $to = $email;
    $subject = "Your admin login information";
    $msg = "You have been added as an admin to the awesomest movie site ever. Head to http://www.moviesite.com/admin_login to login.\n\n
    Your Username: ".$username."\nYour Password: ".$password."\nYour User Level: ".$userlvl;

    mail($to, $subject, $msg);
  }
?>
