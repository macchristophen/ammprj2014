<table style='width:700px;' class='tabella'>
<tr>
<td>
<p><b>Resoconto Magazzino:</b></p>
</td>
</tr>
<tr>
<td>
<?php     
$query = $mysqli->prepare("SELECT * FROM $table");
$query->execute();
$query->store_result();

echo"Totale prodotti presenti in archivio: ";$rows = $query->num_rows;

echo $rows;
 
?>
</td>
</tr>
 
<tr>
<td>
<?php

$sql = "SELECT SUM(quantita) AS total FROM $table";
if ($result = $mysqli->query($sql)) {
if ($result->num_rows) {
$row = $result->fetch_assoc();
echo"Totale quantita' presenti in archivio: ";echo $row['total'];
}
} else {
echo $mysqli->error;
}
?>
</td>
</tr>

<tr>
<td>
<?php

$sql = "SELECT SUM(quantita*prezzo) AS total FROM $table";
if ($result = $mysqli->query($sql)) {
if ($result->num_rows) {
$row = $result->fetch_assoc();
echo"Valore totale merci: ";echo $row['total'];echo" &#8364 - (Totale non ivato)";
}
} else {
echo $mysqli->error;
}
?>
</td>
</tr>

</table>
 
   
