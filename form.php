
<form action="" method="post">
<div>
<?php if ($id != '') { // verifica che ID esista ?>
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<p>ID: <?php echo $id; ?></p>
<?php } ?>

<!-- INIZIO campi form --> 
<!-- è possibile aggiungere,modificare o diminuire i campi in relazione alle proprie esigenze-->                   
<strong>Matricola: *</strong> <input type="text" name="matricola" value="<?php echo $field1; ?>"/><br/>
<strong>Nome Prodotto: *</strong> <input type="text" name="prodotto" value="<?php echo $field2; ?>"/><br/>
<strong>Quantita': *</strong> <input type="text" name="quantita" value="<?php echo $field3; ?>"/><br/> 
<strong>Prezzo: *</strong> <input type="text" name="prezzo" value="<?php echo $field4; ?>"/> 
<!-- FINE campi form -->
<p>* richiesto</p>
<input type="submit" name="submit" value="Submit" />
</div>
</form>  

