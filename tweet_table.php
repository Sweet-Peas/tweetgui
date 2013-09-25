<?php
				if(return_GET("sort") == "sort")
				{
					$sort = "sort";
				}
				elseif(return_GET("sort") == "date"){
					$sort = "date_created";
				}
				elseif(return_GET("sort") == "tweets"){
					$sort = "TweetMgs";
				}
				elseif(return_GET("sort") == "numiter"){
					$sort = "numIterations";
				}
				elseif(return_GET("sort") == "maxiter"){
					$sort = "maxIterations";
				}
				elseif(return_GET("sort") == "enabled"){
					$sort = "enabled";
				}
				else{
					$sort = "date_created";
				}
				$sql = "SELECT * FROM tweets ORDER BY " . $sort . ", tweetID";
				$result = mysqli_query($conn, $sql) or die("Something went wrong!");
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
					echo "<td class=\"medium\"><a href=\"?sort=date\" title=\"Sort by Date\">Date</a></td>\n";
					echo "<td class=\"small\"><a href=\"?sort=sort\" title=\"Sort by Sort number\">Sort</a></td>\n";
					echo "<td class=\"wide\"><a href=\"?sort=tweets\" title=\"Sort by Tweet Message\">Tweet Message</a></td>\n";
					echo "<td class=\"small\"><a href=\"?sort=numiter\" title=\"Sort by Num\">Num. Iter.</a></td>\n";
					echo "<td class=\"small\"><a href=\"?sort=maxiter\">Max Iter.</a></td>\n";
					echo "<td class=\"small\"><a href=\"?sort=enabled\">Enabled</a></td>\n";
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
						
						$date = date_create($row["date_created"]);
						
						echo "<tr class=\"overflow_line" . $tdClass . "\">\n";
						
						echo "<td class=\"minataur\"><a href=\"?action=copy_tweet&id=" . $row["tweetID"] . "\" onClick=\"return confirm(
						'Copy this tweet?');\">";
						echo "<img src=\"images/recycle.png\" width=\"20\" height=\"20\" alt=\"Copy\" />\n";
						echo "</a></td>\n";
						
						echo "<td class=\"medium\"><a href=\"?show_id=" . $row["tweetID"] . "\">";
						echo htmlentities(date_format($date, 'y/m/d'));
						echo "</a></td>\n";
						
						echo "<td class=\"small\"><a href=\"?show_id=" . $row["tweetID"] . "\">";
						echo htmlentities($row["sort"]);
						echo "</a></td>\n";
						
						echo "<td class=\"wide\"><a href=\"?show_id=" . $row["tweetID"] . "\">";
						echo htmlentities($row["tweetMgs"]);
						echo "</a></td>\n";
						
						echo "<td class=\"small\"><a href=\"?show_id=" . $row["tweetID"] . "\">";
						echo htmlentities($row["numIterations"]);
						echo "</a></td>\n";
						
						echo "<td class=\"small\"><a href=\"?show_id=" . $row["tweetID"] . "\">";
						echo htmlentities($row["maxIterations"]);
						echo "</a></td>\n";
						
						echo "<td class=\"small\"><a href=\"?show_id=" . $row["tweetID"] . "\">";
						echo htmlentities($row["enabled"]);
						echo "</a></td>\n";
						
						echo "<td class=\"mini\"><a href=\"?action=delete_tweet&id=" . $row["tweetID"] . "\" onClick=\"return confirm(
						'Delete this tweet?');\">";
						echo "<img src=\"images/delete.png\" width=\"20\" height=\"20\" alt=\"Delete\" />\n";
						echo "</a></td>\n";
						
						echo "</tr>\n";
						
					}
					echo "</table>\n";
					echo "</div>\n";
					echo "<div class=\"table_desc\">\n";
					echo "Sort = Sorting number. Num. Iter. = Number of tweet. Max Iter. = Max allowed tweet.\n";
					echo "</div>\n";
				}
				else{
					echo "No tweets in database!\n";
				}
			?>
			