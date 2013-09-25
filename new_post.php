<?php

	if(return_GET("action") == "new_tweet"){
		if(isset($_POST["new_enabled"])){
			$enabled = 1;
		}
		else{
			$enabled = 0;
		}
		if(isset($_POST["new_sort"]) && $_POST["new_sort"] != ""){
			$new_sort = $_POST["new_sort"];
		}
		else{
			$new_sort = 999;
		}
		if(isset($_POST["new_max"]) && $_POST["new_max"] != ""){
			$new_max = $_POST["new_max"];
		}
		else{
			$new_max = 25;
		}
		$enabled = 
		$sql = "INSERT INTO tweets(sort, tweetMgs, maxIterations, enabled)" .
		" VALUES ('" . $new_sort .
		"', '" . $_POST["new_text"] .
		"', '" . $new_max .
		"', '" . $enabled .
		"')";
		
		mysqli_query($conn, $sql) or die("Error");
		
		header( 'Location: index.php' );
	}

?>