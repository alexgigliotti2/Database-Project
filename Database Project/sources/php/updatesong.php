<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variable id from POST request
$songid = '';
if(isset($_POST['songid'])){
    $songid = $_POST['songid'];
}

$songname = '';
if(isset($_POST['songname'])){
    $songname = $_POST['songname'];
}

$laenge = '';
if(isset($_POST['laenge'])){
    $laenge = $_POST['laenge'];
}


// Update method
$success = $database->updateSong($songid, $songname, $laenge);

// Check result
if ($success){
    echo "Song with SongID: '{$songid}' updated successfully!'";
}
else{
    echo "Error: can't update Song with SongID: '{$songid}'.";
}
?>

<!-- link back to index page-->
<br>
<a href="songs.php">
    go back
</a>