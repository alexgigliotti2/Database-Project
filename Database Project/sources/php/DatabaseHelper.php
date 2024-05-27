<?php

class DatabaseHelper
{
    // Since the connection details are constant, define them as const
    // We can refer to constants like e.g. DatabaseHelper::username
    const username = 'xxx'; 
    const password = 'xxx';
    const con_string = 'oracle19.cs.univie.ac.at:1521/orclcdb'; 

    protected $conn;

    // Create connection in the constructor
    public function __construct()
    {
        try {
            $this->conn = oci_connect(
                DatabaseHelper::username,
                DatabaseHelper::password,
                DatabaseHelper::con_string
            );

            //check if the connection object is != null
            if (!$this->conn) {
                // die(String(message)): stop PHP script and output message:
                die("DB error: Connection can't be established!");
            }

        } catch (Exception $e) {
            die("DB error: {$e->getMessage()}");
        }
    }

    // Used to clean up
    public function __destruct()
    {
        // clean up
        oci_close($this->conn);
    }

    
    public function selectUsers($username, $land, $fav_genre)
    {

        $sql = "SELECT * FROM USERIN
            WHERE USERNAME LIKE '%{$username}%'
              AND upper(LAND) LIKE upper('%{$land}%')
              AND upper(FAV_GENRE) LIKE upper('%{$fav_genre}%')
            ORDER BY USERNAME ASC";


        $statement = oci_parse($this->conn, $sql);

        oci_execute($statement);

        oci_fetch_all($statement, $res, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);

        //clean up;
        oci_free_statement($statement);

        return $res;
    }

    public function selectSongs($songid, $songname, $laenge)
    {
    
        if($songid=='') {
        $sql = "SELECT * FROM SONG
            WHERE SONGID LIKE '%{$songid}%'
              AND upper(SONGNAME) LIKE upper('%{$songname}%')
              AND upper(LAENGE) LIKE upper('%{$laenge}%')
            ORDER BY SONGID ASC";
        }
        if($songid!='') {
            $sql = "SELECT * FROM SONG
            WHERE SONGID ='{$songid}'
              AND upper(SONGNAME) LIKE upper('%{$songname}%')
              AND upper(LAENGE) LIKE upper('%{$laenge}%')
            ORDER BY SONGID ASC";
        }

       
        $statement = oci_parse($this->conn, $sql);

        
        oci_execute($statement);

        oci_fetch_all($statement, $res, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);

        //clean up;
        oci_free_statement($statement);

        return $res;
    }

    public function selectArtists()
    {

        $sql = "SELECT * FROM SINGLEKUENSTLER";

        
        $statement = oci_parse($this->conn, $sql);

        // Executes the statement
        oci_execute($statement);

       
        oci_fetch_all($statement, $res, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);

        //clean up;
        oci_free_statement($statement);

        return $res;
    }

    public function selectBands()
    {

        $sql = "SELECT * FROM BANDKUENSTLER";

        $statement = oci_parse($this->conn, $sql);

        // Executes the statement
        oci_execute($statement);

        oci_fetch_all($statement, $res, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);

        //clean up;
        oci_free_statement($statement);

        return $res;
    }
	

    public function insertIntoPerson($name, $surname)
    {
        $sql = "INSERT INTO PERSON (NAME, SURNAME) VALUES ('{$name}', '{$surname}')";

        $statement = oci_parse($this->conn, $sql);
		$success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;
    }

    public function insertIntoUser($username, $land, $fav_genre)
    {
        $sql = "INSERT INTO USERIN (USERNAME, LAND, FAV_GENRE) VALUES ('{$username}', '{$land}','{$fav_genre}')";

        $statement = oci_parse($this->conn, $sql);
		$success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;
    }

    public function insertIntoSong($songname, $laenge)
    {
        $sql = "INSERT INTO SONG (SONGNAME, LAENGE) VALUES ('{$songname}','{$laenge}')";

        $statement = oci_parse($this->conn, $sql);
		$success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;
    }

   

    public function deleteUser($username)
    {
        if($username=='') {
            $success = false;
            return $success;
        }
        
        $sql = "DELETE FROM USERIN WHERE USERNAME = '{$username}'";

        $statement = oci_parse($this->conn, $sql);
		$success = oci_execute($statement) && oci_commit($this->conn);

        if (oci_num_rows($statement) == 0) {
            $success = false;
        }
        oci_free_statement($statement);


        return $success;
    }


    public function deleteSong($songid)
    {
        if($songid=='') {
            $success = false;
            return $success;
        }
        
        $sql = "DELETE FROM SONG WHERE SONGID = '{$songid}'";

        $statement = oci_parse($this->conn, $sql);
		$success = oci_execute($statement) && oci_commit($this->conn);

        if (oci_num_rows($statement) == 0) {
            $success = false;
        }
        oci_free_statement($statement);


        return $success;
    }

    public function updateUser($username, $land, $fav_genre)
    {
        $sql = "UPDATE USERIN SET land = '{$land}', fav_genre = '{$fav_genre}' WHERE USERNAME = '{$username}'";

        $statement = oci_parse($this->conn, $sql);
		$success = oci_execute($statement) && oci_commit($this->conn);

        if (oci_num_rows($statement) == 0) {
            $success = false;
        }
        oci_free_statement($statement);
        return $success;
    }

    public function updateSong($songid, $songname, $laenge)
    {
        $sql = "UPDATE SONG SET SONGNAME = '{$songname}', LAENGE = '{$laenge}' WHERE SONGID = '{$songid}'";

        $statement = oci_parse($this->conn, $sql);
		$success = oci_execute($statement) && oci_commit($this->conn);

        if (oci_num_rows($statement) == 0) {
            $success = false;
        }
        oci_free_statement($statement);
        return $success;
    }


    public function getPlaylistsOfUser($username)
    {
        $sql = "SELECT * FROM PLAYLIST
            WHERE USERNAME = '{$username}'";

        $statement = oci_parse($this->conn, $sql);

        oci_execute($statement);

        oci_fetch_all($statement, $res, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);

        //clean up;
        oci_free_statement($statement);

        return $res;
    }


    public function getSongsOfArtist($artistid)
    {
        $sql = "SELECT * FROM ARTISTSONGS
            WHERE KID = '{$artistid}'";

        $statement = oci_parse($this->conn, $sql);

        oci_execute($statement);

        oci_fetch_all($statement, $res, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);

        //clean up;
        oci_free_statement($statement);

        return $res;
    }

    public function getSongsOfBand($artistid)
    {
        $sql = "SELECT * FROM BANDSONGS
            WHERE KID = '{$artistid}'";

        $statement = oci_parse($this->conn, $sql);

        oci_execute($statement);

        oci_fetch_all($statement, $res, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);

        //clean up;
        oci_free_statement($statement);

        return $res;
    }

    public function insertFollower($username1, $username2)
    {
        $errorcode = 1;
        $friendnum = 0;
        $sql = 'BEGIN InsertFollower(:username1, :username2, :errorcode, :friendnum); END;';
        $statement = oci_parse($this->conn, $sql);
    
        oci_bind_by_name($statement, ':username1', $username1);
        oci_bind_by_name($statement, ':username2', $username2);
        oci_bind_by_name($statement, ':errorcode', $errorcode);
        oci_bind_by_name($statement, ':friendnum', $friendnum);

        oci_execute($statement);

        oci_free_statement($statement);



        return ['errorcode' => $errorcode, 'friendnum' => $friendnum];
    }

    public function getFollowerOfUser($username)
    {
        $sql = "SELECT * FROM FOLGT
            WHERE USERNAME = '{$username}'";

        $statement = oci_parse($this->conn, $sql);

        oci_execute($statement);

        oci_fetch_all($statement, $res, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);

        //clean up;
        oci_free_statement($statement);

        return $res;
    }

    public function getHistorieOfUser($username)
    {
        $sql = "SELECT songname, ort, datum
        FROM UserHistorie
        WHERE username = '{$username}'";

        $statement = oci_parse($this->conn, $sql);

        oci_execute($statement);

        oci_fetch_all($statement, $res, 0, 0, OCI_FETCHSTATEMENT_BY_ROW);

        //clean up;
        oci_free_statement($statement);

        return $res;
    }

}