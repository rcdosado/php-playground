<?php 

require 'database.php';
require 'functions.php';

// if post contains something
if(!empty($_POST)){

	// if urlvalue variable is not empty
	if(!empty($_POST['urlvalue'])){

		// check if its a valid URL
		$url = filter_var($_POST['urlvalue'], FILTER_VALIDATE_URL);
		if($url){
			$generated_url = generate_url($url);
		}	

	}	
}else {
	 $generated_url = $_SERVER['HTTP_HOST'];
}
require 'index.tmp.php';
