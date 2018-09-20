<?php include("includes/header.php"); 

if(isset($_GET['id'])) {
	$songId = $_GET['id'];
} 
else {
	header("Location: index.php");
}

$song = new Game($con, $songId);

echo $song->getSong();

?>


<?php include("includes/footer.php"); ?>