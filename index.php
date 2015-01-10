<?php 
include("connect_db.php");
include("head.php"); 
?>
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
    <a href='index.php'>Menu (effetua il login)</a>
  </div>
  
    <div id="login">
    <!-- INIZIO modulo login -->
    <?php include("login.php"); ?>
    <!-- FINE modulo login -->
  </div>

  <div id="sidebar1">
    <!-- INIZIO contenuto modulo sidebar1 -->
    <?php include("sidebar1.php"); ?>
    <!-- FINE contenuto modulo menu -->
  </div>

  <div id="main">    
    <!-- INIZIO contenuto principale -->
    <?php include("slide.php"); ?> 
    <?php include("main.php"); ?>
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
