<?php
session_start(); //Inizializza i dati di sessione
if (!isset($_POST['submit'])){ //se viene premuto il pulsante submit
?>

<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
Username: <input type="text" name="username" />
Password: <input type="password" name="password" />
<input type="submit" name="submit" value="Login" />
</form>
    
<?php
} else {
    require_once("connect_db.php");

    // individua la connessione
    if ($mysqli->connect_errno) {
        echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
        exit();
    }
 
 // la username e password inserite nel form vengono assegnate alle rispettive variabili
    $username = $_POST['username'];
    $password = $_POST['password'];

 
    $sql = "SELECT * from $table1 WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
    $result = $mysqli->query($sql);
    
    
    
while($row = mysqli_fetch_array($result))
{   
    if($_POST['username']==$row['username'] && $_POST['password']==$row['password'] && $row['privileges']=='yes'){ // se le condizioni sono rispettate 
        //un cookie ha un valore temporale che possiamo specificare
       
        setcookie("admin", "OK", time() +3600);//nel nostro caso abbiamo optato per 1 ora cioè 3600 secondi per admin  
        $_SESSION['username']=$username;
        header("Location:admin.php"); //l'utente vieve reindirizzato
    }
    
     elseif ($_POST['username']==$row['username'] && $_POST['password']==$row['password'] && $row['privileges']=='no')
    {
        //un cookie ha un valore temporale che possiamo specificare
       
         setcookie("guest", "OK", time() +36); //nel nostro caso abbiamo optato per 36 secondi per Utente
        $_SESSION['username']=$username;
        header("Location:guest.php"); //l'utente vieve reindirizzato
    }
    
}
        if ($_POST['username']!=$row['username'] || $_POST['username']=='' && $_POST['password']!=$row['password'] || $_POST['password']==''){// se le condizioni sono rispettate
        
        echo "Le tue credenzili sono sbagliate";  //Se le condizioni non sono rispettate mostra un messaggio di errore
    }  
}

?>       



