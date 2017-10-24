<?php
	
	require_once("../../includes/header.php");

	setlocale(LC_ALL, 'nl_NL');
	// wijzig bericht
	if(isset($_POST['wijzig'])){
		
		$logboekItem = $_GET['logboekID'];
		
		die("<script> location.href = '/logboek/wijzig/?logboekID=$logboekItem'</script>");
	}

	// bericht verwijderen
	if(isset($_POST['verwijder'])){
		
		$logboekItem = $_GET['logboekID'];
		
		$query = "DELETE FROM `Logboek` WHERE `LogboekID` = '$logboekItem'";
		if($result = mysqli_query($connection, stripslashes($query)) or die(mysqli_error())){
			die("<script> location.href = '/logboek/'</script>");
		}
	}

	// Haal bericht op 
	if(isset($_GET['logboekID']) && $_GET['logboekID'] != ""){
		
		$logboekItem = $_GET['logboekID'];
		
		$query = "SELECT `LogboekID`, `ZorgvragerID`, `MantelzorgerID`, `Datum`, `Titel`, `Bericht` FROM `Logboek` WHERE `LogboekID` = '$logboekItem'";
		if($result = mysqli_query($connection, stripslashes($query)) or die(mysqli_error())){
			while($row = mysqli_fetch_array($result)){
				
				$titel = $row['Titel'];
				$berichtItem = $row['Bericht'];

				$datum = $row['Datum'];
				$date = strftime('%A %e %h %H:%M', strtotime($datum));


				
				$mantelzorger = $row['MantelzorgerID'];
				$mantelzorgerNaam = "";
					
				$queryMantelzorger = "SELECT `Naam` FROM `Mantelzorger` WHERE `MantelzorgerID` = '$mantelzorger'";
				$resultMantelzorger = mysqli_query($connection, stripslashes($queryMantelzorger));

				while($rowMantelzorger = mysqli_fetch_array($resultMantelzorger)){
					$mantelzorgerNaam = $rowMantelzorger['Naam'];
				}
			}
		}
		
	}  


	
?>

<!-- TITEL -->
	<div id="paginatitel" class="col-1-1">Bericht</div>

    <div class="grid grid-pad">
	    <div class="col-1-1" id="headerback">
		    <a href="../index.php"><span class="btnback"></span></a>
	    </div>
	    
<!-- EINDE TITEL -->
	    
<!-- MAIN -->
	    <section id="main" class="col-1-1 no-p">
		    
		    <div class="col-1-2 push-1-4 sm-col-8-12 sm-push-2-12 xs-col-1-1 xs-no-push logboek">
	    		<div class="bericht">
		    		<h1> <?php echo $titel; ?></h1>
		    		<p> <?php echo $berichtItem; ?></p>
	    		</div>

	    		<p> <?php echo $date?></p>

				<form method="post" action="">
			    	
			    	<div class="col-1-1 no-p">
						<div class="col-1-2"><button name="wijzig" class="col-1-1 btn btnwijzig"></button></div>
						<div class="col-1-2"><button name="verwijder" class="col-1-1 btn btnverwijder"></button></div>
			    	</div>

		    	</form>
		 
	    	</div> 
	    	
	    </section>
    </div>
    
    <script src="../../scripts/default.js"></script>
</body>
</html>
