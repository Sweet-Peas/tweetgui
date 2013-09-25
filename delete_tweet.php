<?php

	if(return_GET("action") == "delete_tweet"){
		$sql = "DELETE FROM tweets WHERE tweetID = " . return_GET("id");
		mysqli_query($conn, $sql) or die("Error");
	
		header( 'Location: index.php' );
	}
?>