<?php
	require_once('../mysqli_config.php'); //Connect to the database
	$query = 'SELECT * FROM Bid';
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
    <title>Bids</title>
	<meta charset ="utf-8"> 
</head>
<body>
	<h2>Bids</h2>

	<table>
		<tr>
			<th>Bid ID</th>
            <th>Subcontractor ID</th>
            <th>Project ID</th>
            <th>Amount</th>
            <th>Date</th>
		</tr>	
		<?php foreach ($result as $bid) {
			echo "<tr>";
			echo "<td>".$bid['bidid']."</td>";
			echo "<td>".$bid['subid']."</td>";
			echo "<td>".$bid['projectid']."</td>";
            echo "<td>".$bid['amount']."</td>";
            echo "<td>".$bid['date']."</td>";
			echo "</tr>";
		}
		?>
    </table>
    <h3><a href="index.html">Back to Home</a></h3>
</body>    
</html>


