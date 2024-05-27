<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variables from POST request

$songname = '';
if(isset($_POST['songname'])){
    $songname = $_POST['songname'];
}

$laenge = '';
if(isset($_POST['laenge'])){
    $laenge = $_POST['laenge'];
}


// Insert method
$success = $database->insertIntoSong($songname, $laenge);

// Check result
if ($success){
    echo "Song '{$songname}' successfully added!'";
}
else{
    echo "Error can't insert Song '{$songname}'!";
}
?>

<!-- link back to user page-->
<br>
<a href="songs.php">
    go back
</a>