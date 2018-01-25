<?php
	require_once('admin/phpscripts/config.php');
	if(isset($_GET['id'])){
		//check to see if the id is set, then grab it
		$id = $_GET['id'];
		$tbl = "tbl_movies";
		$col = "movies_id";
		$getSingle = getSingle($tbl, $col, $id); //make sure you write it out in the same order
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Details</title>
</head>
<body>
	<?php
	 ?>
</body>
</html>
