<?php
	if(return_GET("action") == "copy_hashtag" && return_GET("id") != ""){
		$sql = "SELECT * FROM hashtags WHERE hashtagID = " . return_GET("id");
		$result = mysqli_query($conn, $sql) or die("Something went wrong");
		
		$row = mysqli_fetch_array($result, MYSQL_ASSOC);
		
		echo "<pre>";
		print_r($row) . "<br /><br />";
		echo "</pre>";
		
		$sql = "INSERT INTO hashtags(hashTag, description, tag)" .
		" VALUES('" . $row["hashTag"] . "', '" . $row["description"] . "', '" . $row["tag"] . "')";
		
		echo htmlentities($sql) . "<br />";
		
		mysqli_query($conn, $sql) or die("Something went wrong");
		
		header( 'Location: index.php?p=h' );
	}
	
	
	
?>