<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variable id from POST request
$username = '';
if (isset($_POST['username'])) {
    $username = $_POST['username'];
}

// Get playlists of user
$playlists = $database->getPlaylistsOfUser($username);
$follower = $database->getFollowerOfUser($username);
$historie = $database->getHistorieOfUser($username);

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 20px;
        }

        h2 {
            margin-top: 0;
        }

        .playlist {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Username: <?php echo $username; ?></h2>

    <h3>Playlists:</h3>
    <?php if (!empty($playlists)): ?>
        <table style="border-collapse: collapse; width: 100%;">
            <tr>
                <th style="border: 1px solid #000; padding: 8px; background-color: #ca8dfd; color: #fff;">Title</th>
                <th style="border: 1px solid #000; padding: 8px; background-color: #ca8dfd; color: #fff;">Song Count</th>
                <th style="border: 1px solid #000; padding: 8px; background-color: #ca8dfd; color: #fff;">Genre</th>
            </tr>
            <?php $rowColor = '#f9f9f9'; ?>
            <?php foreach ($playlists as $playlist): ?>
                <tr style="background-color: <?php echo $rowColor; ?>;">
                    <td style="border: 1px solid #000; padding: 8px;"><?php echo $playlist['LISTNAME']; ?></td>
                    <td style="border: 1px solid #000; padding: 8px;"><?php echo $playlist['SONG_ANZAHL']; ?></td>
                    <td style="border: 1px solid #000; padding: 8px;"><?php echo $playlist['GENRE']; ?></td>
                </tr>
                <?php $rowColor = ($rowColor == '#f9f9f9') ? '#fff' : '#f9f9f9'; ?>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No playlists found for this user.</p>
    <?php endif; ?>

    <h3>Follows:</h3>
    <?php if (!empty($follower)): ?>
        <table style="border-collapse: collapse; width: 100%;">
            <tr>
                <th style="border: 1px solid #000; padding: 8px; background-color: #ca8dfd; color: #fff;">User</th>
            </tr>
            <?php $rowColor = '#f9f9f9'; ?>
            <?php foreach ($follower as $follow): ?>
                <tr style="background-color: <?php echo $rowColor; ?>;">
                    <td style="border: 1px solid #000; padding: 8px;"><?php echo $follow['USERNAME2']; ?></td>
                </tr>
                <?php $rowColor = ($rowColor == '#f9f9f9') ? '#fff' : '#f9f9f9'; ?>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No follows found for this user.</p>
    <?php endif; ?>

    <h3>History:</h3>
    <?php if (!empty($historie)): ?>
        <table style="border-collapse: collapse; width: 100%;">
            <tr>
                <th style="border: 1px solid #000; padding: 8px; background-color: #ca8dfd; color: #fff;">Song Name</th>
                <th style="border: 1px solid #000; padding: 8px; background-color: #ca8dfd; color: #fff;">Place</th>
                <th style="border: 1px solid #000; padding: 8px; background-color: #ca8dfd; color: #fff;">Date</th>
            </tr>
            <?php $rowColor = '#f9f9f9'; ?>
            <?php foreach ($historie as $history): ?>
                <tr style="background-color: <?php echo $rowColor; ?>;">
                    <td style="border: 1px solid #000; padding: 8px;"><?php echo $history['SONGNAME']; ?></td>
                    <td style="border: 1px solid #000; padding: 8px;"><?php echo $history['ORT']; ?></td>
                    <td style="border: 1px solid #000; padding: 8px;"><?php echo $history['DATUM']; ?></td>
                </tr>
                <?php $rowColor = ($rowColor == '#f9f9f9') ? '#fff' : '#f9f9f9'; ?>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No history found for this user.</p>
    <?php endif; ?>

    <br>
    <a href="users.php">Go Back</a>
</div>

</body>
</html>
