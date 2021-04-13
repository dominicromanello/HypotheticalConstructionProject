<?php
	require_once('../mysqli_config.php'); //Connect to the database
	$query = 'SELECT manfirstname, manlastname, revenue, Project.clientid FROM Client LEFT JOIN Project ON Project.clientid = Client.clientid LEFT JOIN Manager ON Project.managerid = Manager.manid';
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
    <title>Manager Revenue</title>
	<meta charset ="utf-8"> 
</head>
<body>
	<h2>Manager Revenue</h2>

	<table>
		<tr>
			<th>Manager Name</th>
			<th>Revenue</th>
			<th>Client ID</th>
		</tr>	
		<?php foreach ($result as $manager) {
            $fname = $manager['manfirstname'];
            $lname = $manager['manlastname'];
            $name = $fname." ".$lname;
			echo "<tr>";
			echo "<td>".$name."</td>";
			echo "<td>".$manager['revenue']."</td>";
			echo "<td>".$manager['clientid']."</td>";
			echo "</tr>";
		}
		?>
    </table>
    <h3><a href="index.html">Back to Home</a></h3>
</body>    
</html>


