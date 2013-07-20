<?php
include ('conf.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Nashira Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body>
  <div class="navbar">
  <div class="navbar-inner">
    <a class="brand" href="#">EqNetwork DevBlog</a>
    <ul class="nav">
      <li class="active"><a href="#">Home</a></li>
    </ul>
  </div>
</div>
  <div class="alert">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>About Nashira</strong> Nashira is a Dofus Private Server .
  </div>
    <h1>DevBlog</h1>
	<br>
	<br>
<form>
  <fieldset>
    <input type="text" id="name" name="name" class="input-block-level" placeholder="Name">
    <input type="text" id="email" name="email" class="input-block-level" placeholder="Email">
    <textarea rows="3" id="description" name="description" class="input-block-level" placeholder="Description"></textarea>
    <button type="submit" class="btn btn-warning pull-right">Submit</button>
  </fieldset>
</form>
	
	
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>