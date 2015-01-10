<?php
/*
se $cat=edit attiva le istruzioni per la modifica (vedere function.php)
se $cat=delete attiva le istruzioni per la cancellazione (vedere function.php)
se $cat=search attiva le istruzioni per la ricerca (vedere search.php)
*/
echo"
<a href='admin.php'>Home</a> -
<a href='edit.php?cat=edit'>Aggiungi</a> - 
<a href='edit.php?cat=delete'>Cancella</a> -
<a href='edit.php?cat=search'>Cerca</a>
";    
?>
