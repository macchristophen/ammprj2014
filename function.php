<?php


$cat = $_REQUEST['cat'];  // la  $_REQUEST['cat'] viene assegnata a $cat
$_GET['cat']; //   $_GET['cat'] contiene il parametro cat

// EDIT - INIZIO Istruzioni per la modifica 
if($cat == "edit") // se $cat == "edit" 
{
/* Inizio la creazione del form per la modifica o aggiunta di record .
Utilizzo $filed1,$field2 ... per comodità, per non dover scrivere per intero i nomi delle colonne.
In questo modo posso ignorarle, poichè possono avere i nomi che si vogliono.
*/
function renderForm($field1 = '', $field2 ='', $field3 ='', $field4 ='', $error = '', $id = '')//integro una funzione per eventuali errori
{ 

if ($id != '') { echo "Modifica Record"; } else { echo "Nuovo Record"; } 
if ($error != '') { echo "<div style='padding:4px; border:1px solid red; color:red'>" .$error. "</div>"; } 
?> 

<?php include("form.php"); ?>
<?php }

/* MODIFICA RECORD */

if (isset($_GET['id'])){// se la variabile 'id' è impostata nell'URL, allora sappiamo che e' neccessario modificare il record 
 
if (isset($_POST['submit'])){// Se il bottone 'submit' del form e' cliccato allora il form deve essere processato
    
if (is_numeric($_POST['id'])){// ci assicuriamo che 'id' nella URL sia valido
    
$id = $_POST['id']; // otteniamo le variabili dalla URL/form 
include("form_htmlentities.php"); 
                
if ($field1 == '' || $field2 == '' || $field3 == '' || $field4 == ''){// verifico che le variabili non siano vuote 
    
$error = 'ERRORE: Si prega di compilare tutti i campi obbligatori!'; // se le variabili sono vuote, viene mostrato un messaggio di errore e viene mostrato il form 
renderForm($field1, $field2, $field3, $field4, $error, $id);
}
else{ // se tutto va bene, aggiorna il record nel database 
    
if ($stmt = $mysqli->prepare("UPDATE $table SET matricola = ?, prodotto = ?, quantita = ?, prezzo = ? WHERE id=?"))
{
$stmt->bind_param("isidi", $field1, $field2, $field3, $field4, $id);
$stmt->execute();
$stmt->close();
}

else{ 
echo "ERRORE: impossibile preparare istruzione SQL."; // mostra un messaggio di errore se la query ha un errore
}

header("Location: admin.php");// reindirizza gli utenti una volta che il form viene aggiornato 
}
}
 
else{
echo "ERRORE!";// se la variabile 'id' non e' valida mostra un messaggio di errore
}
}

// se il form non e' stato processato ancora, prende le informazioni dal database e mostra il form
else
{
     
if (is_numeric($_GET['id']) && $_GET['id'] > 0){// ci assicuriamo che il valore della variabile 'id' sia valido

$id = $_GET['id'];// ottiene la 'id' dalla URL  
                
// ottiene il record dal database  
if($stmt = $mysqli->prepare("SELECT * FROM $table WHERE id=?")){
$stmt->bind_param("i", $id);
$stmt->execute();
                    
$stmt->bind_result($id, $field1, $field2, $field3, $field4);
$stmt->fetch();
                    
renderForm($field1, $field2, $field3, $field4, NULL, $id);// mostra il form
                    
$stmt->close();

}
else{
echo "ERRORE: impossibile preparare istruzione SQL";// mostra un messaggio di errore se la query ha un errore 
}
}

else{
header("Location: admin.php");// se il valore della variabile 'id' non e' valida reindirizza gli utenti indietro alla pagina specificata 
}
}
}

/* NUOVO RECORD */

// se la variabile 'id' non e settata nella URL allora verra' creato un nuovo record 
else{

// Se il bottone 'submit' del form e' cliccato allora il form deve essere processato
if (isset($_POST['submit'])){

// otteniamo i dati dalla form
include("form_htmlentities.php"); 
            
// verifico che le variabili non siano vuote 
if ($field1 == '' || $field2 == '' || $field3 == '' || $field4 == ''){

// se le variabili sono vuote, viene mostrato un messaggio di errore e viene mostrato il form
$error = 'ERRORE: Si prega di compilare tutti i campi obbligatori!';
renderForm($field1, $field2, $field3, $field4, $error);
}

else{

// se tutto va bene inserisce il nuovo record nel database
if ($stmt = $mysqli->prepare("INSERT $table (matricola, prodotto, quantita, prezzo) VALUES (?, ?, ?, ?)"))
{
$stmt->bind_param("isid", $field1, $field2, $field3, $field4);
$stmt->execute();
$stmt->close();
}

// mostra un messaggio di errore se la query ha un errore
else{
echo "ERRORE: impossibile preparare istruzione SQL";
}
                
// reindirizza gli utenti all pagina specificata
header("Location: admin.php");
}
}

// se il form non e' stato ancora processato mostra il form
else{
renderForm();
}
}
}
// EDIT - FINE Istruzioni per la modifica  


// DELETE - INIZIO Istruzioni per la cancellazione
elseif ($cat == "delete")
{
    
 
     // conferma se la variabile  'id' e' stata settata correttamente
    if (isset($_GET['id']) && is_numeric($_GET['id']))
    {
        // ottiene la variabile 'id' dalla URL 
        $id = $_GET['id'];
        
        // cancella record dal database
        if ($stmt = $mysqli->prepare("DELETE FROM $table WHERE id = ? LIMIT 1"))
        {
            $stmt->bind_param("i",$id);    
            $stmt->execute();
            $stmt->close();
        }
        
 // mostra un messaggio di errore se la query ha un errore
else{
echo "ERRORE: impossibile preparare istruzione SQL";
}

        
        // reindirizza l'utente dopo che l''eliminazione è avvenuta con successo
        header("Location: admin.php");
    }
    else
    // se la variabile 'id' non e settata correttamente, reindirizza l'utente
    {
        header("Location: admin.php");
    }
 

 }
// DELETE - FINE Istruzioni per la cancellazione 

// SEARCH - INIZIO Istruzioni per la ricerca

elseif ($cat == "search")
{        
include("search.php");
}
// SEARCH - FINE Istruzioni per la ricerca
?>
