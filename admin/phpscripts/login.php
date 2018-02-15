<?php

  function logIn($username, $password, $ip, $timestamp){
    require_once('connect.php');
    $username = mysqli_real_escape_string($link, $username); //real escape string will filter out certain characters, protects against sql injection
    $password = mysqli_real_escape_string($link, $password);

    //check for valid username and password
    $loginstring = "SELECT * FROM tbl_user WHERE user_name = '{$username}' AND user_pass = '{$password}'";
      $user_set = mysqli_query($link, $loginstring);

    //look for valid username to check login attempts
    $checkUserString = "SELECT * FROM tbl_user WHERE user_name = '{$username}'";
      $valid_user = mysqli_query($link, $checkUserString);


      if(mysqli_num_rows($user_set)){   //looking to return exactly 1 row, any more and something has gone wrong, any less, and they aren't in db
        $found_user = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
        $id = $found_user['user_id'];
        $lastLogin = $found_user['user_date'];
        $logins = $found_user['login_attempts'];

        //get and post both pass info through the url, unsafe/exposed information. Use session. Sessions are temporary, only exist on local level, don't use cookies when passing things from page to page
        $_SESSION['user_id'] = $id;//protected & safe, don't pass everything via sessions though (ex. username, user id)
        $_SESSION['user_name'] = $found_user['user_fname'];
        $_SESSION['user_date'] = $lastLogin;
        $_SESSION['login_attempts'] = $logins;

        if(mysqli_query($link, $loginstring)){
          $updatestring = "UPDATE tbl_user SET user_ip = '$ip' WHERE user_id={$id}";
          $updatequery = mysqli_query($link, $updatestring); //go in and update ip address
          $updateTimestamp = "UPDATE tbl_user SET user_date = '$timestamp' WHERE user_id={$id}";
          $updateTimestampquery = mysqli_query($link, $updateTimestamp);

          //reset login attempts back to zero
          $resetLoginAttempts = "UPDATE tbl_user SET login_attempts = 0";
          $resetLoginquery = mysqli_query($link, $resetLoginAttempts);
        }
        redirect_to("admin_index.php");

      }else if (mysqli_num_rows($valid_user)){ //check to see how many times username has failed to login
          //echo 'valid username';
          $found_user = mysqli_fetch_array($valid_user, MYSQLI_ASSOC);
          $logins = $found_user['login_attempts'];
          $_SESSION['login_attempts'] = $logins;

          // if(mysqli_query($link, $loginstring) && $logins < 2){
          if(mysqli_query($link, $loginstring) && $logins < 2){
            $addLoginAttempts = "UPDATE tbl_user SET login_attempts = login_attempts +1";
            $addLoginAttempts = mysqli_query($link, $addLoginAttempts);
            //echo '+1';
            $message = "Username and/ or password is incorrect. <br>Please make sure your caps lock key is turned off.";
            return $message;
          }else{
            //lockout user after third failed attempt, redirect
            redirect_to("admin_login_failed.php");
          }
          //this doesn't actually accomplish what it's supposed to—you can keep trying to login, you just get redirected to the admin_login_failed page....

        }else{
          $message = "Username and/ or password is incorrect. <br>Please make sure your caps lock key is turned off.";
          return $message;
      }
    mysqli_close($link);
  }


//   //SECOND TRY ... ALSO DOESN'T WORK
//
// function logIn($username, $password, $ip, $timestamp){
//   require_once('connect.php');
//   $username = mysqli_real_escape_string($link, $username); //real escape string will filter out certain characters, protects against sql injection
//   $password = mysqli_real_escape_string($link, $password);
//
//   //look for number of login attempts associated with the username
//   $checkUserString = "SELECT login_attempts FROM tbl_user WHERE user_name = '{$username}'";
//     $valid_user = mysqli_query($link, $checkUserString);
//
//       //check for valid username and password
//   $loginstring = "SELECT * FROM tbl_user WHERE user_name = '{$username}' AND user_pass = '{$password}'";
//     $user_set = mysqli_query($link, $loginstring);
//
//     if(mysqli_num_rows($valid_user)){   //looking to return exactly 1 row, any more and something has gone wrong, any less, and they aren't in db
//           $found_user = mysqli_fetch_array($valid_user, MYSQLI_ASSOC);
//           $logins = $found_user['login_attempts'];
//
//           $_SESSION['login_attempts'] = $logins;
//
//           //make sure user hasn't failed to login 3x
//           if(mysqli_query($link, $loginstring) && $logins < 2){
//               // $addLoginAttempts = "UPDATE tbl_user SET login_attempts = login_attempts +1";
//               // $addLoginAttempts = mysqli_query($link, $addLoginAttempts);
//               // //echo '+1';
//               // $message = "Username and/ or password is incorrect. <br>Please make sure your caps lock key is turned off.";
//               // return $message;
//               // }else{
//               // //lockout user after third failed attempt, redirect
//               //   redirect_to("admin_login_failed.php");
//               echo $logins;
//             }else{
//               echo "nope";
//             } //realizing that this way doesn't make any sense either...
//           }else {
//         $message = "Username and/ or password is incorrect. <br>Please make sure your caps lock key is turned off.";
//         return $message;
//           }
//       mysqli_close($link);
//   }

?>
