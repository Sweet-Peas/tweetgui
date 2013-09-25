<?php
	if(return_GET("action") == "update_hashtag"){
		$sql = "UPDATE hashtags SET hashTag='" . $_POST["update_hashtag"] . "', description='" . $_POST["update_desc"] . "', tag='" . $_POST["update_tag"] . "'" .
		" WHERE hashtagID=" . return_GET("update_id");
		mysqli_query($conn, $sql) or die("Something went wrong");		
		
		header( 'Location: index.php?p=h' );
	}

?>