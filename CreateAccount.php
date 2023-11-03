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
    <title> Create an Account </title>
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
			var userN = document.forms["myForm"]["username"].value;
			var passW = document.forms["myForm"]["password"].value;

			if (userN == "" || userN == null || passW == "" || passW == null) {
				alert("Make sure that no field is left blank.");
				return false;
			}
			// Regex code for an username of valid format
			var validUsernameRegex = /^[a-zA-Z0-9]+$/;
			
			if (!userN.match(validUsernameRegex)) {
				alert("Make sure that your username does not contain any special characters.");
				return false;
			}
			
			// Regex code for an password of valid format
			var validPasswordRegex = /^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9]+$/;
			
			if (!passW.match(validPasswordRegex) || passW.length < 4) {
				alert("Make sure that your password match up the requirements.");
				return false;
			}
		}
		
		function usernameAlreadyExists() {
			alert("Username already exists. Please enter a different one.");
			return false;
			
		}
	</script>
	<?php include('header.php'); ?>
	<main>
		<?php include('nav.php'); ?>
		<article>
			<h2>Create an Account</h2>
			<table>
				<tr>
					<td>
						<form name="myForm" onsubmit="return checkForm()" method = "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							
							<label><b>Create an Username: </b>
								<input type="text" name="username"/>
							</label><br>
							<a style="color:#acbf9f; font-size:15px">Only letters (upper case and lower case) and digits allowed.</a>
							
							<br><br>
							
							<label><b>Create a Password: </b>
								<input type="text" name="password"/>
							</label><br>
							<a style="color:#acbf9f; font-size:15px">Must be at least 4 characters long, and must contain at least one letter and one digit (no special characters allowed.</a>
							
							<br><br><br><br>
							
							<input type = "submit"  value = "Submit" />
							<input type = "reset"  value = "Clear"/>							
						</form>
						<?php
							if($_SERVER["REQUEST_METHOD"] == "POST"){
								$file = fopen("loginFile.txt", "a+");
								$username = $_POST["username"];
								$password = $_POST["password"];
								$alreadyExists = false;
									
								while(!feof($file)){ // Read all lines
									$accountLine = fgets($file);
									$accountArray = explode(':', $accountLine); // split by (:)
									if ($accountArray[0] == $username){
										$alreadyExists = true;
									}
								}
								if ($alreadyExists == true){ // alert box if exists
									echo "<script>usernameAlreadyExists();</script>";
								}
								else{ // write to file
									$account = $username.":".$password."\n";
									fwrite($file, $account);
									echo "<p>Your account has been successfully created! You are now ready to login.</p>";
								}
								fclose($file);
							}
						?>
					</td>
				</tr>
			</table>
		</article>
	</main>
	<?php include('footer.php'); ?>
  </body>
</html>