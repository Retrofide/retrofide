<?php
include("includes/includedFiles.php");

if(isset($_GET['term'])) {
    $term = urldecode($_GET['term']);

} else {
    $term = '';
}

?>

<div class="searchContainer">
<h4>Search by Artist, Style, Game, or Console</h4>
<input type="text" class="searchInput" value="<?php echo $term; ?>" placeholder="search for..." onfocus="var temp_value=this.value; 
this.value=''; this.value=temp_value" spellcheck="false">
</div>

<script>

    $(".searchInput").focus();

$(function() {
    var timer;

    $(".searchInput").keyup(function() {
        clearTimeout(timer);

        timer = setTimeout(function() {
            var val = $(".searchInput").val();
            openPage("search.php?term=" + val);
        }, 50);

    })

})

</script>

<?php if($term == "") exit(); ?>

<div class="tracklistContainer">
    <h2>Songs</h2>
	<ul class="tracklist">

		<?php

		$songsQuery = mysqli_query($con, "SELECT id FROM songs WHERE title LIKE '%$term%' LIMIT 10");

		if(mysqli_num_rows($songsQuery) == 0) {
			echo "<span class='noResults2'>No songs found for " . $term . "</span>";
		}

			$songIdArray = array();

			$i = 1;
			while($row = mysqli_fetch_array($songsQuery)) {
				
				if($i > 15) {
					break;
                }

                array_push($songIdArray, $row['id']);
                
				//$gameSong->getTitle();
				$gameSong = new Song($con, $row['id']);
				$gameArtist = $gameSong->getArtist();

				echo "<li class='tracklistRow'>
						<div class='trackCount'>
							<img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $gameSong->getId() . "\", tempPlaylist, true)'>
							<span class='trackNumber'>$i</span>
						</div>

						<div class='trackInfo'>
						<span class='trackName'>" . $gameSong->getTitle() . "</span>
						<span class='artistName'>" . $gameArtist->getName() . "</span>
						</div>

						<div class='trackOptions'>
							<img class='optionsButton' src='assets/images/icons/more.png'>
						</div>

						<div class='trackDuration'>
							<span class='duration'>" . $gameSong->getDuration() . "</span>
						</div>
			 			</li>";

					$i++;

			}

		?>

		<script>
			var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
			tempPlaylist = JSON.parse(tempSongIds);
		</script>

	</ul>

</div>

<div class="artistsContainer">

            <h2>Artists</h2>
            <?php
            $artistsQuery = mysqli_query($con, "SELECT id FROM artists WHERE name LIKE '%$term%' LIMIT 10");

            if(mysqli_num_rows($artistsQuery) == 0) {
                echo "<span class='noResults'>No artists found for " . $term . "</span>";
            }

            while($row = mysqli_fetch_array($artistsQuery)) {
                $artistFound = new Artist($con, $row['id']);
                echo "<div class='searchResultRow'>
                        <div class='artistName'></div>
                            <span role='link' tabindex='0' onclick='openPage(\"artist.php?id=" . $artistFound->getId() . "\")'>
                            "
                            . $artistFound->getName() .
                            "
                            </span>
                    </div>";
            }

            ?>

</div>

<div class="gridViewContainerSearch">
	<h2>Games</h2>
	<?php
		$gameQuery = mysqli_query($con, "SELECT * FROM games WHERE title LIKE '%$term%' LIMIT 10");

        if(mysqli_num_rows($gameQuery) == 0) {
            echo "<span class='noResults'>No games found for " . $term . "</span>";
        }

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











