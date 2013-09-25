<?php

	if(return_GET("action") == "update_tweet" && return_GET("update_id") != ""){
		if(isset($_POST["update_text"]) || isset($_POST["update_sorting"]) || isset($_POST["update_max"]) || isset($_POST["update_enabled"])) {
			if(isset($_POST["update_enabled"])){
				$enabled = 1;
			}
			else{
				$enabled = 0;
			}
			echo "<pre>";
			print_r($_POST);
			echo "</pre>";
			
			$sql = "UPDATE tweets SET tweetMgs='" . $_POST["update_text"] .
			"', sort=" . $_POST["update_sort"] .
			", maxIterations=" . $_POST["update_max"] .
			", enabled=" . $enabled .
			" WHERE tweetID = " . return_GET("update_id") . "";
			
			mysqli_query($conn, $sql);
			
			
			
			header( 'Location: index.php' );
		}
		else
		{
			header( 'Location: index.php?action=error_update' ) ;
		}
	}

?>