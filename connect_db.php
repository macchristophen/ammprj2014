 <?php 



class Settings {
public static $db_host = 'localhost';  //nome del server (solitamnte localhost)
public static $db_user = 'faddaChristian';   // database user
public static $db_password = 'gazzella221';       // database password (se non neccessaria lasciare il campo cosi come è)
public static $db_name = 'amm14_faddaChristian';    // nome del database     
}
//--------- Classe che usa il db --------------
// creo l'istanza della classe mysqli
$mysqli = new mysqli();
// connessione al database
$mysqli->connect(
Settings::$db_host, 
Settings::$db_user,
Settings::$db_password,
Settings::$db_name);






$column =5;
$copyright ='Copyright - Quello che vuoi - 2014';

$table = 'stock';  //nome della tabella1
$table1 = 'user';  //nome della tabella2 







?>


