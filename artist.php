<?php 
include("includes/includedFiles.php"); 

if(isset($_GET['id'])) {
	$artistId = $_GET['id'];
} 
else {
	header("Location: notfound.php");
}

$artist = new Artist($con, $artistId);

?>

<div class="a">

    <div class="centerSection">

        <div class="artistInfo">

            <h1 class="artistName"><?php echo $artist->getName(); ?></h1>

            <div class="headerButtons">
                <button class="artistButton" onclick="playFirstSong()">PLAY</button>
            </div>

        </div>

    </div>

</div>

<div class="tracklistContainer">
    <h2>SONGS</h2>
	<ul class="tracklist">

		<?php
			$songIdArray = $artist->getSongIds();


			$i = 1;
			foreach($songIdArray as $songId) {

				if($i > 5) {
					break;
				}
					
				//$gameSong->getTitle();
				$gameSong = new Song($con, $songId);
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
