//Database Systems (Module IDS) 

import java.sql.*;
import java.util.ArrayList;


// The DatabaseHelper class encapsulates the communication with our database
class DatabaseHelper {
    // Database connection info
    private static final String DB_CONNECTION_URL = "jdbc:oracle:thin:@oracle19.cs.univie.ac.at:1521:orclcdb";
    private static final String USER = "xxx"; 
    private static final String PASS = "xxx";

    private static Statement stmt;
    private static Connection con;

    //CREATE CONNECTION
    DatabaseHelper() {
        try {
            //Loads the class into the memory
            //Class.forName(CLASSNAME);

            // establish connection to database
            con = DriverManager.getConnection(DB_CONNECTION_URL, USER, PASS);
            stmt = con.createStatement();

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    //INSERT INTO USERIN
    void insertIntoUserin(String username, String country, String fav_genre) {
        try {
            String sql = "INSERT INTO USERIN (USERNAME,LAND, FAV_GENRE) VALUES ('" + username + "','" +
                    country +
                    "', '" +
                    fav_genre +
                    "')";
            stmt.execute(sql);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoUserIn\nmessage: " + e.getMessage());
        }
    }
    
    //INSERT INTO PLAYLIST
    void insertIntoPlaylist(String username, String listname, int songcount, String genre) {
        try {
            String sql = "INSERT INTO PLAYLIST (USERNAME,LISTNAME, SONG_ANZAHL,GENRE) VALUES ('" + username + "','" +
                    listname +
                    "', '" +
                    songcount +
                    "','" + genre + "')";
            stmt.execute(sql);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoPlaylist\nmessage: " + e.getMessage());
        }
    }
    
    //INSERT INTO SONG
    void insertIntoSong( String songname, String length) {
        try {
            String sql = "INSERT INTO SONG (SONGNAME, LAENGE) VALUES ('" +
                    songname +
                    "', '" +
                    length + "')";
            stmt.execute(sql);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoWebSong\nmessage: " + e.getMessage());
        }
    }
    
    //INSERT INTO SingleKuenstler
    void insertIntoSingleKuenstler( String k_name, int k_age) {
        try {
            String sql = "INSERT INTO SINGLEKUENSTLER (KNAME,KALTER) VALUES ('" +
                    k_name +
                    "', '" +
                    k_age + "')";
            stmt.execute(sql);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoSingleKuenstler\nmessage: " + e.getMessage());
        }
    }
    
    //INSERT INTO BandKuenstler
    void insertIntoBandKuenstler(String k_name) {
        try {
            String sql = "INSERT INTO BANDKUENSTLER (KNAME) VALUES ('" + k_name + "')";
            stmt.execute(sql);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoBandKuenstler\nmessage: " + e.getMessage());
        }
    }

    //INSERT INTO Zeitpunkt
    void insertIntoZeitpunkt(String date, String place) {
        try {
            String sql = "INSERT INTO ZEITPUNKT (DATUM, ORT) VALUES ('" + date + "','" + place +  "')";
            stmt.execute(sql);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoZeitpunkt\nmessage: " + e.getMessage());
        }
    }
    
    //INSERT INTO SingleVeroeffentlicht
    void insertIntoSingleVeroeffentlicht(int kid, int songid) {
        try {
            String sql = "INSERT INTO SINGLEVEROEFFENTLICHT (KID,SONGID) VALUES ('" + kid + "','" +
                    songid +
                    "')";
            stmt.execute(sql);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoSingleVeroeffentlicht\nmessage: " + e.getMessage());
        }
    }
    
    //INSERT INTO BandVeroeffentlicht
    void insertIntoBandVeroeffentlicht(int kid, int songid) {
        try {
            String sql = "INSERT INTO BANDVEROEFFENTLICHT (KID,SONGID) VALUES ('" + kid + "','" +
                    songid +
                    "')";
            stmt.execute(sql);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoBandVeroeffentlicht\nmessage: " + e.getMessage());
        }
    }
    
    //INSERT INTO Folgt
    void insertIntoFolgt(String username1, String username2) {
        try {
            String sql = "INSERT INTO FOLGT (USERNAME,USERNAME2) VALUES ('" + username1 + "','" +
                    username2 +
                    "')";
            stmt.execute(sql);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoFolgt\nmessage: " + e.getMessage());
        }
    }
    
    
    //INSERT INTO Hoert
    void insertIntoHoert(String username, String date, String place, int songid) {
        try {
            String sql = "INSERT INTO HOERT (USERNAME, DATUM, ORT, SONGID) VALUES ('" + username + "','" +
            		date + "','" + place + "','" + songid + 
                    "')";
            stmt.execute(sql);
        } catch (Exception e) {
            System.err.println("Error at: insertIntoHoert\nmessage: " + e.getMessage());
        }
    }
    
    
    
    //SELECT USERNAME FROM USER
    ArrayList<String> selectUsernameFromWebUser() {
        ArrayList<String> usernames = new ArrayList<>();

        try {
            ResultSet rs = stmt.executeQuery("SELECT USERNAME FROM USERIN");
            while (rs.next()) {
                usernames.add(rs.getString("USERNAME"));
            }
            rs.close();
        } catch (Exception e) {
            System.err.println(("Error at: selectPersonIsFromPerson\n message: " + e.getMessage()).trim());
        }
        return usernames;
    }
    
    //SELECT SONGID FROM SONG
    ArrayList<Integer> selectSongIDfromSong() {
        ArrayList<Integer> songIDs = new ArrayList<>();

        try {
            ResultSet rs = stmt.executeQuery("SELECT SONGID FROM SONG");
            while (rs.next()) {
                songIDs.add(rs.getInt("SONGID"));
            }
            rs.close();
        } catch (Exception e) {
            System.err.println(("Error at: selectPersonIsFromPerson\n message: " + e.getMessage()).trim());
        }
        return songIDs;
    }
    
    //SELECT ARTISTID FROM SINGLEARTIST
    ArrayList<Integer> selectArtistIDfromSingleArtist() {
        ArrayList<Integer> artistIDs = new ArrayList<>();

        try {
            ResultSet rs = stmt.executeQuery("SELECT KID FROM SINGLEKUENSTLER");
            while (rs.next()) {
                artistIDs.add(rs.getInt("KID"));
            }
            rs.close();
        } catch (Exception e) {
            System.err.println(("Error at: selectPersonIsFromPerson\n message: " + e.getMessage()).trim());
        }
        return artistIDs;
    }
    
    //SELECT ARTISTID FROM BANDARTIST
    ArrayList<Integer> selectArtistIDfromBandArtist() {
        ArrayList<Integer> artistIDs = new ArrayList<>();

        try {
            ResultSet rs = stmt.executeQuery("SELECT KID FROM BANDKUENSTLER");
            while (rs.next()) {
                artistIDs.add(rs.getInt("KID"));
            }
            rs.close();
        } catch (Exception e) {
            System.err.println(("Error at: selectPersonIsFromPerson\n message: " + e.getMessage()).trim());
        }
        return artistIDs;
    }

    //SELECT ZEITPUNKT
    ArrayList<Zeitpunkt> selectZeitpunkt() {
        ArrayList<Zeitpunkt> zeitpunkt = new ArrayList<>();

        try {
            ResultSet rs = stmt.executeQuery("SELECT DATUM,ORT FROM ZEITPUNKT");
            while (rs.next()) {
                String datum = rs.getString("DATUM");
                String ort = rs.getString("ORT");
                Zeitpunkt help = new Zeitpunkt(datum,ort);
                zeitpunkt.add(help);
            }
            rs.close();
        } catch (Exception e) {
            System.err.println(("Error at: selectPersonIsFromPerson\n message: " + e.getMessage()).trim());
        }
        return zeitpunkt;
    }
    



    public void close()  {
        try {
            stmt.close(); //clean up
            con.close();
        } catch (Exception ignored) {
        }
    }
}