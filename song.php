<?php 

// include("includes/header.php");
include("includes/includedFiles.php"); 

if(isset($_GET['id'])) {
	$songId = $_GET['id'];
} 
else {
	header("Location: index.php");
}

$song = new Song($con, $songId);

$artist = new Artist($con, $songId);

?>

<div class="entityInfo">
	<div class="leftSection">
		<img src="<?php echo $song->getArtworkPath(); ?>">
	</div>
	<div class="rightSection">
		<h2><?php echo $song->getTitle();?></h2>
		<span>By <?php echo $artist->getName();?></span>
	</div>
</div>
<!--
<div class="bgInfoDiv">
		<div id="bgInfo1">art by: <a href="https://sukeart.artstation.com/" target="_blank">Suke</a></div>
		<div id="bgInfo2"><a href="https://www.riotgames.com/" target="_blank">Riot Games Entertainment</div>
	</div>
-->

<?php include("includes/footer.php"); ?>