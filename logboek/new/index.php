<?php
	
	require_once("../../includes/header.php");

	$date = date('Y-m-d H:i');


	if( isset($_POST['voegtoe']) ){
		$titel = veilig( $_POST['titel'] );
		$bericht = veilig( $_POST['bericht'] );
		
		$array = array();
		$arrayS = serialize($array);
		
		$query = "INSERT INTO `Logboek`(`LogboekID`, `ZorgvragerID`, `MantelzorgerID`, `Datum`, `Titel`, `Bericht`, `MantelzorgerGezien`) VALUES ('null', '$zorgvragerID', '$mantelzorgerID','$date', '$titel', '$bericht', '$arrayS')";
		if($result = mysqli_query($connection, stripslashes($query)) or die(mysqli_error())){
			
			die("<script> location.href = '/logboek/'</script>");
		} 
	}
	
	// annuleer
	if(isset($_POST['annuleer'])){
		die("<script> location.href = '/taken/'</script>");
	}
	
?>

<!-- TITEL -->
	<div id="paginatitel" class="col-1-1">Nieuw bericht</div>

    <div class="grid grid-pad">
	    <div class="col-1-1" id="headerback">
		    <a href="../index.php"><span class="btnback"></span></a>
	    </div>
	    
<!-- EINDE TITEL -->
	    
<!-- MAIN -->
	    <section id="main" class="col-1-1 no-p">
		    
	    	<div class="col-1-3 push-1-3 md-col-1-2 md-push-1-4 sm-col-8-12 sm-push-2-12 xs-col-1-1 xs-no-push">
		    	<form method="post" action="">
			    	<label>Titel</label>
			    	<input type="text" name="titel" required/>
			    	
			    	<label>Bericht</label>
			    	<textarea type="text" name="bericht" ></textarea>
			    	
			    	<div class="col-1-1 no-p">
				    	<button type="submit" name="voegtoe" class="col-1-1 btn">Voeg toe</button>
				    	<a href="<?php echo $url . "/logboek/" ?>" class="col-1-1 btn btnred">Annuleer</a>
				    </div>
		    	</form>
		    	
	    	</div>  
	    	
	    </section>
    </div>
    
    <script src="../../scripts/default.js"></script>
</body>
</html>
