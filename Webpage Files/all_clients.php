<?php
	require_once('../mysqli_config.php'); //Connect to the database
	$query = 'CALL SelectAllClients()';
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
    <title>Clients</title>
	<meta charset ="utf-8"> 
</head>
<body>
	<h2>Clients</h2>

	<table>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Phone Number</th>
			<th>Email</th>
		</tr>	
		<?php foreach ($result as $client) {
			echo "<tr>";
			echo "<td>".$client['clientid']."</td>";
			echo "<td>".$client['companyname']."</td>";
			echo "<td>".$client['phonenumber']."</td>";
			echo "<td>".$client['email']."</td>";
			echo "</tr>";
		}
		?>
    </table>
    <h3><a href="index.html">Back to Home</a></h3>
</body>    
</html>


