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
    <title> Find a Dog/Cat</title>
    <meta charset = "utf-8" />
	<style>
		article form {
			padding: 5px 20px;
			font-size: 17px;
		}
		article img {
			padding-left: 100px;
		}
	</style>
  </head>
  
  <body>
	<script>
		function checkForm() {
			var x = document.forms["myForm"]["dogOrCat"].value;
			var y = document.forms["myForm"]["gender"].value;

			if (x == "" || x == null || y == "" || y == null) {
				alert("Make sure that no field is left blank.");
				return false;
			}
		}
		// Take out the option of breeds for the non-desired animal
		function isDog() {
			document.getElementById("catB").style.display = "none";
		}
		function isCat() {
			document.getElementById("dogB").style.display = "none";
		}
		// Redisplay both animals' breeds
		function resetBreed() {
			document.getElementById("catB").style.display = "inline";
			document.getElementById("dogB").style.display = "inline";
		}
	</script>
	<?php include('header.php'); ?>
	<main>
		<?php include('nav.php'); ?>
		<article>
			<h2>Find a Dog/Cat</h2>
			<table>
				<tr>
					<td><form name="myForm" onsubmit="return checkForm()" action="Browse.php" method="post">
						<label><b>Select animal:</b>
							<input type="radio" name="dogOrCat" value="dog" onclick="isDog()"/>
							Dog
						</label>
						<label>
							<input type="radio" name="dogOrCat" value="cat" onclick="isCat()"/>
							Cat
						</label>
						
						<br><br>
						
						<label><b>Select breed:</b><br></label>
						<label id="dogB">
							Dog:
							<select name="breedDog">
								<option value="any">Doesn't Matter</option>
								<option value="Golden Retriever">Golden Retriever</option>
								<option value="Boston Terrier">Boston Terrier</option>
								<option value="Labrador Retriever">Labrador Retriever</option>
								<option value="Poodle">Poodle</option>
								<option value="Shih Tzu">Shih Tzu</option>
								<option value="French Bulldog">French Bulldog</option>
								<option value="Cocker Spaniel">Cocker Spaniel</option>
								<option value="Greyhound">Greyhound</option>
								<option value="Australian Shepherd">Australian Shepherd</option>
								<option value="Pomeranian">Pomeranian</option>
								<option value="Other">Other</option>
							</select>
						</label>
						<br>
						<label id="catB">
							Cat:
							<select name="breedCat">
								<option value="any">Doesn't matter</option>
								<option value="Abyssinian">Abyssinian</option>
								<option value="Aegean">Aegean</option>
								<option value="American Bobtail">American Bobtail</option>
								<option value="American Shorthair">American Shorthair</option>
								<option value="Bengal">Bengal</option>
								<option value="Birman">Birman</option>
								<option value="Munchkin">Munchkin</option>
								<option value="Persian">Persian</option>
								<option value="Ragdoll">Ragdoll</option>
								<option value="Siamese">Siamese</option>
								<option value="Cornish Rex">Cornish Rex</option>
								<option value="Other">Other</option>	
							</select>
						</label>
						
						<br><br>
						
						<label><b>Preferred age:</b>
							<select name="age">
								<option value="any">Doesn't matter</option>
								<option value="Under 1 year old">Under 1 year old</option>
								<option value="From 1 to 3 years old">From 1 to 3 years old</option>
								<option value="From 3 to 6 years old">From 3 to 6 years old</option>
								<option value="From 6 to 9 years old">From 6 to 9 years old</option>
								<option value="Older than 9 years old">Older than 9 years old</option>
							</select>
						</label>
						
						<br><br>
						
						<label><b>Preferred gender:</b>
							<input type="radio" name="gender" value="male"/>
							Male
						</label>
						<label>
							<input type="radio" name="gender" value="female"/>
							Female
						</label>
						<label>
							<input type="radio" name="gender" value="any"/>
							Doesn't matter
						</label>
						
						<br><br>
						
						<label><b>Needs to get along with:</b><br>
							<input type="checkbox" name="friendly[]" value="otherDogs"/>
							Other dogs
						</label>
						<br>
						<label>
							<input type="checkbox" name="friendly[]" value="otherCats"/>
							Other cats
						</label>
						<br>
						<label>
							<input type="checkbox" name="friendly[]" value="children"/>
							Small children
						</label>
						
						<br><br><br>
						
						<input type = "submit"  value = "Submit" />
						<input type = "reset"  value = "Clear" onclick="resetBreed()"/>
					</form>
					</td>
			
					<td><img src = "FindJulia'sCat.jpg"
									alt = "An image of Pepito the cat hiding (Julia's cat)."
									width = "250" height = "300">
					</td>
				</tr>	
			</table>	
			<br>
		</article>
	</main>
	<?php include('footer.php'); ?>
  </body>
</html>