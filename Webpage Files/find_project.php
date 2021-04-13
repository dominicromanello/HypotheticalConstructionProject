<?php
	require_once('../mysqli_config.php'); //Connect to the database
	$query = "SELECT projectid, name FROM Project ORDER BY name";
	$result = mysqli_query($dbc, $query);
	//Fetch all rows of result as an associative array
	if($result)
		mysqli_fetch_all($result, MYSQLI_ASSOC);
	else { 
		echo "<h2>We are unable to process this request right now.</h2>"; 
		echo "<h3>Please try again later.</h3>";
		exit;
	} 
	mysqli_close($dbc);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>HAFA</title>
	<meta charset ="utf-8"> 
</head>
<body>
	<h2>Look Up Project</h2>

	<form action = "project_data.php" method="get">
		<!-- Use a PHP loop to generate a select list of vendors in the DB -->
		Select the project you are searching for: 
		<select name="projectid">
		<?php foreach ($result as $project) {
			//store the row array variables as scalar variables to simplify syntax
			$id = $project['projectid'];
			$name = $project['name'];
			//create an html option tag using \ to escape the " characters required for the html attribute
			echo "<option value=\"$id\">$name</option>";
		} ?>
		</select>
		<input type="submit" value="Find Project">
	</form>
	<h3><a href="index.html">Back to Home</h3>
</body>    
</html>