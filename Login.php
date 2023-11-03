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
    <title> Login </title>
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
		
		function accountDoesNotExist() {
			alert("Username or password does not match up any existing accounts. Please try again.");
			return false;
			
		}
	</script>
	<?php include('header.php'); ?>
	<main>
		<?php include('nav.php'); ?>
		<article>
			<h2>Login</h2>
			<p>You must first login. If you do not have an account yet, you must first create one.</p>
			<table>
				<tr>
					<td>
						<form name="myForm" onsubmit="return checkForm()" method = "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							
							<label><b>Enter Your Username: </b>
								<input type="text" name="username"/>
							</label><br>
							
							<br><br>
							
							<label><b>Enter Your Password: </b>
								<input type="text" name="password"/>
							</label><br>
							
							<br><br><br><br>
							
							<input type = "submit"  value = "Submit" />
							<input type = "reset"  value = "Clear"/>							
						</form>
						<?php
							session_start();
							if($_SERVER["REQUEST_METHOD"] == "POST"){
								$file = fopen("loginFile.txt", "r");
								$username = $_POST["username"];
								$password = $_POST["password"];
								$exists = false;
									
								while(!feof($file)){ // Read all lines
									$accountLine = fgets($file);
									if (strpos($accountLine, ":") != false){ // Check if line contains (:)
										$accountArray = explode(':', $accountLine); // split by (:)
										if ($accountArray[0] == $username && trim($accountArray[1]) == $password){
											$exists = true;
										}
									}
								}
								if ($exists == false){ // alert box if does not exist
									fclose($file);
									echo "<script>accountDoesNotExist();</script>";
								}
								else{ // redirect back
									fclose($file);
									$_SESSION['loggedin'] = "yes";
									header("Location: Give.php");
									exit();
								}
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