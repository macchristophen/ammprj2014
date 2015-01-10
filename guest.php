
<?php if (isset($_COOKIE["guest"])){// il COOKIE e'impostato su guest ?>

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
    <!-- FINE contenuto modulo menu -->
  </div>
  
    <div id="login">
    <!-- SEZIONE LOGIN -->

<?php echo "Benvenuto ". $_SESSION['username'];?> 
   
<a href="index.php">Logout</a>   
</div>

  <div id="sidebar1">
  <!-- INIZIO contenuto modulo sidebar1 -->
    <?php include("sidebar1.php"); ?>
  <!-- FINE contenuto modulo sidebar1 -->
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
}else {
// query eseguita correttamente

echo "<table style='width:700px;' class='tabella'><tr>" ;

 if ($result = $mysqli->query($query)) {

 /* Ottiene informazione per la colonna , nel nostro caso il nome della colonna */
$finfo = mysqli_fetch_fields($result);

foreach ($finfo as $val) {
echo " <th id='minititle'>".$val->name."</th>  ";
}
}

while( $row = $result->fetch_array() )
{ 
echo "<tr>";    
for($i=0 ; $i<=$column-1 ; $i++) { 

echo " <td>".$row[$i]. " </td>  "; 

} 
echo " <td> &#8364 cad. </td>  ";  
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
