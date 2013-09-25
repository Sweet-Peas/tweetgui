<?php
	if(return_GET("action") == "new_hashtag"){
		$sql = "INSERT INTO hashtags(hashTag, description, tag) VALUES ('" . $_POST["new_hashtag"] . "', '" . $_POST["new_desc"] . "', '" . $_POST["new_tag"] . "')";
		
		mysqli_query($conn, $sql) or die("Something went wrong");		
		
		header( 'Location: index.php?p=h' );
	}

?>