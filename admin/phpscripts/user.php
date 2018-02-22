<?php
  function createUser($fname, $username, $encryptPass, $email, $userlvl) {
    include('connect.php');
    //clean variables first
    //insert is very picky, you don't want to fill out every column (ex. id, ip)
    $userString = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$encryptPass}', '{$email}', NULL, '{$userlvl}', 'no', 0)";
    //echo $userString;
    $userQuery = mysqli_query($link, $userString);
    if($userQuery){
      redirect_to("admin_index.php");
      echo "new user created";
    }else{
      $message = "There was a problem setting up this user.";
      return $message;
    }
    mysqli_close($link);
  }
?>
