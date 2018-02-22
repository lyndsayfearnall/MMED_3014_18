<?php
  function generatePass($passlength){
    $characters = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    return substr(str_shuffle($characters), 0, $passlength);
  }
  //echo generatePass(6);

//   if(defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
//   echo "CRYPT_BLOWFISH is enabled!";
// } else {
//   echo "CRYPT_BLOWFISH is NOT enabled!";
// }



?>
