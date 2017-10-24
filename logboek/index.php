<?php
	
	require_once("../includes/header.php");
	
	setlocale(LC_ALL, 'nl_NL');
	
	
	$query = "SELECT `LogboekID`, `ZorgvragerID`, `MantelzorgerID`, `Datum`, `Titel`, `Bericht`, `MantelzorgerGezien` FROM `Logboek` WHERE `ZorgvragerID` = '$zorgvragerID'";
	if($result = mysqli_query($connection, stripslashes($query)) or die(mysqli_error())){
		while($row = mysqli_fetch_array($result)){
			
			$logboekArray = unserialize($row['MantelzorgerGezien']);
			$logboekID = $row['LogboekID'];
			
			if ( ! in_array( $mantelzorgerID, $logboekArray ) ){
				
				$logboekArray[] = $mantelzorgerID;
				$logboekArrayNew = serialize($logboekArray);
				
				$queryGezien = "UPDATE `Logboek` SET `MantelzorgerGezien`= '$logboekArrayNew' WHERE `LogboekID` = '$logboekID'";
				mysqli_query($connection, stripslashes($queryGezien)) or die(mysqli_error());

			}
			
		}
	}
	
	
?>

<!-- TITEL -->
	<div id="paginatitel" class="col-1-1">Logboek</div>

    <div class="grid grid-pad">
	    <div class="col-1-1" id="headerback">
		    <a href="../"><span class="btnback"></span></a>
	    </div>
	    
<!-- EINDE TITEL -->
	    
<!-- MAIN -->
	    <section id="main" class="col-1-1 no-p">
		    
		    <div class="col-1-1 no-p">
		   	 	<div class="col-2-3 push-1-6 sm-col-1-1 sm-no-push">
			    	
			    <?php
				    
				    $query = "SELECT `LogboekID`, `ZorgvragerID`, `MantelzorgerID`, `Datum`, `Titel`, `Bericht`, `MantelzorgerGezien` FROM `Logboek` ORDER BY `logboekID` DESC ";
					if($result = mysqli_query($connection, stripslashes($query)) or die(mysqli_error())){
						while($row = mysqli_fetch_array($result)){
							
							$datum = $row['Datum'];
							$date = strftime('%A %e %h %H:%M', strtotime($datum));


						    $mantelzorger = $row['MantelzorgerID'];
						    $mantelzorgerNaam = "";

						    $queryMantelzorger = "SELECT `Naam` FROM `Mantelzorger` WHERE `MantelzorgerID` = '$mantelzorger'";
							$resultMantelzorger = mysqli_query($connection, stripslashes($queryMantelzorger));
								while($rowMantelzorger = mysqli_fetch_array($resultMantelzorger)){
									$mantelzorgerNaam = $rowMantelzorger['Naam'];
							}
							
							echo 	'<a href="item/index.php?logboekID=' . $row['LogboekID'] . '"' . 'class="klik-logboek">
										<div class="col-1-1 no-p home-blok logboek">
											<h2>' . $row['Titel'] . '<span>' . $date . ' - ' . $mantelzorgerNaam . '</span></h2>
												<p>' . $row['Bericht'] . '</p>
										</div>
									</a>';
						}
					}
				    
			    ?>

		    	</div>
		    	
	    	</div>
	    	
	    	<div class="h50"></div>
	    	
	    </section>
    </div>
    
    <a href="new/"><div class="col-1-1 btn btnnieuw"></div></a>

    
    <script src="/scripts/default.js"></script>
</body>
</html>
