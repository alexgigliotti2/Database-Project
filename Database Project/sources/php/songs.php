<?php
require_once('DatabaseHelper.php');

$database = new DatabaseHelper();
$songid = '';
if (isset($_GET['songid'])) {
    $songid = $_GET['songid'];
}

$songname = '';
if (isset($_GET['songname'])) {
    $songname = $_GET['songname'];
}

$laenge = '';
if (isset($_GET['laenge'])) {
    $laenge = $_GET['laenge'];
}
$song_array = $database->selectSongs($songid, $songname, $laenge);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Welcome to MusicPlay: Songs</title>
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

  .song-modifiers {
  display: flex;
  justify-content: center;
  margin: 10px;
}

.search-song,
.add-song, .del-song, .update-song {
  flex: 0 0 250px;
  margin: 10px;
  padding: 20px;
  background-color: #ebebeb;
}

.search-song input[type="text"],
.search-song select,
.add-song input[type="text"],
.add-song select,.del-song input[type="text"],
.del-song select, .update-song input[type="text"],
.update-song select{
  margin-bottom: 5px;
  padding: 8px;
  width: 100%;
  box-sizing: border-box;
  font-size: 14px;
}

.search-song button,
.add-song button,
.del-song button, 
.update-song button {
  padding: 10px 20px;
  background-color: #ca8dfd;
  color: #fff;
  border: none;
  cursor: pointer;
  font-size: 14px;
}

.search-song button:hover,
.add-song button:hover,
.del-song button:hover, .update-song button:hover {
  background-color: #b042ff;
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

  <h1>Songs of this website are displayed here!</h1>
  <p>Consider yourself the admin: You can add & delete songs, and even modify their information below.</p>

  <div class="song-modifiers">
  <div class="search-song">
    <h2>Search Song:</h2>
    <form method="GET" action="songs.php">
      <input type="text" name="songid" pattern="[0-9]+" title="SongID must contain only numbers" placeholder="SongID">
      <br>
      <input type="text" name="songname" placeholder="Song Name">
      <br>
      <input type="text" name="laenge" placeholder="Song Length">
      <br>
      <button type="submit">Search</button>
    </form>
  </div>


  <div class="add-song">
    <h3>Add Song:</h3>
    <form method="POST" action="addsong.php">
      <input type="text" name="songname" placeholder="Song Name"  required>
      <br>
      <input type="text" name="laenge" placeholder="Song Length" required>
      <br>
      <button type="submit">Add</button>
      </form>
  </div>

  <div class="del-song">
    <h3>Delete Song:</h3>
    <form method="POST" action="delsong.php">
    <input type="text" name="songid" placeholder="Song ID" pattern="[0-9]+" title="SongID must contain only numbers" required>
      <br>
      <button type="submit">Delete</button>
      </form>
  </div>

  <div class="update-song">
    <h3>Update Song:</h3>
    <h4>Enter SongID and put in new Name & Length!</h4>
    <form method="POST" action="updatesong.php">
    <input type="text" name="songid" placeholder="Song ID" pattern="[0-9]+" title="SongID must contain only numbers" required>
      <br>
      <input type="text" name="songname" placeholder="Song Name" required>
      <br>
      <input type="text" name="laenge" placeholder="Song Length" required>
      <br>
      <button type="submit">Update</button>
      </form>
  </div>
  </div>

<div style="margin: 20px;">
  <h2>Song Search Result:</h2>
  <table style="border-collapse: collapse; width: 100%;">
    <tr>
        <th style="border: 1px solid #000; padding: 8px; background-color: #ca8dfd; color: #fff;">SongID</th>
        <th style="border: 1px solid #000; padding: 8px; background-color: #ca8dfd; color: #fff;">Song Name</th>
        <th style="border: 1px solid #000; padding: 8px; background-color: #ca8dfd; color: #fff;">Song Laenge</th>
    </tr>
    <?php $rowColor = '#f9f9f9'; ?>
    <?php foreach ($song_array as $song) : ?>
        <tr style="background-color: <?php echo $rowColor; ?>;">
            <td style="border: 1px solid #000; padding: 8px;"><?php echo $song['SONGID']; ?></td>
            <td style="border: 1px solid #000; padding: 8px;"><?php echo $song['SONGNAME']; ?></td>
            <td style="border: 1px solid #000; padding: 8px;"><?php echo $song['LAENGE']; ?></td>
        </tr>
        <?php $rowColor = ($rowColor == '#f9f9f9') ? '#fff' : '#f9f9f9'; ?>
    <?php endforeach; ?>
    </div>
</table>




</body>
</html>
