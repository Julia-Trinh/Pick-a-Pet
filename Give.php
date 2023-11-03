<!-- 
	Julia Trinh 40245980 
	SOEN287 section W
	Assignment 3
	Exercise 4
-->
<?php
session_start();

if(isset($_SESSION['loggedin'])){
?>
	
<!DOCTYPE html>

<html lang = "en">
  <head> 
	<link rel="stylesheet" href="Design.css">
    <title> Have a Pet to Give Away </title>
    <meta charset = "utf-8" />
	<style>
		article form {
			padding: 5px 20px 20px;
			font-size: 17px;
		}
	</style>
  </head>
  <body>
	<script>
		function checkForm() {
			var x = document.forms["myForm"]["dogOrCat"].value;
			var y = document.forms["myForm"]["gender"].value;
			var more = document.forms["myForm"]["moreAbout"].value;
			var fname = document.forms["myForm"]["fullname"].value;
			var emailV = document.forms["myForm"]["email"].value;

			if (x == "" || x == null || y == "" || y == null || more == "" || more == null || fname == "" || fname == null || emailV == "" || emailV == null) {
				alert("Make sure that no field is left blank.");
				return false;
			}
			// Regex code for an email of valid format
			var validEmailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
			
			if (!emailV.match(validEmailRegex)) {
				alert("Please enter a valid email.");
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
			<h2>Have a Pet to Give Away</h2>
			<table>
				<tr>
					<td><form name="myForm" onsubmit="return checkForm()" method = "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
					
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
									<option value="Other">Other</option>
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
								</select>
							</label>
							<br>
							<label id="catB">
								Cat:
								<select name="breedCat">
									<option value="Other">Other</option>
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
								</select>
							</label>
							
							<br><br>
							
							<label><b>Age:</b>
								<select name="age">
									<option value="Under 1 year old">Under 1 year old</option>
									<option value="From 1 to 3 years old">From 1 to 3 years old</option>
									<option value="From 3 to 6 years old">From 3 to 6 years old</option>
									<option value="From 6 to 9 years old">From 6 to 9 years old</option>
									<option value="Older than 9 years old">Older than 9 years old</option>
								</select>
							</label>
							
							<br><br>
							
							<label><b>Gender:</b>
								<input type="radio" name="gender" value="male"/>
								Male
							</label>
							<label>
								<input type="radio" name="gender" value="female"/>
								Female
							</label>
							
							<br><br>
							
							<label><b>Gets along with:</b><br>
								<input type="checkbox" name="friendly[]" value="otherDogs"/>
								Other dogs
							</label>
							<br>
							<label>
								<input type="checkbox" name="friendly[]" value="otherCats"/>
								Other cats
							</label><br>
							<label>
								<input type="checkbox" name="friendly[]" value="children"/>
								Small children
							</label>
							
							<br><br>
							
							<label><b>More about the animal:</b><br>
								<textarea name="moreAbout" rows="3" cols="40"></textarea>
							</label>
							
							<br><br>
							
							<label><b>Current owner's full name (family and given name):</b>
								<input type="text" name="fullname"/>
							</label>
							
							<br><br>
							
							<label><b>Current owner's email:</b>
								<input type="email" name="email"/>
							</label>
							
							<br><br>
							
							<input type = "submit"  value = "Submit" />
							<input type = "reset"  value = "Clear" onclick="resetBreed()"/>
					</form>
					<?php
						if($_SERVER["REQUEST_METHOD"] == "POST"){
							$file = fopen("availablePetInfo.txt", "a+");
							
							// Get the information
							$dogOrCat = $_POST["dogOrCat"];	  // Get the animal
							
							if ($dogOrCat == "dog"){          // Get the breed
								$breed = $_POST["breedDog"];
							}
							else if ($dogOrCat == "cat"){
								$breed = $_POST["breedCat"];
							}
							
							$age = $_POST["age"];             // Get the age
							$gender = $_POST["gender"];       // Get the gender
							
							if (isset($_POST["friendly"])) {  // Get who they get along with
								$friendlyArr = $_POST["friendly"];
								$friendly = "";
								foreach($friendlyArr as $friendlyValue){
									if ($friendly == ""){$friendly = $friendlyValue;}
									else {$friendly = $friendly.",".$friendlyValue;}
								}
							}
							else{
								$friendly = "none";
							}
							
							$moreAbout = $_POST["moreAbout"]; // Get more info
							$fullName = $_POST["fullname"];   // Get the owner's name
							$email = $_POST["email"];         // Get the owner's email
							
							// Get the index
							$index = 0;
							while(!feof($file)){
								fgets($file);
								$index++;
							}
							
							// write to file
							$petInfo = $index.":".$dogOrCat.":".$breed.":".$age.":".$gender.":".$friendly.":".$moreAbout.":".$fullName.":".$email."\n";
							fwrite($file, $petInfo);
							
							fclose($file);
						}
					?></td>
				
					<td><img src = "Julia'sCatInBox.jpg"
							alt = "An image of Pepito the cat in a box (Julia's cat)."
							style="max-width: 80%">
					</td>
				</tr>
			</table>
			<br>
		</article>
	</main>
	<?php include('footer.php'); ?>
  </body>
</html>

<?php
}
else {
	header("Location: Login.php");
	exit();
}
?>