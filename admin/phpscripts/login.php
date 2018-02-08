<?php

  function logIn($username, $password, $ip){
    require_once('connect.php');
    $username = mysqli_real_escape_string($link, $username); //real escape string will filter out certain characters, protects against sql injection
    $password = mysqli_real_escape_string($link, $password);
    $loginstring = "SELECT * FROM tbl_user WHERE user_name = '{$username}' AND user_pass = '{$password}'";
      $user_set = mysqli_query($link, $loginstring);
      //looking to return exactly 1 row, any more and something has gone wrong, any less, and they aren't in db
      if(mysqli_num_rows($user_set)){ //tests to see if 1 row has been returned
        $found_user = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
        $id = $found_user['user_id'];
        //get and post both pass info through the url, unsafe/exposed information. Use session. Sessions are temporary, only exist on local level, don't use cookies when passing things from page to page
        $_SESSION['user_id'] = $id;//protected & safe, don't pass everything via sessions though (ex. username, user id)
        $_SESSION['user_name'] = $found_user['user_fname'];
        if(mysqli_query($link, $loginstring)){
          $updatestring = "UPDATE tbl_user SET user_ip = '$ip' WHERE user_id={$id}";
          $updatequery = mysqli_query($link, $updatestring); //go in and update ip address
        }
        redirect_to("admin_index.php");
      }else{
        $message = "Username and/ or password is incorrect. <br>Please make sure your caps lock key is turned off.";
        return $message;
      }
    mysqli_close($link);
  }
?>
