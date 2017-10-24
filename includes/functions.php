<?php
	
	/**
	* make value clear en safe for upload to database
	*
	* @param	$value		value for uploading to database
	* @return	$newVal		clear en safe value for uploading to database
	*/
	function veilig($value) {
		global $connection;
  		$newVal = trim($value);
  		$newVal = htmlspecialchars($newVal);
  		$newVal = mysqli_real_escape_string($connection, $newVal);
  		return $newVal;
	}
	
	/**
	* change date to dutch
	*
	* @param	$datum		date you will change
	* @return	$datum		dutch date
	* @author http://netters.nl/nederlandse-datum-in-php
	*/ 
    function nlDate($datum){ 

      // Vervang de maand, hoofdletters 
     $datum = str_replace("January",     "januari",         $datum); 
       $datum = str_replace("February",     "februari",     $datum); 
      $datum = str_replace("March",         "maart",         $datum); 
       $datum = str_replace("April",         "april",         $datum); 
       $datum = str_replace("May",         "mei",             $datum); 
       $datum = str_replace("June",         "juni",         $datum); 
      $datum = str_replace("July",         "juli",         $datum); 
      $datum = str_replace("August",         "augustus",     $datum); 
       $datum = str_replace("September",     "september",     $datum); 
       $datum = str_replace("October",     "oktober",         $datum); 
       $datum = str_replace("November",     "november",     $datum); 
      $datum = str_replace("December",     "december",     $datum); 

      // Vervang de dag, hoofdletters 
       $datum = str_replace("Monday",         "Maandag",         $datum); 
       $datum = str_replace("Tuesday",     "Dinsdag",         $datum); 
       $datum = str_replace("Wednesday",     "Woensdag",     $datum); 
     $datum = str_replace("Thursday",     "Donderdag",     $datum); 
     $datum = str_replace("Friday",         "Vrijdag",         $datum); 
       $datum = str_replace("Saturday",     "Zaterdag",     $datum); 
      $datum = str_replace("Sunday",         "Zondag",         $datum); 

      return $datum; 
  }

    function randomPassword() {
      $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
      $pass = array(); //remember to declare $pass as an array
      $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
      for ($i = 0; $i < 10; $i++) {
          $n = rand(0, $alphaLength);
          $pass[] = $alphabet[$n];
      }
      return implode($pass); //turn the array into a string
  }
	
?>