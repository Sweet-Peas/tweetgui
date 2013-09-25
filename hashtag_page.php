<div class="center"><h2>Hashtag List</h2></div>
			
			<?php require("hashtag_table.php"); ?><br />
			
			<hr />
			
			<div class="center"><h2>Update or Remove Hashtag!</h2></div>
			<?php
			if (!isset($_GET["show_id"])){
				// no show_id exists, disable all update/remove form and ask for hashtag selection
				$disable_form = 1;
				echo "<span class=\"notice\">Please select a hashtag from the list above to edit or remove.</span>";
				
				$tag = "";
				$hashtag = "";
				$desc = "";
			}
			else{
				$disable_form = 0;
				
				$sql = "SELECT * FROM hashtags WHERE hashtagID = " . return_GET("show_id");
				$result = mysqli_query($conn, $sql) or die("Something went wrong.");
				$row = mysqli_fetch_assoc($result);
				
				$tag = htmlentities($row["tag"]);
				$hashtag = htmlentities($row["hashTag"]);
				$desc = htmlentities($row["description"]);
				
				
				
			}
			?>
			
			<form action="?p=h&action=update_hashtag<?php 
			if (isset($_GET["show_id"])){
				echo "&update_id=" . $_GET["show_id"];
			}
			?>" method="post" id="form_update_hashtag">
				<table>
					<tr>
						<td width="100">
							Tag:
						</td>
						<td>
							<input type="text" name="update_tag" value="<?php echo $tag ?>" maxvalue="8" size="32" <?php disabled_form($disable_form); ?> />
						</td>
					</tr>
					<tr>
						<td width="100">
							Hashtag: 
						</td>
						<td>
							<input type="text" name="update_hashtag" value="<?php echo $hashtag ?>" maxvalue="64" size="32" <?php disabled_form($disable_form); ?> />
						</td>
					</tr>
					<tr>
						<td width="100">
							Description:
						</td>
						<td>
							<input type="text" name="update_desc" value="<?php echo $desc ?>" maxvalue="128" size="32" <?php disabled_form($disable_form); ?> /><br />
						</td>
					</tr>
				</table>
				<input type="submit" name="update_submit" value="Update"<?php disabled_form($disable_form); ?> />
			</form>
			
			<br />
			<hr />
			
			<div class="center"><h2>New Hashtag!</h2></div>
			
			<form action="?action=new_hashtag" method="post" id="form_new_hashtag">
				<table>
					<tr>
						<td width="100">
							Tag:
						</td>
						<td>
							<input type="text" name="new_tag" value="" maxvalue="8" size="32" />
						</td>
					</tr>
					<tr>
						<td width="100">
							Hashtag:
						</td>
						<td>
							<input type="text" name="new_hashtag" value="" maxvalue="64" size="32" />
						</td>
					</tr>
					<tr>
						<td width="100">
							Description: 
						</td>
						<td>
							<input type="text" name="new_desc" value="" maxvalue="128" size="32" /><br />
						</td>	
					</tr>
				</table>
				<input type="submit" name="update_submit" value="New Hashtag!" />
			</form>