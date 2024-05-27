<!DOCTYPE html>
<html>
<head>
  <title>Welcome to MusicPlay: Your personal music website</title>
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
      margin-top: 100px;
      font-size: 36px;
    }

    h1 .music {
      color: #ca8dfd;
    }

    h1 .play {
      color: black;
    }

    h2 {
      text-align: center;
      font-size: 24px;
      color: #333;
      margin-top: 20px;
    }

    h3 {
      text-align: center;
      font-size: 20px;
      color: #333;
      margin-top: 30px;
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

  <h1>Welcome to <span class="music">Music</span><span class="play">Play</span></h1>
  <h2>Your personal music website</h2>
  <h3>Hover over the navigation bar to find all the features!
  </h3>
</body>
</html>
