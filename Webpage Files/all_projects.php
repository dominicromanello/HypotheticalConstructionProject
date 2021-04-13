<?php
	require_once('../mysqli_config.php'); //Connect to the database
	$query = 'SELECT * FROM Project';
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
    <title>Projects</title>
	<meta charset ="utf-8"> 
</head>
<body>
	<h2>Projects</h2>

	<table>
		<tr>
			<th>ID</th>
            <th>Name</th>
            <th>Client ID</th>
            <th>Manager ID</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Cost</th>
            <th>Revenue</th>
		</tr>	
		<?php foreach ($result as $project) {
			echo "<tr>";
			echo "<td>".$project['projectid']."</td>";
			echo "<td>".$project['name']."</td>";
			echo "<td>".$project['clientid']."</td>";
            echo "<td>".$project['managerid']."</td>";
            echo "<td>".$project['startdate']."</td>";
            echo "<td>".$project['enddate']."</td>";
            echo "<td>".$project['cost']."</td>";
            echo "<td>".$project['revenue']."</td>";
			echo "</tr>";
		}
		?>
    </table>
    <h3><a href="index.html">Back to Home</a></h3>
</body>    
</html>


