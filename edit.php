<?php if (isset($_COOKIE["admin"])){// il COOKIE e'impostato su admin ?> 
<?php session_start();//Inizializza i dati di sessione 
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
    <!-- FINE contenuto modulo sidebar1 -->
  </div>

  <div id="main">
<!-- INIZIO contenuto principale -->
    <?php include("function.php"); ?>
<!-- FINE contenuto principale -->
  </div>

  <div id="footer">
    <!-- INIZIO contenuto footer -->
    <?php include("footer.php"); ?>
    <!-- FINE contenuto footer -->
  </div>
  
</div>
  <?php $mysqli->close(); ?>
</body>
</html>
<?php } ?>
