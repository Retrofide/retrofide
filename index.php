<?php  
include("includes/includedFiles.php");
?>

<h2 id="mainContentH1">Featured Games</h2>

<div class="gridViewContainer">
	
	<?php
		$gameQuery = mysqli_query($con, "SELECT * FROM games ORDER BY RAND() LIMIT 4");

		while($row = mysqli_fetch_array($gameQuery)) {

			echo "<div class='gridViewItem'>
				<span role='link' tabindex='0' onclick='openPage(\"game.php?id=" . $row['id'] . "\")'>
					<img src='" . $row['artworkPath'] . "'>

					<div class='gridViewInfo'>"
						. $row['title'] .
					"</div>
				</span>

			</div>";
		}
	?>
</div>
