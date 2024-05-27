<?php
require_once('DatabaseHelper.php');

$database = new DatabaseHelper();

$username = '';
if (isset($_GET['username'])) {
    $username = $_GET['username'];
}

$land = '';
if (isset($_GET['land'])) {
    $land = $_GET['land'];
}

$fav_genre = '';
if (isset($_GET['fav_genre'])) {
    $fav_genre = $_GET['fav_genre'];
}
$user_array = $database->selectUsers($username, $land, $fav_genre);
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

  .user-modifiers {
  display: flex;
  justify-content: center;
  margin: 10px;
}

.search-user,
.add-user, .del-user, .update-user {
  flex: 0 0 250px;
  margin: 10px;
  padding: 20px;
  background-color: #ebebeb;
}

.search-user input[type="text"],
.search-user select,
.add-user input[type="text"],
.add-user select,.del-user input[type="text"],
.del-user select, .update-user input[type="text"],
.update-user select{
  margin-bottom: 5px;
  padding: 8px;
  width: 100%;
  box-sizing: border-box;
  font-size: 14px;
}

.search-user button,
.add-user button,
.del-user button, 
.update-user button {
  padding: 10px 20px;
  background-color: #ca8dfd;
  color: #fff;
  border: none;
  cursor: pointer;
  font-size: 14px;
}

.search-user button:hover,
.add-user button:hover,
.del-user button:hover, .update-user button:hover {
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

  <h1>Users of this website are displayed here!</h1>
  <p>Consider yourself the admin: You can add & delete users, and even modify their information below.</p>

  <div class="user-modifiers">
  <div class="search-user">
    <h2>Search User:</h2>
    <form method="GET" action="users.php">
      <input type="text" name="username" placeholder="Username">
      <br>
      <input type="text" name="land" placeholder="Country">
      <br>
      <input type="text" name="fav_genre" placeholder="Favorite Genre">
      <br>
      <button type="submit">Search</button>
    </form>
  </div>


  <div class="add-user">
    <h3>Add User:</h3>
    <form method="POST" action="adduser.php">
    <input type="text" name="username" placeholder="Username" required>
      <br>
      <input type="text" name="land" placeholder="Country" required>
      <br>
      <input type="text" name="fav_genre" placeholder="Favorite Genre" required>
      <br>
      <button type="submit">Add</button>
      </form>
  </div>

  <div class="del-user">
    <h3>Delete User:</h3>
    <form method="POST" action="deluser.php">
    <input type="text" name="username" placeholder="Username" required>
      <br>
      <button type="submit">Delete</button>
      </form>
  </div>

  <div class="update-user">
    <h3>Update User:</h3>
    <h4>Enter Username and put in new Country & Genre!</h4>
    <form method="POST" action="updateuser.php">
    <input type="text" name="username" placeholder="Username" required>
      <br>
      <input type="text" name="land" placeholder="Country" required>
      <br>
      <input type="text" name="fav_genre" placeholder="Favorite Genre" required>
      <br>
      <button type="submit">Update</button>
      </form>
  </div>
  </div>

<div style="margin: 20px; font-family: Arial;">
    <h2>User Search Result:</h2>
    <table style="border-collapse: collapse; width: 100%;">
        <tr>
            <th style="border: 1px solid #000; padding: 8px; background-color: #ca8dfd; color: #fff;">Username</th>
            <th style="border: 1px solid #000; padding: 8px; background-color: #ca8dfd; color: #fff;">Country</th>
            <th style="border: 1px solid #000; padding: 8px; background-color: #ca8dfd; color: #fff;">Fav_Genre</th>
        </tr>
        <?php $rowColor = '#f9f9f9'; ?>
        <?php foreach ($user_array as $user) : ?>
            <tr style="background-color: <?php echo $rowColor; ?>;">
                <td style="border: 1px solid #000; padding: 8px;">
                    <form method="POST" action="profile.php">
                        <input type="hidden" name="username" value="<?php echo $user['USERNAME']; ?>">
                        <button type="submit" style="border: none; background-color: transparent; cursor: pointer; text-decoration: underline; color: 
                        #b042ff; font-size: 16px;">
                            <?php echo $user['USERNAME']; ?>
                        </button>
                    </form>
                </td>
                <td style="border: 1px solid #000; padding: 8px; font-size: 14px;"><?php echo $user['LAND']; ?></td>
                <td style="border: 1px solid #000; padding: 8px; font-size: 14px;"><?php echo $user['FAV_GENRE']; ?></td>
            </tr>
            <?php $rowColor = ($rowColor == '#f9f9f9') ? '#fff' : '#f9f9f9'; ?>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>
