<?php
	if(return_GET("action") == "delete_hashtag"){
		$sql = "DELETE FROM hashtags WHERE hashtagID = " . return_GET("id");
		
		mysqli_query($conn, $sql) or die("Something went wrong");		
		
		header( 'Location: index.php?p=h' );
	}

?>