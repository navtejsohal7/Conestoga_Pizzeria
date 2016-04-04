<?php

$error = ''; // Initialize error as blank
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // check if the form is submitted
	#### removing extra white spaces & escaping harmful characters ####
	
	$first_name 		= trim($_POST['fname']);
	$last_name 			= trim($_POST['lname']);
	$address            = trim($_POST['address']);
	$city               = trim($_POST['city']);
	$province			= $_POST['provinceid'];
	$pcode              = trim($_POST['pcode']);
	$telephone          = $_POST['telephone'];
	$email 				= $_POST['email'];
	$number_of_pizza    = $_POST['numberofpizza'];
	$toppings           = $_POST['topping'];
	$crust              = $_POST['crust'];
	$size               = $_POST['size'];
	
	#### start validating input data ####
	#####################################
 

 
	# Validate First Name #
		// if its not alpha numeric, throw error
		if (!ctype_alpha(str_replace(array("'", "-"), "",$first_name))) { 
			$error .= '<p class="alert alert-danger"><strong>Error!</strong> First name should be alpha characters only.</p>';
		}
		// if first_name is not 3-20 characters long, throw error
		if (strlen($first_name) < 3 OR strlen($first_name) > 20) {
			$error .= '<p class="alert alert-danger"><strong>Error!</strong> First name should be within 3-20 characters long.</p>';
		}
 
	# Validate Last Name #
		// if its not alpha numeric, throw error
		if (!ctype_alpha(str_replace(array("'", "-"), "", $last_name))) { 
			$error .= '<p class="alert alert-danger"><strong>Error!</strong> Last name should be alpha characters only.</p>';
		}
		// if first_name is not 3-20 characters long, throw error
		if (strlen($last_name) < 3 OR strlen($last_name) > 20) {
			$error .= '<p class="alert alert-danger"><strong>Error!</strong> Last name should be within 3-20 characters long.</p>';
		}
 
    # Validate Address #
    // if address is not 3-20 characters long, throw error
		if (strlen($address) < 3 OR strlen($address) > 50) {
			$error .= '<p class="alert alert-danger"><strong>Error!</strong> Address should be within 3-50 characters long.</p>';
		}
		
	# Validate City #
	// if its not alpha numeric, throw error
	if (!ctype_alpha(str_replace(array("'", "-"), "", $city))) { 
		$error .= '<p class="alert alert-danger"><strong>Error!</strong> City should be alpha characters only.</p>';
	}
	// if first_name is not 3-20 characters long, throw error
	if (strlen($city) < 3 OR strlen($city) > 20) {
		$error .= '<p class="alert alert-danger"><strong>Error!</strong> City should be within 3-20 characters long.</p>';
	}
    
 
	# Validate Email #
		// if email is invalid, throw error
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // you can also use regex to do same
			$error .= '<p class="alert alert-danger"><strong>Error!</strong> Enter a valid email address.</p>';
		}
		
	# Validate Province #
	    // if province is not selected, throw error
		if (!isset($province)) {
			$error .= '<p class="alert alert-danger"><strong>Error!</strong> Please select Province.</p>';
		}
		
	# Validate Postal Code #
	    $pattern_preg_match="^([ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ])\ {0,1}(\d[ABCEGHJKLMNPRSTVWXYZ]\d)$";
        // if (!preg_match($pattern_preg_match,$pcode))
        // {
        //     $error .= '<p class="alert alert-danger"><strong>Error!</strong> Enter a valid Postal Code.</p>';
        // }
 
	# Validate Phone #
		// if phone is invalid, throw error
		if (!ctype_digit($telephone) OR strlen($telephone) != 10) {
			$error .= '<p class="alert alert-danger"><strong>Error!</strong> Enter a valid phone number.</p>';
		}
		
	# Validate Number of Pizza #
		if (strlen($number_of_pizza)==0 OR $number_of_pizza == 0) {
			$error .= '<p class="alert alert-danger"><strong>Error!</strong> Please Enter number of pizza(s).</p>';
		}
 

 
	# Validate Toppings #
		// if topping is not selected, throw error
		if (!isset($toppings)) {
			$error .= '<p class="alert alert-danger"><strong>Error!</strong> Please select your Toppings.</p>';
		}
		
	# Validate Crust #
    	// if crust is not selected, throw error
    	if (!isset($crust)) {
    		$error .= '<p class="alert alert-danger"><strong>Error!</strong> Please select any Crust.</p>';
    	}
	
	
	# Validate Size #
    	// if size is not selected, throw error
    	if (!isset($size)) {
    		$error .= '<p class="alert alert-danger"><strong>Error!</strong> Please select any size.</p>';
    	}
 
	
 

    }
?>