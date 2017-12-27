<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Url Shortener</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bulma.min.css">
  </head>
  <body>
	<nav class="navbar" role="navigation" aria-label="main navigation">
	  <div class="navbar-brand">
	    <a class="navbar-item" href="#">
	      <img src="https://bulma.io/images/bulma-logo.png" alt="Url Shortener: simple url shortener service" width="112" height="28">
	    </a>
	    <a href="#" class="navbar-item">Home</a>
	    <a href="#" class="navbar-item">Create</a>

	    <button class="button navbar-burger">
	      <span></span>
	      <span></span>
	      <span></span>
	    </button>
	  </div>
	</nav>  
	  <section class="section">
	    <div class="container">
	    	<div class="field">
			  <label class="label">Enter your URL below:</label>
			  	<div class="columns ">
				  	<div class="column">
					  		<div class="field is-grouped">
						    <input class="input" type="text" placeholder="Enter the URL here">
						    <a class="button is-info is-rounded">Go</a>
					  		</div>
					  	<?php					  	

					  		if ($generated_url){
					  			echo '<p class="help">Here is your URL:'.$generated_url.'</p';
					  			exit(0);
					  		}
					  		echo '<p class="error">URL must be a valid url (include the protocol)</p>';
					  	?>
				  	</div>
			  	</div>
			</div>	
	    </div>
	  </section>		
	<footer>
		<!--====  footer section  ====-->
	</footer>
  </body>
</html>