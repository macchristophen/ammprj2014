<?php if (isset($_COOKIE["admin"])){// il COOKIE e'impostato su admin ?> 
<?php session_start(); //Inizializza i dati di sessione
include("connect_db.php"); 
?> 
<?php include("head.php"); ?>
<link rel="stylesheet" type="text/css" href="my.css">
</head>
 <body>
 <div id="container">
  <div id="header">
    <?php include("header.php"); ?>
  </div>

  <div id="nav">
 <?php include("menu.php"); ?> 
  </div>
  
 <div id="login">
<?php echo "Benvenuto ". $_SESSION['username'];?>    
<a href="logout.php">Logout</a>   
</div>

  <div id="sidebar1">
    <?php include("sidebar1.php"); ?>
  </div>

  <div id="main">
<?php 

if (!empty($_REQUEST['term'])) {
$term = $_REQUEST['term'];     


if ($result = $mysqli->query("SELECT * FROM $table WHERE matricola LIKE '%".$term."%'
OR prodotto LIKE '%" . $term ."%' ORDER BY id"))
{
                                // mostra i record se ci sono record da mostrare
                                if ($result->num_rows > 0)
                                {
                                        // mostra i record in una tabella 
                                        echo "<table style='width:700px;' class='tabella'>";
                                        
                                        
$finfo = mysqli_fetch_fields($result); // Ottiene informazione per la colonna , nel nostro caso il nome della colonna
echo " <tr>";
foreach ($finfo as $val) {
echo " <th id='minititle'>".$val->name."</th>  ";
}
echo " </tr>";                                        
                                        
                                        while ($row = $result->fetch_object())
                                        {
                                                // impostare la riga con il relativo record 
                                                echo "<tr>";
                                                echo "<td>" . $row->id . "</td>";
                                                echo "<td>" . $row->matricola . "</td>";
                                                echo "<td>" . $row->prodotto . "</td>";
                                                echo "<td>x" . $row->quantita . "</td>";
                                                echo "<td>" . $row->prezzo . " &#8364 cad.</td>"; 
                                                echo "<td><a href='edit.php?cat=edit&id=" . $row->id . "'><img src='image/edit.png' alt='modifica' width='32px' height='32px'></a></td>";
                                                echo "<td><a href='edit.php?cat=delete&id=" . $row->id . "'><img src='image/delete.png' alt='cancella' width='32px' height='32px'></a></td>";
                                                echo "</tr>";
                                        }
                                        
                                        echo "</table>";
                                }
                                // se non ci sono record nel database mostra un messaggio di allerta 
                                else
                                {
                                        echo "Nessun risultato da mostrare!";
                                }
                        }









}

?>
 
   </div>

  <!--<div id="sidebar2">
     sidebar content goes in here 
    
  </div> --> 

  <div id="footer">
    <!-- footer content goes in here -->
    <?php include("footer.php"); ?>
  </div>
</div>
 <?php $mysqli->close(); ?>
</body>
</html>
<?php } ?>