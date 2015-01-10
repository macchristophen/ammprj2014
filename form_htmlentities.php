<?php
/*
La funzione htmlentities, data una stringa, ne crea un’altra con le HTML entities dove necessario 
*/
$field1 = htmlentities($_POST['matricola'], ENT_QUOTES);
$field2 = htmlentities($_POST['prodotto'], ENT_QUOTES);
$field3 = htmlentities($_POST['quantita'], ENT_QUOTES); 
$field4 = htmlentities($_POST['prezzo'], ENT_QUOTES);   
?>
