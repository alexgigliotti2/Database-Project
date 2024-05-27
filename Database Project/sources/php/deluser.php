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

// Delete method
$success = $database->deleteUser($username);

// Check result
if ($success){
    echo "User with Username: '{$username}' successfully deleted!'";
}
else{
    echo "Error can't delete User with Username: '{$username}'.";
}
?>

<!-- link back to index page-->
<br>
<a href="users.php">
    go back
</a>