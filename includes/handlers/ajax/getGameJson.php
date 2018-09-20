<?php
include("../../config.php");

if(isset($_POST['gameId'])) {
    $gameId = $_POST['gameId'];

    $query = mysqli_query($con, "SELECT * FROM games WHERE id='$gameId'");

    $resultArray = mysqli_fetch_array($query);

    echo json_encode($resultArray);
}


?>