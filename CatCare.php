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
    <title> Cat Care </title>
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
			<h2>Cat Care</h2>
			<table>
				<tr>
					<td style="vertical-align: top;"><p>
						Click 
						<a href = "https://www.aspca.org/pet-care/cat-care/general-cat-care">here</a>
						to see general instructions by ASPCA on how to take care of a cat.
						<br><br>
						Click 
						<a href = "https://www.wikihow.pet/Take-Care-of-a-Cat">here</a>
						to see general instructions by WikiHow on how to take care of a cat.
					</p></td>
					
					<td><img src = "Julia'sCatShowingBelly.jpg"
								alt = "An image of Pepito the cat showing his belly (Julia's cat)."
								width = "250" height = "300">
					</td>
				</tr>
			</table>
		</article>
	</main>
	<?php include('footer.php'); ?>
  </body>
</html>