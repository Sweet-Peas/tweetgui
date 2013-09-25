<?php
	if(return_GET("action") == "copy_tweet" && return_GET("id") != ""){
		 $sql = "SELECT * FROM tweets WHERE tweetID = " . return_GET("id");
		$result = mysqli_query($conn, $sql) or die("Something went wrong");
		
		$row = mysqli_fetch_array($result, MYSQL_ASSOC);
		
		$sql = "INSERT INTO tweets(sort, tweetMgs, maxIterations, enabled)" .
		" VALUES(" . $row["sort"] . ", '" . $row["tweetMgs"] . "', " . $row["maxIterations"] . ", " . $row["enabled"] . ")";
		
		mysqli_query($conn, $sql);
		
		header( 'Location: index.php' );
	}
	
	
	
?>