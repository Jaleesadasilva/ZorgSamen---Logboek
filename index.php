<?php
	
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);
	
	session_start();
	
	$url = "http://prototype.zorg-samen.nu";
	
	require_once("includes/connection.php");
	require_once("includes/functions.php");
	
	if(isset($_SESSION['login']) && $_SESSION['login'] == "login"){
	    $mantelzorgerID = veilig($_SESSION['mantelzorgerID']);
	    $zorgvragerID = veilig($_SESSION['zorgvragerID']);
	    
	    header("Location: $url/home");
	}
	
	if(isset($_POST['login']) && $_POST['naam'] != "" && $_POST['wachtwoord'] != ""){
		$email = veilig($_POST['naam']);
		$wachtwoord = veilig($_POST['wachtwoord']);
		
		$query = "SELECT `MantelzorgerID`, `Naam`, `Relatie`, `Email`, `Wachtwoord`, `Admin`, `Profielfoto`, `ZorgvragerID` FROM `Mantelzorger` WHERE `Email` = '$email'";
		$result = mysqli_query($connection, stripslashes($query)) or die(mysqli_error());
        $record = mysqli_fetch_assoc($result);
        
		// Hier wordt gecontroleerd in de database of de klant wel het juiste wachtwoord heeft ingevoerd
        $Email = $record['Email'];
        $Wachtwoord = $record['Wachtwoord']; 
        if ($email == $Email && $wachtwoord == $Wachtwoord){
	        $_SESSION['login'] = "login";
			$_SESSION['admin'] = $record['Admin'];
	        $_SESSION['mantelzorgerID'] = $record['MantelzorgerID'];
	        $_SESSION['zorgvragerID'] = $record['ZorgvragerID'];
        } else {
	        
	        header("Refresh:0");
	    	
	    }
        
        $url = "http://prototype.zorg-samen.nu/home/"; 
        header("Location: $url");
	    exit(); 
    }
	
	
	
?>

<!doctype html>
<html>

<head>
    <title>ZorgSamen</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes, minimum-scale=0, maximum-scale=2" />

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="/styles/reset.css" />
    <link rel="stylesheet" type="text/css" href="/styles/simplegrid.css" />
    <link rel="stylesheet" type="text/css" href="/styles/fonts.css" />
    <link rel="stylesheet" type="text/css" href="/styles/helpers.css" />
    <link rel="stylesheet" type="text/css" href="/styles/styleguide.css" />
    <link rel="stylesheet" type="text/css" href="/styles/default.css" />
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script type="text/javascript" src="/scripts/modernizr-custom.js"></script>

</head>
<body>
	
<!-- HEADER -->
	<header class="col-1-1">
		<div class="grid">
			<a href="/home"><div id="headerlogo"></div></a>
		</div>
	</header>
	

<!-- TITEL -->
	<div id="paginatitel" class="col-1-1">Login</div>

    <div class="grid grid-pad">
	    
<!-- EINDE TITEL -->
	    
<!-- MAIN -->
	    <section id="main" class="col-1-1 no-p">
		    
	    	<div class="col-1-3 push-1-3 md-col-1-2 md-push-1-4 sm-col-8-12 sm-push-2-12 xs-col-1-1 xs-no-push">
		    	<form method="post" action="">
			    	<label>Gebruikersnaam</label>
			    	<input type="email" name="naam" />
			    	
			    	<label>Wachtwoord</label>
			    	<input type="password" name="wachtwoord" />
			    	
			    	<div class="col-1-1 no-p">
			    		<button type="submit" name="login" class="col-1-1 btn">Login</button>
			    	</div>
		    	</form>
	    	</div>  
	    	
	    </section>
    </div>
    
<!--     <a href="#"><div class="col-1-1 btn btnnieuw"></div></a> -->

    
    <script src="scripts/default.js"></script>
</body>
</html>
