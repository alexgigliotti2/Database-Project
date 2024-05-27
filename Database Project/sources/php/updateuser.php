<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variable id from POST request
$username = '';
if(isset($_POST['username'])){
    $username = $_POST['username'];
}

$land = '';
if(isset($_POST['land'])){
    $land = $_POST['land'];
}

$fav_genre = '';
if(isset($_POST['fav_genre'])){
    $fav_genre = $_POST['fav_genre'];
}



// Update method
$success = $database->updateUser($username, $land, $fav_genre);

// Check result
if ($success){
    echo "User with Username: '{$username}' updated successfully!'";
}
else{
    echo "Error: can't update User with Username: '{$username}'.";
}
?>

<!-- link back to index page-->
<br>
<a href="users.php">
    go back
</a>