<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();
$artist_array = $database->selectArtists();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Welcome to MusicPlay: Users</title>
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
    }

    h2 {
      font-size: 15px;
      margin-top: 10px;
    }

    h3 {
      font-size: 15px;
      margin-top: 8px;
    }

    h4{
      font-size: 12px;
    }

    p {
      text-align: center;
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

  <h1>Artists of this website are displayed here!</h1>
  <p>Browse through them! Click on them to see their released songs!</p>

<div style="margin: 20px; font-family: Arial;">
    <h2>Artists Result:</h2>
    <table style="border-collapse: collapse; width: 100%;">
        <tr>
            <th style="border: 1px solid #000; padding: 8px; background-color: #ca8dfd; color: #fff;">Artist ID</th>
            <th style="border: 1px solid #000; padding: 8px; background-color: #ca8dfd; color: #fff;">Artist Name</th>
            <th style="border: 1px solid #000; padding: 8px; background-color: #ca8dfd; color: #fff;">Artist Age</th>
        </tr>
        <?php $rowColor = '#f9f9f9'; ?>
        <?php foreach ($artist_array as $artist) : ?>
            <tr style="background-color: <?php echo $rowColor; ?>;">
                <td style="border: 1px solid #000; padding: 8px;">
                    <form method="POST" action="artistsongs.php">
                        <input type="hidden" name="artistid" value="<?php echo $artist['KID']; ?>">
                        <button type="submit" style="border: none; background-color: transparent; cursor: pointer; text-decoration: underline; color: 
                        #b042ff; font-size: 16px;">
                            <?php echo $artist['KID']; ?>
                        </button>
                    </form>
                </td>
                <td style="border: 1px solid #000; padding: 8px; font-size: 14px;"><?php echo $artist['KNAME']; ?></td>
                <td style="border: 1px solid #000; padding: 8px; font-size: 14px;"><?php echo $artist['KALTER']; ?></td>
            </tr>
            <?php $rowColor = ($rowColor == '#f9f9f9') ? '#fff' : '#f9f9f9'; ?>
        <?php endforeach; ?>
    </table>
</div>




</body>
</html>
