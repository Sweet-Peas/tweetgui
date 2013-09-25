<?php
require("database_conn.php");
require("functions.php");
require("new_post.php");
require("update_tweet.php");
require("delete_tweet.php");
require("copy_tweet.php");
require("new_hashtag.php");
require("update_hashtag.php");
require("copy_hashtag.php");
require("delete_hashtag.php");
if(isset($_GET["new_tweet"])){
	// Add to the database
	// Forward back to where the user came from
}

if(isset($_GET["update_tweet"])){
	// Update the database
	// Forward back to where the user came from
}
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">

<html>
	<head>
		<title>SweetPeas - TweetGUI</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<style type="text/css">
			html, body{
				background-image: URL(images/<?php
					if(return_GET("p") == "h"){
						echo "hashtag";
					}
					else {
						echo "tweet";
					}
				?>_background.png);
				background-repeat: no-repeat;
				background-position: 98% 4%;
			}
		</style>
		<script type="text/javascript" src="twitter-text/lib/jquery-1.4.2.js"></script>
		<script type="text/javascript" src="twitter-text/twitter-text.js"></script>
		<script type="text/javascript" src="javascript.js"></script>
	</head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<body onload="update_char_remain('tweet_form_update', 'char_remain_update'); update_char_remain('tweet_form_new', 'char_remain_new'); validate_length('tweet_form_new');">
	<div id="body_container">
		<div id="logo_container">
			<a href="index.php">
				<img src="images/tweetgui_logo.png" alt="" />
			</a>
		</div>
		<div id="left_menu">
			<?php require("menu.php") ?>	
		</div>
		<div id="right_content">
			<?php
				if(return_GET("p") == "h"){
					require("hashtag_page.php");
				}
				else{
					require("tweet_page.php");
				}
			?>
		</div>
		<div id="float_clear" /><br /><br /><br /><br />
	</div>
</body>
</html>
<?php
	mysqli_close($conn);
?>