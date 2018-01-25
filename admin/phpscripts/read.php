<?php

	//Get all of something
	function getAll($tbl){
		include('connect.php');
		$queryAll = "SELECT * FROM {$tbl}";
		$runAll = mysqli_query($link, $queryAll);
		if($runAll){
			//if it is an object, run $runAll
			return $runAll;
		}else{
			//if it is not an object
			$error = "There was an error accessing this information. Please contact your admin.";
			return $error;
		}
		mysqli_close($link);
	}

	function getSingle($tbl, $col, $id){ //make sure you get the order right!!!
		include('connect.php');
		$querySingle = "SELECT * FROM {$tbl} WHERE {$col} = {$id}";
		$runSingle = mysqli_query($link, $querySingle);
		if($runSingle){
			//if it is an object, run $runAll
			return $runSingle;
		}else{
			//if it is not an object
			$error = "There was an error accessing this information. Please contact your admin.";
			return $error;
		}
		mysqli_close($link);
	}
?>
