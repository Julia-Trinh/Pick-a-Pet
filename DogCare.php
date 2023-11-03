<!-- 
	Julia Trinh 40245980 
	SOEN287 section W
	Assignment 3
	Exercise 4
-->

<!DOCTYPE html>

<html lang = "en">
  <head> 
	<link rel="stylesheet" href="Design.css">
    <title> Dog Care </title>
    <meta charset = "utf-8" />
	<style>
		article p a {
			font-weight: bold;
			color: orange;
		}
		article img{
			padding-left: 100px;
		}
	</style>
  </head>
  
  <body>
	<?php include('header.php'); ?>
	<main>
		<?php include('nav.php'); ?>
		<article>
			<h2>Dog Care</h2>
			<table>
				<tr>
					<td style="vertical-align: top;"><p>
						Click 
						<a href = "https://www.aspca.org/pet-care/dog-care/general-dog-care">here</a>
						to see general instructions by ASPCA on how to take care of a dog.
						<br><br>
						Click 
						<a href = "https://www.wikihow.pet/Take-Care-of-a-Dog">here</a>
						to see general instructions by WikiHow on how to take care of a dog.
					</p></td>
					
					<td><img src = "Soria'sDog.jpg"
										alt = "An image of Soria's dog."
										width = "250" height = "300">
					</td>
				</tr>
			</table>
		</article>
	</main>
	<?php include('footer.php'); ?>
  </body>
</html>