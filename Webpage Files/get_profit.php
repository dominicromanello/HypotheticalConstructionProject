<?php
	require_once('../mysqli_config.php'); //Connect to the database
	$query = 'SELECT getProfit(revenue, cost), projectid, name FROM Project';
	$result = mysqli_query($dbc, $query);
	//Fetch all rows of result as an associative array
	if($result)
		mysqli_fetch_all($result, MYSQLI_ASSOC); //get the result as an associative, 2-dimensional array
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
    <title>Profits</title>
	<meta charset ="utf-8"> 
</head>
<body>
	<h2>Profits</h2>
	
    <table>
		<tr>
			<th>Project ID</th>
			<th>Name</th>
			<th>Profit</th>
		</tr>	
		<?php foreach ($result as $project) {
			echo "<tr>";
			echo "<td>".$project['projectid']."</td>";
			echo "<td>".$project['name']."</td>";
			echo "<td>".$project['getProfit(revenue, cost)']."</td>";
			echo "</tr>";
		}
        ?>
    <h3><a href="index.html">Back to Home</a></h3>
</body>    
</html>


