<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TESTING</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<div class="row">
	<div class="jumbotron">
		<h1>Hi There</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro culpa eos officiis repellendus delectus. Eos atque voluptate ut nemo temporibus labore, in ducimus quos, odit consectetur voluptates mollitia non. Qui.</p>
	</div>
</div>
<div class="row">
	<div class="col-sm-4"><p>Login</p></div>
	<div class="col-sm-8"><p>main</p></div>
</div>

<div class="row">
	<div class="col-sm-2">
<form>
  <div class="form-group">
    <label for="usr">Email address:</label>
    <input type="text" class="form-control" id="usr">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>	
	</div>
	<div class="col-sm-8"><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus cumque labore dolores laborum excepturi quo fuga id reiciendis, error rem quidem soluta quis aliquid saepe temporibus, molestiae molestias, officia quae?</div>
	<div>Nihil sunt minima amet ipsam voluptatibus distinctio alias nam quam provident aut. Placeat provident iure repudiandae, at obcaecati deleniti repellendus tempore ducimus voluptatem, qui nam officia atque quod ipsa iste.</div></div>
	<div class="col-sm-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos ab, laboriosam, laborum error minima fuga placeat, dolore repudiandae excepturi autem omnis reprehenderit! Neque ut deleniti incidunt minus esse placeat ullam!</div>
</div>


</div>


<script src="https://msp7l1170302145284.blob.core.windows.net/ms-p7-l1-170302-1453-24-assets/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
<?php

require 'auth.php';

die();

$userid = authenticate();

if ($userid != false) {
    echo "logged in!";
}

?>