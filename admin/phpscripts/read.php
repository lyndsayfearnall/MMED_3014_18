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
			//if it is an object, run $runSingle
			return $runSingle;
		}else{
			//if it is not an object
			$error = "There was an error accessing this information. Please contact your admin.";
			return $error;
		}
		mysqli_close($link);
	}

	function filterType($tbl, $tbl2, $tbl3, $col, $col2, $col3, $filter){
		//$tbl ="tbl_movies"
		//$tbl2 = tbl_genre
		//$tbl3 = "tbl_mov_genre"
		//$col == "movies_id"
		//$col2 = "genre_id"
		//$col3= "genre_name"

		include('connect.php');
			$queryFilter = "SELECT * FROM {$tbl}, {$tbl2}, {$tbl3} WHERE {$tbl}.{$col} = {$tbl3}.{$col} AND {$tbl2}.{$col2} = {$tbl3}.{$col2} AND {$tbl2}.{$col3}='{$filter}'";
			//echo $queryFilter;
			$runFilter = mysqli_query($link, $queryFilter);
			if($runFilter){
				//if it is an object, run $runFilter
				return $runFilter;
			}else{
				//if it is not an object
				$error = "There was an error accessing this information. Please contact your admin.";
				return $error;
			}
		mysqli_close($link);
	}
?>
