<?php
	
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);
	
	$url = "http://prototype.zorg-samen.nu";
	
	session_start();
	
	require_once("connection.php");
	require_once("functions.php");
	
	if(isset($_SESSION['login']) && $_SESSION['login'] == "login"){
	    $mantelzorgerID = veilig($_SESSION['mantelzorgerID']);
	    $zorgvragerID = veilig($_SESSION['zorgvragerID']);
	} else {
	    header("Location: $url");
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
			<a href="/home">
				<div id="headerlogo"></div>
			</a>
			
			<?php
				
				if(strpos($_SERVER['REQUEST_URI'], 'home') !== false) {
					echo 	'<a href="/profiel">
								<div id="headerbutton">
									<i class="fa fa-user" aria-hidden="true"></i>
								</div>
							</a>';
				}else {
					echo 	'<a href="/home">
								<div id="headerbutton">
									<i class="fa fa-home" aria-hidden="true"></i>
								</div>
							</a>';
				}
				
			?>
			
			
		</div>
	</header>