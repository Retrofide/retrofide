<?php

if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    include("includes/config.php");
    include("includes/classes/Console.php");
    include("includes/classes/Publisher.php");
    include("includes/classes/Game.php");
    include("includes/classes/Song.php");
    include("includes/classes/Artist.php");
} else {
    include("includes/header.php");
    include("includes/footer.php");

    $url = $_SERVER['REQUEST_URI'];
    echo "<script>openPage('$url')</script>";
    exit();
}

?>
