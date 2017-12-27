<?php 

function generate_url($user_url='')
{
	if(!filter_var($user_url, FILTER_VALIDATE_URL))	
		return '';	
	
	return 'http://foo.com/123145';	
}