<div class="center"><h2>Tweet List</h2></div>
			
			<?php require("tweet_table.php"); ?>
			
			
			
			<hr />
			
			<div class="center"><h2>Update Tweet!</h2></div>
			<?php
			if (!isset($_GET["show_id"])){
				// no show_id exists, disable all update/remove form and ask for tweet selection
				$disable_form = 1;
				echo "<span class=\"notice\">Please select a tweet from the list above to edit.</span>\n";
			}
			else{
				$disable_form = 0;
			}
			?>
			
			<form action="?action=update_tweet<?php 
			if (return_GET("show_id") != ""){
				echo "&update_id=" . $_GET["show_id"];
				$sql = "SELECT * FROM tweets WHERE tweetID = " . $_GET["show_id"] . " LIMIT 1";
				$results = mysqli_query($conn, $sql);
				$row = mysqli_fetch_array($results, MYSQLI_ASSOC);
				$update_tweet = $row["tweetMgs"];
				$update_sort = $row["sort"];
				$update_max = $row["maxIterations"];
				$update_tweetId = $row["tweetID"];
				$update_num = $row["numIterations"];
				$date = date_format(date_create($row["date_created"]), 'y/m/d h:m:s'); 
				
				if($row["enabled"] == 0){
					$update_enabled = "";
				}
				else{
					$update_enabled = "checked";
				}
			}
			else{
				$update_tweet = "";
				$update_sort = "";
				$update_max = "";
				$update_enabled = "";
				$update_tweetId = "";
				$update_num = "";
				$date = "";
			}
			?>" method="post" id="form_update_tweet">
							<div class="table_desc">Tweet Text</div>
							<textarea form="form_update_tweet" name="update_text" id="tweet_form_update" class="tweet_box" <?php disabled_form($disable_form); ?> onchange ="update_char_remain('tweet_form_update', 'char_remain_update')" onkeyup ="update_char_remain('tweet_form_update', 'char_remain_update')"><?php echo $update_tweet; ?></textarea><span class="char_remain" id="char_remain_update">140</span><br /><br />
				<table>
					<tr>
						<td class ="table_desc" width="100">
							Sort Number
						</td>
						<td class ="table_desc"  width="100">
							Max Iterations
						</td>
						<td class ="table_desc" width="100">
							Enabled
						</td>
						<td class ="table_desc"  width="100">
							Tweet ID
						</td>
						<td class ="table_desc"  width="100">
							# of Iterations
						</td>
						<td class ="table_desc"  width="100">
							Date Created
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="update_sort" maxlength="4" size="4" value="<?php echo $update_sort; ?>" <?php disabled_form($disable_form); ?> required />
						</td>
						<td>
							<input type="text" name="update_max" value="<?php echo $update_max; ?>" size="4" maxlength="4" <?php disabled_form($disable_form); ?> required />
						</td>
						<td>
							<input type="checkbox" name="update_enabled" <?php echo $update_enabled; ?> <?php disabled_form($disable_form); ?> />
						</td>
						<td>
							<input type="text" size="1" maxlength="1" value="<?php echo $update_tweetId; ?>" disabled />
						</td>
						<td>
							<input type="text" size="1" maxlength="1" value="<?php echo $update_num; ?>" disabled />
						</td>
						<td>
							<input type="text" size="15" value="<?php echo $date; ?>" disabled />
						</td>
					</tr>
				</table>
				
				<input type="submit" name="update_submit" value="Update!"<?php disabled_form($disable_form); ?>  onkeyup="validate_length('tweet_form_update')"  />
				</form>
			
			<hr />
			
			<?php require("tag_table.php"); ?><br />
			
			<hr />
			
			<div class="center"><h2>New Tweet!</h2></div>
			
			<?php // New Tweet Forms ?>
			
			<div class="table_desc" id="tweet_link">New Tweet</div>
			<form action="?action=new_tweet" method="post" name="new_form" id="new_tweet">
				<div class="vcenter">
					<textarea form="new_tweet" name="new_text" id="tweet_form_new" class="tweet_box" onchange ="update_char_remain('tweet_form_new', 'char_remain_new')" onkeyup ="update_char_remain('tweet_form_new', 'char_remain_new')">New Message...</textarea><span class="char_remain" id="char_remain_new">140</span>
				</div><div class="float_clear" />
				<br />
				<table>
					<tr>
						<td class ="table_desc" width="150">
							Sort Number(default = 999)
						</td>
						<td class ="table_desc"  width="150">
							Max Iterations(default = 25)
						</td>
						<td class ="table_desc" width="150">
							Enabled
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="new_sort" maxlength="4" size="4" value=""  />
						</td>
						<td>
							<input type="text" name="new_max" value="" size="4" maxlength="4"  />
						</td>
						<td>
							<input type="checkbox" name="new_enabled" />
						</td>
					</tr>
				</table>
				
				<input type="submit" name="new_submit" value="New Tweet!" onkeyup="validate_length('tweet_form_new')" />
			</form>