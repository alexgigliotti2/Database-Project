<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variables from POST request
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


// Insert method
$success = $database->insertIntoUser($username, $land, $fav_genre);

// Check result
if ($success){
    echo "User '{$username}' successfully added!'";
}
else{
    echo "Error can't insert User '{$username}'!";
}
?>

<!-- link back to user page-->
<br>
<a href="users.php">
    go back
</a>