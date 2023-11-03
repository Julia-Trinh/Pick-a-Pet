<script>
	setInterval(currentTime, 1000);
	function currentTime() {
		const t = new Date();
		document.getElementById("time").innerHTML = t.toLocaleString();
	}
</script>
<header>
	<table>
		<tr>
			<th><p>Pick-a-Pet</p></th>
			<td><a href = "Home.php">
					<img src = "logo.png" 
							alt = "Image from https://www.google.com/url?sa=i&url=https%3A%2F%2Fen.wikipedia.org%2Fwiki%2FFile%3ADog_Paw_Print.png&psig=AOvVaw2bSDbT00ttA-eVzk5ZtZex&ust=1675828012883000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCMiVlfe_gv0CFQAAAAAdAAAAABAJ" 
							width = "150" height = "150">
				</a>
			</td>
		</tr>
		<tr>
			<th id="time">---------------------</th>
			<th></th>
		</tr>
	</table>
</header>