<?php 
	/**
	 * Create a "Random" String
	 *
	 * @param	string	type of random string.  basic, alpha, alnum, numeric, nozero, unique, md5, encrypt and sha1
	 * @param	int	number of characters
	 * @return	string
	 */
	function random_string($type = 'alnum', $len = 8)
	{
		switch ($type)
		{
			case 'basic':
				return mt_rand();
			case 'alnum':
			case 'numeric':
			case 'nozero':
			case 'alpha':
				switch ($type)
				{
					case 'alpha':
						$pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						break;
					case 'alnum':
						$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						break;
					case 'numeric':
						$pool = '0123456789';
						break;
					case 'nozero':
						$pool = '123456789';
						break;
				}
				return substr(str_shuffle(str_repeat($pool, ceil($len / strlen($pool)))), 0, $len);
			case 'unique': // todo: remove in 3.1+
			case 'md5':
				return md5(uniqid(mt_rand()));
			case 'encrypt': // todo: remove in 3.1+
			case 'sha1':
				return sha1(uniqid(mt_rand(), TRUE));
		}
	}	

	function is_existing($url_code='')	
	{
		$pdo = Database::connect();
        $sql = 'SELECT count(*) FROM urls.`urls` where url_code=$url_code';
        $result = $pdo->query($sql);               
        Database::disconnect();		        
        return $result;
	}

	function insert_code($url_code='',$url_address='')
	{
		$pdo = Database::connect();
        $statement = $pdo->prepare('INSERT INTO urls.`urls` (url_code, url_address) VALUES (?,?)');
        $statement->bindParam(1, $url_code);
        $statement->bindParam(2, $url_address);

        $result = $statement->execute();
        Database::disconnect();		        
        return $result;		

	}

	function generate_url($user_url='')
	{
		// if(!filter_var($user_url, FILTER_VALIDATE_URL))	
		// 	return '';	
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/';

		$url_code = random_string('alnum', 8);         
		if( !is_existing($url_code) )
		{
			// save url code to database
			insert_code($url_code,$user_url);			

			// generate full url
			return $host.$url_code;
		}

		return $host;
	}


	   
    // credits http://blogs.shephertz.com/2014/05/21/how-to-implement-url-routing-in-php
    function getCurrentUri()
    {
        $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
        if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
        $uri = '/' . trim($uri, '/');
        return $uri;
    }


    function getCurrentRoute(){
    	    $base_url = getCurrentUri();
		    $routes = array();
		    $routes = explode('/', $base_url);

		    foreach($routes as $route)
		    {
		        if(trim($route) != '')
		            array_push($routes, $route);
		    }
		    return $routes;
    }