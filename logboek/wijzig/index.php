<?php
	
	require_once("../../includes/header.php");

	// opslaan taak
	if(isset($_POST['opslaan'])){
		$logboekItem = $_GET['logboekID'];
		$wijzigtitel = $_POST['titel'];
		$wijzigbericht = $_POST['bericht'];
		
		$query = "UPDATE `Logboek` SET `Titel`= '$wijzigtitel',`Bericht`= '$wijzigbericht' WHERE `LogboekID` = '$logboekItem'";
		if($result = mysqli_query($connection, stripslashes($query)) or die(mysqli_error())){
			die("<script> location.href = '/logboek/item/index.php?logboekID=$logboekItem'</script>");
		}	
	}

	// taak informatie ophalen
	if(isset($_GET['logboekID'])){
		$logboekItem = $_GET['logboekID'];
		
		$query = "SELECT `LogboekID`, `ZorgvragerID`, `MantelzorgerID`, `Titel`, `Bericht`, `MantelzorgerGezien` FROM `Logboek` WHERE `LogboekID` = '$logboekItem'";
		if($result = mysqli_query($connection, stripslashes($query)) or die(mysqli_error())){
			while($row = mysqli_fetch_array($result)){
					$titel = $row['Titel'];
					$bericht = $row['Bericht'];
				
			}
		}	
		
	} else {
		die("<script> location.href = '/logboek/'</script>");
	}
	
	// annuleer
	if(isset($_POST['annuleer'])){
		die("<script> location.href = '/logboek/item/index.php?logboekID=$logboekItem'</script>");
	}
	
	
?>

<!-- TITEL -->
	<div id="paginatitel" class="col-1-1">Wijzig bericht</div>

    <div class="grid grid-pad">

	    <div class="col-1-1" id="headerback">
		    <a href="<?php echo '/logboek/item/index.php?logboekID=' . $logboekItem; ?>"><span class="btnback"></span></a>
	    </div>
	    
<!-- EINDE TITEL -->
	    
<!-- MAIN -->
		<section id="main" class="col-1-1 no-p">
		    
	    	<div class="col-1-3 push-1-3 md-col-1-2 md-push-1-4 sm-col-8-12 sm-push-2-12 xs-col-1-1 xs-no-push">
		    	<form method="post" action="">
			    	<label>Titel</label>
			    	<input type="text" name="titel" value="<?php echo $titel; ?>" />
			    	
			    	<label>Bericht</label>
			    	<textarea type="text" name="bericht" ><?php echo $bericht; ?></textarea>
			    	
			    	<button name="opslaan" class="col-1-1 btn">Opslaan</button>
			    	<a href="<?php echo $url . "/logboek/" ?>" class="col-1-1 btn btnred">Annuleer</a>
		    	</form>
		    	
	    	</div>  
	    	
	    </section>
    </div>
    
    <script src="../../scripts/default.js"></script>
</body>
</html>
