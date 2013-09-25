<div class="center"><h2>Tags</h2></div>

<p>
	<div class="notice"><div class="center">
		Select a tag from the list below to insert tag into the New Tweet form at the bottom of the page.
	</div></div>
</p>
	
<?php

	if(return_GET("sort") == "tag")
	{
		$sort = "tag";
	}
	elseif(return_GET("sort") == "desc"){
		$sort = "description";
	}
	else{
		$sort = "tag";
	}
	
	$sql = "SELECT * FROM hashtags ORDER BY " . $sort;
	$result = mysqli_query($conn, $sql);
	
	$result_count = mysqli_num_rows($result);
	$count = 0;
	$tdClass = "";
	$maxOverflow = 5;
	
	if($result_count > 0){
		
		if($result_count > $maxOverflow){
			echo "<div class=\"overflow_div\">";
		}
		else{
			echo "<div class=\"no_overflow\">";
		}
		
		echo "<table>\n";
		
		echo "<tr class=\"table_headline\">\n";
		echo "<td class=\"tag\"><a href=\"?sort=tag\">Tag</a></td>\n";
		echo "<td class=\"description\"><a href=\"?sort=desc\">Description</a></td>\n";
		echo "</tr>\n";
		
		while($row = mysqli_fetch_array($result)){
			
			if($count == 0){
				$tdClass = "1";
				$count = 1;
			}
			else{
				$tdClass = "2";
				$count = 0;
			}
			
			echo "<tr class=\"overflow_line" . $tdClass . "\">\n";
			
			echo "<td class=\"sort\"><a href=\"#tweet_link\" onClick=\"document.new_form.new_text.value += '" . $row["tag"] . "'; \">";
			echo htmlentities($row["tag"]);
			echo "</a></td>\n";
			
			echo "<td class=\"description\"><a href=\"#tweet_link\" onClick=\"document.new_form.new_text.value += '" . $row["tag"] . "'; \">";
			echo htmlentities($row["description"]);
			echo "</a></td>\n";
			
			echo "</tr>\n";
			
		}
		echo "</table>\n";
		echo "</div>\n";
	}
	else{
		echo "No tags in database!\n";
	}
	
?>