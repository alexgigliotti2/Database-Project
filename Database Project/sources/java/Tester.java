import java.sql.Timestamp;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Random;

import oracle.sql.ARRAY;

public class Tester {

	public static void main(String[] args) {
		DatabaseHelper dbHelper=new DatabaseHelper();
		Random random = new Random();

		
		//INSERT FOR USERIN
		ArrayList<String> usernameGen1 = new ArrayList<>(Arrays.asList(
	            "Alice", "Bob", "Charlie", "David", "Emma", "Frank", "Grace", "Henry", "Ivy", "Jack",
	            "Kate", "Leo", "Mia", "Noah", "Olivia", "Peter", "Quinn", "Ruby", "Sam", "Tina",
	            "Uma", "Victor", "Wendy", "Xavier", "Yara", "Zane", "Bella", "Caleb", "Daisy",
	            "Ethan", "Faith", "Gavin", "Hannah", "Isaac", "Jasmine", "Kevin", "Lily", "Mason",
	            "Nora", "Oscar", "Penelope", "Quentin", "Riley", "Sebastian", "Taylor", "Vincent",
	            "Willow", "Xander", "Yasmine", "Zoe"
	        ));
		
	
		
		ArrayList<String> userCountries = new ArrayList<>(Arrays.asList(
	            "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda",
	            "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain",
	            "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan",
	            "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria",
	            "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia", "Cameroon", "Canada",
	            "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros",
	            "Congo", "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czech Republic",
	            "Democratic Republic of the Congo", "Denmark", "Djibouti", "Dominica",
	            "Dominican Republic", "East Timor"
	        ));
		
		ArrayList<String> userGenres = new ArrayList<>(Arrays.asList(
	            "Pop", "Rock", "Hip Hop", "R&B", "Country", "Jazz", "Electronic", "Reggae", "Classical",
	            "Folk", "Blues", "Alternative", "Indie", "Metal", "Punk", "Funk", "Soul", "Dance",
	            "Gospel", "Latin", "Rap", "Ska", "Disco", "Techno", "Instrumental", "Opera", "Samba",
	            "Bollywood", "K-Pop", "World"
	        ));
		
		for(int i=0; i<1000; i++) {
			String username = usernameGen1.get(random.nextInt(usernameGen1.size())) +
			String.valueOf(i);
			String usercountry = userCountries.get(random.nextInt(userCountries.size()));
			String userGenre = userGenres.get(random.nextInt(userGenres.size()));
			System.out.println("Added user: " + username);
			dbHelper.insertIntoUserin(username, usercountry, userGenre);
		}
		
		
		
		//INSERT FOR PLAYLIST
		ArrayList<String> userNames = new ArrayList<>(dbHelper.selectUsernameFromWebUser());
		
		ArrayList<String> playListName1 = new ArrayList<>(Arrays.asList(
	            "Chill", "Summer", "Party", "Feel Good", "Road Trip", "Throwback", "Workout", "Study",
	            "Relax", "Motivation", "Happy", "Sad", "Love", "Dance", "Acoustic", "Instrumental",
	            "Upbeat", "Mellow", "Energy", "Romantic", "Indie", "Rock", "Pop", "R&B", "Country",
	            "Hip Hop", "Jazz", "Electronic", "Classical", "Folk", "Blues", "Alternative", "Reggae",
	            "Soul", "Latin", "Metal", "Punk", "Funk", "Gospel", "Dubstep", "Techno", "Trap",
	            "House", "Ska", "Disco", "Ambient", "Experimental", "Bollywood", "K-Pop", "Arabic"
	        ));
		
		ArrayList<String> playListName2 = new ArrayList<>(Arrays.asList(
	            "Vibes", "Jam", "Mix", "Playlist", "Beats", "Tracks", "Collection", "Melodies",
	            "Grooves", "Sounds", "Hits", "Party", "Session", "Jams", "Selection", "Mixtape",
	            "Tunes", "Chill", "Wave", "Soul", "Essentials", "Anthems", "Compilation", "Radio",
	            "Classics", "Shuffle", "Bops", "Club", "Hype", "Bangers", "Therapy", "Flow"
	        ));
		
		ArrayList<String> playlistGenres = new ArrayList<>(Arrays.asList(
	            "Pop", "Rock", "Hip Hop", "R&B", "Country", "Jazz", "Electronic", "Reggae", "Classical",
	            "Folk", "Blues", "Alternative", "Indie", "Metal", "Punk", "Funk", "Soul", "Dance",
	            "Gospel", "Latin", "Rap", "Ska", "Disco", "Techno", "Instrumental", "Opera", "Samba",
	            "Bollywood", "K-Pop", "World"
	        ));
		
		for(int i=0; i<2000; i++) {
			String username = userNames.get(random.nextInt(userNames.size()));
			String playname = playListName1.get(random.nextInt(playListName1.size())) + " " + 
					playListName2.get(random.nextInt(playListName2.size()));
			String playgenre = playlistGenres.get(random.nextInt(playlistGenres.size()));
			int playcount = random.nextInt(50);
			
			System.out.println("Added playlist: " + playname);
			dbHelper.insertIntoPlaylist(username, playname, playcount, playgenre);
			
		}
		
		
		//INSERT INTO SONG
		ArrayList<String> songname1 = new ArrayList<>(Arrays.asList(
	            "Sunset", "Moonlight", "Summer", "City", "Dream", "Love", "Fire", "Rain", "Star",
	            "Ocean", "Heart", "Echo", "Whisper", "Mystery", "Magic", "Silent", "Melody", "Dawn",
	            "Lost", "Wander", "Reflection", "Serene", "Golden", "Serenade", "Enchanted", "Ethereal",
	            "Infinite", "Bliss", "Chasing", "Hidden", "Frozen", "Journey", "Celestial", "Aurora",
	            "Echoes", "Velvet", "Sapphire", "Harmony", "Secret", "Lullaby", "Crystal", "Twilight",
	            "Whirlwind", "Whimsical", "Stardust", "Whispering", "Sparkling", "Glimmer", "Enigma",
	            "Whisper"
	        ));

	        ArrayList<String> songname2 = new ArrayList<>(Arrays.asList(
	            "Song", "Melody", "Tune", "Symphony", "Beat", "Rhythm", "Chorus", "Verse", "Ballad",
	            "Groove", "Jam", "Track", "Serenade", "Harmony", "Lullaby", "Muse", "Dance", "Whisper",
	            "Vibe", "Melodies", "Notes", "Sound", "Cadence", "Prelude", "Reverie", "Guitar", "Piano",
	            "Lyrics", "Euphony"
	        ));
	        
	        
	     
	        for(int i=0; i<1000; i++) {
	        	String songName = songname1.get(random.nextInt(songname1.size())) + " " +
	        			songname2.get(random.nextInt(songname2.size()));
	        	int minute = random.nextInt(4) +1 ;
	        	int second = random.nextInt(49) + 10;
	        	String songlength = "0" +  minute + ":" + second;
	        	System.out.println("Added song: " + songName);
	        	dbHelper.insertIntoSong(songName, songlength);
	        }
		
		
		//INSERT INTO SingleKuenstler
		
		ArrayList<String> singlekünstler = new ArrayList<>(Arrays.asList(
                "Luna Nova", "Stella Aurora", "Silas Moon", "Aria Stardust", "Nova Ray",
                "Phoenix Ember", "Elysia Mist", "Solara Starling", "Zephyr Nightshade", "Celeste Rain",
                "Rune Shadow", "Lyra Serenade", "Orion Blaze", "Aurora Sky", "Serenity Dawn",
                "Harmony Twilight", "Lorelei Breeze", "Saffron Celestia", "Dusk Evergreen", "Melody Seraph",
                "Indigo Ember", "Zara Starlight", "Raven Midnight", "Eclipse Nova", "Aether Solstice",
                "Luminara Nebula", "Cassiopeia Moonbeam", "Axel Stardancer", "Amethyst Vesper", "Lyric Sunfire",
                "Iris Moonstone", "Rhapsody Stardust", "Eos Nightfall", "Nebula Harmonia", "Lark Skylark",
                "Thalia Stardust", "Cadenza Nova", "Zephyrus Dawn", "Melody Astral", "Aria Solaris",
                "Solstice Aurora", "Nova Bellatrix", "Avalon Ember", "Sonata Stardust", "Ethereal Luna",
                "Kairos Celestia", "Aria Starfire", "Cosmo Solara", "Lyric Moonshadow", "Nyx Serenade"
        ));
		
		for(int i=0; i<singlekünstler.size(); i++) {
			String artistname = singlekünstler.get(i);
			int artistage = random.nextInt(50)+20;
			System.out.println("Added SingleKünstler: " + artistname);
			dbHelper.insertIntoSingleKuenstler(artistname, artistage);
		}
		
		//INSERT INTO BAND
		ArrayList<String> bandkünstler = new ArrayList<>(Arrays.asList(
                "Electric Dreamers", "Echoing Serenade", "Midnight Rhapsody", "Sonic Storm", "Astral Symphony",
                "Eclipse Parade", "Whispering Shadows", "Celestial Melody", "Rhythm Rebels", "Harmonic Fusion",
                "Lunar Legends", "Solar Flares", "Reverberation Nation", "Neon Pulse", "Melodic Mirage",
                "Harmony Horizon", "Resonance Revolution", "Spectrum Vibes", "Melting Pot", "Echo Chamber",
                "Melody Machine", "Soundscapers", "Beatbox Brigade", "Groove Generation", "Echo Ensemble",
                "Soul Symphony", "Acoustic Aura", "Cadence Collective", "Magnetic Melodies", "Rhythm Riders",
                "Reverb Union", "Euphonic Journey", "Sonic Vortex", "Fusion Force", "Melodic Maelstrom",
                "Harmony Highway", "Rhythmic Rebellion", "Soundwave Sensation", "Vibrant Voyage", "Echoes of Eternity",
                "Sonic Solstice", "Harmonic Haven", "Aurora Soundscape", "Resounding Rush", "Rhythm Revolution",
                "Vibrant Voices", "Melody Madness", "Pulse Parade", "Epic Echoes", "Harmony High"
        ));
		
		for(int i=0; i<bandkünstler.size(); i++) {
			String artistname = bandkünstler.get(i);
			//int artistage = random.nextInt(10)+1;
			System.out.println("Added Bandkünstler: " + artistname);
			dbHelper.insertIntoBandKuenstler(artistname);
		}
		
		
		//INSERT INTO ZEITPUNKT
		ArrayList<String> places = new ArrayList<>(Arrays.asList(
                "London", "New York", "Paris", "Tokyo", "Sydney",
                "Rome", "Berlin", "Barcelona", "Amsterdam", "Moscow",
                "Rio de Janeiro", "Cairo", "Toronto", "Dubai", "Mumbai",
                "San Francisco", "Singapore", "Istanbul", "Seoul", "Buenos Aires",
                "Stockholm", "Cape Town", "Prague", "Vienna", "Madrid",
                "Athens", "Helsinki", "Oslo", "Bangkok", "Lisbon",
                "Dublin", "Melbourne", "Brussels", "Zurich", "Budapest",
                "Warsaw", "Shanghai", "Mexico City", "Johannesburg", "Hanoi",
                "Vancouver", "Copenhagen", "Edinburgh", "Kuala Lumpur", "Munich",
                "Reykjavik", "Havana", "Beijing", "Riyadh"
        ));
		
		
		for(int i=0; i<500; i++) {
			int year = random.nextInt(1) + 22;
			int month = random.nextInt(8) + 1;
			int day = random.nextInt(18) + 10;
			int hour = random.nextInt(13) + 10;
			int minute = random.nextInt(49) + 10;
			int second = random.nextInt(49) + 10;
			String place = places.get(random.nextInt(places.size()));
			
			String zeitpunkt = day + "-0" + month +  "-" + year + " " + hour + ":" + minute + ":" + second;
			System.out.println("Added Zeitpunkt: " + zeitpunkt);
			
			dbHelper.insertIntoZeitpunkt(zeitpunkt, place);
		}
		
		
		//INSERT INTO SINGLEVEROEFFENTLICHT + BANDVEROEFFENTLICHT
		ArrayList<Integer> songIDs =  new ArrayList<>(dbHelper.selectSongIDfromSong());
		ArrayList<Integer> sinArtistIDs = new ArrayList<>(dbHelper.selectArtistIDfromSingleArtist());
		ArrayList<Integer> bandArtistIDs = new ArrayList<>(dbHelper.selectArtistIDfromBandArtist());
		
		for(int i=0; i<500; i++) {
			int songID = songIDs.get(i);
			int artistID = sinArtistIDs.get(random.nextInt(sinArtistIDs.size()));
			
			System.out.println("Added SingleVeröffentlicht: " + i);
			dbHelper.insertIntoSingleVeroeffentlicht(artistID, songID);
			
		}
		
		for(int i=500; i<1000; i++) {
			int songID = songIDs.get(i);
			int artistID = bandArtistIDs.get(random.nextInt(bandArtistIDs.size()));
			
			System.out.println("Added BandVeröffentlicht: " + i);
			dbHelper.insertIntoBandVeroeffentlicht(artistID, songID);
			
		}
		
		
		//INSERT INTO FOLGT:
		ArrayList<String> userNamess = new ArrayList<>(dbHelper.selectUsernameFromWebUser());
		
		for(int i=0; i<50; i++) {
			String user1 = userNamess.get(random.nextInt(userNamess.size()));
			String user2 = userNamess.get(random.nextInt(userNamess.size()));
			System.out.println("User: " + user1 + " followed user: " + user2);
			dbHelper.insertIntoFolgt(user1, user2);
		}
		
		
		//INSERT INTO HOERT:
		ArrayList<String> userNames2 = new ArrayList<>(dbHelper.selectUsernameFromWebUser());
		ArrayList<Integer> songIDs2 =  new ArrayList<>(dbHelper.selectSongIDfromSong());
		ArrayList<Zeitpunkt> dates = new ArrayList<>(dbHelper.selectZeitpunkt());
		
		for(int i=0; i<2000; i++) {
			String user = userNames2.get(random.nextInt(userNames2.size()));
			int songID = songIDs2.get(random.nextInt(songIDs2.size()));
			Zeitpunkt zeitpunkt = dates.get(random.nextInt(dates.size()));
			String date = zeitpunkt.getDatum();
			String place = zeitpunkt.getOrt();
			
			dbHelper.insertIntoHoert(user,date, place, songID);
		}
		
		dbHelper.close();
	}

}
