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

// Delete method
$success = $database->deleteSong($songid);

// Check result
if ($success){
    echo "Song with SongID: '{$songid}' successfully deleted!'";
}
else{
    echo "Error can't delete Song with SongID: '{$songid}'.";
}
?>

<!-- link back to index page-->
<br>
<a href="songs.php">
    go back
</a>