<?php
  // ini_set('display_errors', 1);
  //error_reporting(E_ALL);
  //turns on error reporting for mac
  require_once('admin/phpscripts/config.php');
  $tbl = "tbl_movies";
  $getMovies = getAll($tbl);
 ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="public/css/main.css">
<title>Welcome to the Finest Selection of Blu-rays on the internets!</title>
</head>
<body>
  <?php
    include('includes/nav.html');
   ?>

  <div class="container">
    <div class="row">
  <?php
    if(!is_string($getMovies)){
      //if $getMovies is not a string, write content to page
      while($row = mysqli_fetch_array($getMovies)){
        echo
        "
            <div class=\"col-12 col-md-6 col-lg-4\">
              <img src=\"images/{$row['movies_cover']}\" alt=\"{$row['movies_title']}\" width=\"80%\">
                <h2>{$row['movies_title']}</h2>
                <p>{$row['movies_year']}</p>
                <a href=\"details.php?id={$row['movies_id']}\" id=\"detailsBut\">More Details...</a>
                <br><br>
            </div>

        "; // back slashes are cancelling characters
      }
    }else{
      echo "<p class=\"error\">{$getMovies}</p>";
    }

    include('includes/footer.html');
   ?>

    </div>

  </div>

   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
