<?php 

// include("includes/includedFiles.php"); 
include("includes/includedFiles.php");

if(isset($_GET['id'])) {
	$gameId = $_GET['id'];
} 
else {
	header("Location: index.php");
}

$game = new Game($con, $gameId);
$console = $game->getConsole();
$publisher = $game->getPublisher();
?>

<div class="entityInfo">
	<div class="leftSection">
		<img src="<?php echo $game->getArtworkPath(); ?>">
	</div>
	<div class="rightSection">
		<h2><?php echo $game->getTitle();?></h2>
		<p><?php echo $console->getName();?></p>
		<p><?php echo $publisher->getName();?></p>
		<p><?php echo $game->getNumberOfSongs();?><?php echo ngettext(" Song", " Songs", $game->getNumberOfSongs()); ?></p>
	</div>
</div>

<div class="tracklistContainer">
	<ul class="tracklist">

		<?php
			$songIdArray = $game->getSongIds();


			$i = 1;
			foreach($songIdArray as $songId) {
				
				
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
/*
			function checkPlay() {
			var imageName = audioElement.audio.muted ? "volume-mute.png" : "assets/images/icons/play-white.png";
			$(".controlButton.volume img").attr("src", "assets/images/icons/" + imageName).is(':visible');

			var isVisible = audioElement.audio.muted;

			if (isVisible == true) {
				$(".volumeBar .progress").css("visibility","hidden");
			} else {
				$(".volumeBar .progress").css("visibility","visible");
			}
			}
*/
		</script>

	</ul>

</div>

