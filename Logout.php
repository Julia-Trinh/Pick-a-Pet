<!-- 
	Julia Trinh 40245980 
	SOEN287 section W
	Assignment 3
	Exercise 4
-->

<?php
	session_start();
	session_unset();
	session_destroy();
?>

<!DOCTYPE html>

<html lang = "en">
  <head> 
	<link rel="stylesheet" href="Design.css">
    <title> Logout </title>
    <meta charset = "utf-8" />
  </head>
  
  <body>
	<?php include('header.php'); ?>
	<main>
		<?php include('nav.php'); ?>
		<article>
			<h2>Logout</h2>
			<p>You are logged out.</p>
		</article>
	</main>
	<?php include('footer.php'); ?>
  </body>
</html>