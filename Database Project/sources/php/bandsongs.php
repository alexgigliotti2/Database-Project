<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variable id from POST request
$artistid = '';
if(isset($_POST['artistid'])){
    $artistid = $_POST['artistid'];
}

// Get playlists of user
$artistsongs = $database->getSongsOfBand($artistid);

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
    <h2>Band: <?php echo $artistid; ?></h2>

    <h3>Songs from this Band:</h3>
    <?php if (!empty($artistsongs)): ?>
        <table style="border-collapse: collapse; width: 100%;">
            <tr>
                <th style="border: 1px solid #000; padding: 8px; background-color: #ca8dfd; color: #fff;">Song ID</th>
                <th style="border: 1px solid #000; padding: 8px; background-color: #ca8dfd; color: #fff;">Song Name</th>
                <th style="border: 1px solid #000; padding: 8px; background-color: #ca8dfd; color: #fff;">Song Length</th>
            </tr>
            <?php $rowColor = '#f9f9f9'; ?>
            <?php foreach ($artistsongs as $song): ?>
                <tr style="background-color: <?php echo $rowColor; ?>;">
                    <td style="border: 1px solid #000; padding: 8px;"><?php echo $song['SONGID']; ?></td>
                    <td style="border: 1px solid #000; padding: 8px;"><?php echo $song['SONGNAME']; ?></td>
                    <td style="border: 1px solid #000; padding: 8px;"><?php echo $song['LAENGE']; ?></td>
                </tr>
                <?php $rowColor = ($rowColor == '#f9f9f9') ? '#fff' : '#f9f9f9'; ?>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No songs found for this band.</p>
    <?php endif; ?>

    <br>
    <a href="bands.php">Go Back</a>
</div>

</body>
</html>
