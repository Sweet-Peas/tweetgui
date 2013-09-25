<?php
if(return_GET("sort") == "tag"){
		$sort = "tag";
	}
	elseif(return_GET("sort") == "hashtags"){
		$sort = "hashTag";
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
		echo "<td class=\"minataur\">&nbsp;</td>\n";
		echo "<td class=\"small\"><a href=\"?p=h&sort=tag\" title=\"Sort by Tag\">Tag</a></td>\n";
		echo "<td class=\"medium\"><a href=\"?p=h&sort=hashtags\" title=\"Sort by Hashtags\">Hashtags</a></td>\n";
		echo "<td class=\"wide\"><a href=\"?p=h&sort=desc\" title=\"Sort by Description\">Description</a></td>\n";
		echo "<td class=\"minataur\">&nbsp;</td>\n";
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
			
			echo "<td><a href=\"?action=copy_hashtag&id=" . $row["hashtagID"] . "\" onClick=\"return confirm(
			'Copy this hashtag?');\">";
			echo "<img src=\"images/recycle.png\" width=\"20\" height=\"20\" alt=\"Copy\" />\n";
			echo "</a></td>\n";
			
			echo "<td class=\"small\"><a href=\"?p=h&show_id=" . $row["hashtagID"] . "\">";
			echo htmlentities($row["tag"]);
			echo "</a></td>\n";
			
			echo "<td class=\"medium\"><a href=\"?p=h&show_id=" . $row["hashtagID"] . "\">";
			echo htmlentities($row["hashTag"]);
			echo "</a></td>\n";
			
			echo "<td class=\"wide\"><a href=\"?p=h&show_id=" . $row["hashtagID"] . "\">";
			echo htmlentities($row["description"]);
			echo "</a></td>\n";
			
			echo "<td><a href=\"?action=delete_hashtag&id=" . $row["hashtagID"] . "\" onClick=\"return confirm(
			'Delete this hashtag?');\">";
			echo "<img src=\"images/delete.png\" width=\"20\" height=\"20\" alt=\"Delete\" />\n";
			echo "</a></td>\n";
			
			echo "</tr>\n";
			
		}
		echo "</table>\n";
		echo "</div>\n";
	}
	else{
		echo "No hashtags in database!\n";
	}
?>
