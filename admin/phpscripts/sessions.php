<?php
  session_start(); //listening for $_SESSION call, can't get to this page unless they log in

  function confirm_logged_in() {
    if(!isset($_SESSION['user_id'])){
      redirect_to("admin_login.php");
    }
  }

?>
