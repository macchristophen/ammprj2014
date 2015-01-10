<?php if (isset($_COOKIE["admin"])){ // il COOKIE e'impostato su admin ?>


<?php 
session_start(); //Inizializza i dati di sessione 
include("connect_db.php"); 
?> 

<?php include("head.php"); ?>
<link rel="stylesheet" type="text/css" href="my.css">
</head>
 <body>
 <div id="container">
  <div id="header">
    <!-- INIZIO contenuto modulo header -->
    <?php include("header.php"); ?>
    <!-- FINE contenuto modulo header -->
  </div>

  <div id="nav">
    <!-- INIZIO contenuto modulo menu -->
    <?php include("menu.php"); ?>    
    <!-- FINE contenuto modulo menu -->
  </div>
  
  <div id="login">
   <?php echo "Benvenuto ". $_SESSION['username'];?> 
   <a href="logout.php">Logout</a>   
</div>

  <div id="sidebar1">
    <!-- INIZIO contenuto modulo sidebar1 -->
    <?php include("sidebar1.php"); ?>
    <!-- FINE contenuto modulo menu -->
  </div>

  <div id="main">
  
<!-- INIZIO contenuto principale -->

<?php
$query = "SELECT * FROM $table";
$result = $mysqli->query($query);
if($mysqli->errno > 0){
// errore nella esecuzione della query (es. sintassi)
error_log("Errore nella esecuzione della query
$mysqli->errno : $mysqli->error", 0);
}else { // query eseguita correttamente

echo "<table style='width:700px;' class='tabella'><tr>" ;


 if ($result = $mysqli->query($query)) {

 
$finfo = mysqli_fetch_fields($result); // Ottiene informazione per la colonna , nel nostro caso il nome della colonna   

foreach ($finfo as $val) { 
echo " <th id='minititle'>".$val->name."</th>  ";
}
}

while( $row = $result->fetch_array() )
{ 
echo "<tr>";    
for($i=0 ; $i<=$column-1 ; $i++) { // il valore column e' relativo al numero di colonne presenti nella tabella stock

echo "<td>".$row[$i]. "</td>  "; 

}
echo " <td> &#8364 cad. </td>  "; 
echo "<td style='font-weight: bold;'><a href='edit.php?cat=edit&id=".$row[0]."'><img src='image/edit.png' alt='modifica' width='32px' height='32px'></a></td>";
echo "<td style='font-weight: bold;'><a href='edit.php?cat=delete&id=".$row[0]."'><img src='image/delete.png' alt='cancella' width='32px' height='32px'></a></td>";  
echo "</tr>";  
}

echo "</table>"; 
echo "</br>";


}
?>

<!-- FINE contenuto principale -->   
   </div>

  <div id="footer">
    <!-- INIZIO contenuto modulo footer -->
    <?php include("footer.php"); ?>
    <!-- FINE contenuto modulo footer -->
  </div>
</div>
 <?php $mysqli->close(); ?> 
</body>
</html>
<?php } ?>
