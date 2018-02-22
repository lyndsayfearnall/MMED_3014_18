<?php
	ini_set('display_errors');
	error_reporting(E_ALL);
	require_once('phpscripts/config.php');
	//confirm_logged_in();
	 if(isset($_POST['submit'])){
	 	$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
	 	$userlvl = $_POST['userlvl'];
	 //don't assume everyone will remember to fill out every field
	 	if(empty($userlvl)){
	 		$message = "Please select a user level.";
	 	}else{
			$password = generatePass(6);
			//$encrypt = encryptPass($password);
			$encryptPass = password_hash($password, PASSWORD_BCRYPT, array('cost'=>11));
			//echo $encryptPass;
			$result = createUser($fname, $username, $encryptPass, $email, $userlvl);
			$message = $result;
			$sendMail = sendUserMessage($fname, $username, $password, $email, $userlvl);
		}
	}


?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Portal</title>
	<link rel="icon" href="../../favicon.ico">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../public/css/main.css">
</head>
<body class="admin_index_pages">
	<?php include('../includes/adminNav.php');?>

	<div class ="container-fluid">

		<div class="row mainArea">
			<?php include('../includes/adminSidebar.php');?>


			<div class="container">
			<div class="col-sm-9 col-md-10">
				<h1>Create a new admin user</h1>
			<?php if(!empty($message)){echo $message;} ?>
				<form action="admin_createuser.php" method="post">
				<div class="form-group">
					<label for="fname">First Name</label>
					<input type="text" name="fname" class="form-control" value="<?php if(!empty($fname)){echo $fname;} ?>">
				</div>

				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control" value="<?php if(!empty($username)){echo $username;} ?>">
				</div>

			<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" class="form-control" value="<?php if(!empty($email)){echo $email;} ?>">
			</div>

				<div class="form-group">
					<label>User Level</label>
					<select name="userlvl">
						<option value="">Please select a user level</option>
						<option value="2">Web Admin</option>
						<option value="1">Web Master</option>
					</select>
					</div>
					<input type="submit" name="submit" value="Create User" class="btn">
				</form>
			</div>

		</div>
		</div>
	</div>

	<?php include('../includes/adminFooter.php');?>
</body>
</html>
