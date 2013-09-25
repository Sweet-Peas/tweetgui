<div class="menu_item">
				<a href="index.php">
					<img src="images/menu_tweet<?php //Checks whether p is not h, if not, then print tweet selection picture.
					if(isset($_GET["p"])){
							if($_GET["p"]!="h"){
							echo "_selected";
						}
					}
					else { //If not true, then default to tweet picture.
						echo "_selected";
					}
					?>.png" alt="" />
				</a>
			</div>
			<div class="menu_item">
				<a href="?p=h">
					<img src="images/menu_hashtag<?php // Checks whether p = h, then print hashtag selection picture.
					if(isset($_GET["p"])){
						if($_GET["p"]=="h"){
							echo "_selected";
						}
					}
					?>.png" alt="" />
				</a>
			</div>