<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();
$artist_array = $database->selectArtists();

$username1 = '';
if(isset($_GET['username1'])){
    $username1 = $_GET['username1'];
}

$username2 = '';
if(isset($_GET['username2'])){
    $username2 = $_GET['username2'];
}

if($username1!='' && $username2!='') {
    if($username1==$username2) {
        $errorcode=1;
    }
    else {
        $result = $database->insertFollower($username1, $username2);
        $errorcode = $result['errorcode'];
        $friendnum = $result['friendnum'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Follow</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        ul.navbar {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #ca8dfd;
        }

        ul.navbar li {
            float: left;
        }

        ul.navbar li a:hover {
            background-color: #b042ff;
        }

        ul.navbar li a {
            display: block;
            padding: 10px 15px;
            text-decoration: none;
            color: #ffffff;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            font-size: 20px;
            margin: 30px;
        }

        input[type="text"],
        input[type="submit"] {
            font-family: Arial, sans-serif;
        }

        input[type="text"] {
            margin-left: 10px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            margin-left: 10px;
            background-color: #ca8dfd;
            color: #ffffff;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #b042ff;
        }

        .form-label {
            margin-left: 10px;
        }

        .message {
            margin: 20px;
            font-family: Arial;
        }

        .success-message {
            color: green;
        }

        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <ul class="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a href="users.php">Users</a></li>
        <li><a href="artists.php">Artists</a></li>
        <li><a href="bands.php">Bands</a></li>
        <li><a href="songs.php">Songs</a></li>
        <li><a href="addfollower.php">Add Follower</a></li>
    </ul>

    <h1>On this page you can add two usernames: User1 will follow User2!</h1>
    <form action="addfollower.php" method="GET">
        <label class="form-label" for="username1">Enter username 1:</label>
        <br>
        <input type="text" name="username1" id="username1" required>
        <br><br>

        <label class="form-label" for="username2">Enter username 2:</label>
        <br>
        <input type="text" name="username2" id="username2" required>
        <br><br>

        <input type="submit" value="Add Follower">
    </form>

    <div class="message">
        <?php
        if ($username1 != '' && $username2 != '') {
            if ($username1 == $username2) {
                echo '<p class="error-message">User \'' . $username1 . '\' couldn\'t follow \'' . $username2 . '\'!</p>';
            } else {
                if ($errorcode == 0) {
                    echo '<p class="success-message">User \'' . $username1 . '\' followed \'' . $username2 . '\'!</p>';
                    echo '<p class="success-message">This user is now following ' . $friendnum . ' users!</p>';
                } elseif ($errorcode == 1) {
                    echo '<p class="error-message">User \'' . $username1 . '\' couldn\'t follow \'' . $username2 . '\'!</p>';
                }
            }
        }
        ?>
    </div>

    <div style="margin: 20px; font-family: Arial;">
    </div>
</body>
</html>
