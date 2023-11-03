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
    <title> Browse Available Pets </title>
    <meta charset = "utf-8" />
	<style>
		div {
			border: 1px outset #7F8C78;
			width: 80%;
			margin: 10px 20px;
			padding: 10px;
		}
		div p { 
			font-size: 18px;
		}
	</style>
  </head>
  
  <body>
	<?php include('header.php'); ?>
	<main>
		<?php include('nav.php'); ?>
		<article>
			<h2>Browse Available Pets</h2>
			<?php
				$file = fopen("availablePetInfo.txt", "r");
										
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
					$friendly = "any";
				}

				// Find the matches
				while(!feof($file)){ // Read all lines
					$petInfoLine = fgets($file);
					if (strpos($petInfoLine, ":") != false){ // Check if line contains (:)
						$petInfoArray = explode(':', $petInfoLine); // split by (:) (should contain 9 fields)
						$matches = true;
						
						if ($petInfoArray[1] == $dogOrCat){
							if ($breed != "any"){
								if ($petInfoArray[2] != $breed){$matches = false;}
							}
							if ($age != "any"){
								if ($petInfoArray[3] != $age){$matches = false;}
							}
							if ($gender != "any"){
								if ($petInfoArray[4] != $gender){$matches = false;}
							}
							if ($friendly != "any"){
								if($petInfoArray[5] == "none"){$matches = false;}
								else {
									if (strpos($friendly, ",") == true){
										$friendlyInfoArr = explode(",", $friendly);
										foreach($friendlyInfoArr as $FriendlyInfo){
											if (!str_contains($petInfoArray[5], trim($FriendlyInfo))){$matches = false;}
										}
									}
									else{
										if (!str_contains($petInfoArray[5], trim($friendly))){$matches = false;}
									}
								}
							}
							if ($matches == true){
								
								// Set the display for friendly
								$displayFriendly = "";
								if($petInfoArray[5] == "none"){
									$displayFriendly = "Doesn't get along with other dogs, other cats, and small children";
								}
								else if (strpos($petInfoArray[5], ",") == true){
									$tempFriendlyArr = explode(",", $petInfoArray[5]);
									foreach($tempFriendlyArr as $tempInfo){
										if (trim($tempInfo) == "otherDogs") $displayFriendly = "Other dogs";
										if (trim($tempInfo) == "otherCats") {
											if ($displayFriendly == "") $displayFriendly = "Other cats";
											else $displayFriendly = $displayFriendly.", other cats";
										}
										if (trim($tempInfo) == "children") {
											if ($displayFriendly == "") $displayFriendly = "Children";
											else $displayFriendly = $displayFriendly.", children";
										}
									}
								}
								else {
									if (trim($petInfoArray[5]) == "otherDogs") $displayFriendly = "Other dogs";
									else if (trim($petInfoArray[5]) == "otherCats") $displayFriendly = "Other cats";
									else if (trim($petInfoArray[5]) == "children") $displayFriendly = "Small children";
								}
								
								// Display the Pet information
								echo '<div>
										<table>
											<tr>
												<td><p>
													<b>Animal:</b> '.$petInfoArray[1].'<br>
													<b>Breed:</b> '.$petInfoArray[2].'<br>
													<b>Age:</b> '.$petInfoArray[3].'<br>
													<b>Gender:</b> '.$petInfoArray[4].'<br>
													<b>Gets along with:</b> '.$displayFriendly.'<br>
													<b>More about the animal:</b> '.$petInfoArray[6].'<br>
													<b>Current owner\'s full name (family and given name):</b> '.$petInfoArray[7].'<br>
													<b>Current owner\'s email:</b> '.$petInfoArray[8].'
												</p></td>
												<td><button onclick="">Interested</button></td>
											</tr>
										</table>
									</div>';
							}
						}
					}
				}

				fclose($file);

			?>
		</article>
	</main>
	<?php include('footer.php'); ?>
  </body>
</html>