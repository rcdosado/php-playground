<?php

function set_count($file_name = 'counter.txt'){
	if (file_exists($file_name)) {
		// read the value
		$handle = fopen($file_name, 'r');
		$count = (int) fread($handle,20) + 1;

		$handle = fopen($file_name, 'w');
		fwrite($handle, $count);
		
		//close the file
		fclose($handle);
	}else {
		// create it
		$handle = fopen($file_name, 'w+');
		$count = 1;
		
		// set a default value of 1
		fwrite($handle, $count);
		fclose($handle);
	}

	return $count;
}