<?php
	if(!empty($_GET['companyname'])) {
		$companyname = $_GET['companyname'];
		
		require_once('../mysqli_config.php'); //adjust the relative path as necessary to find your config file
		//Retrieve specific vendor data using prepared statements:
		$query = "SELECT * FROM Client WHERE companyname LIKE ?";
		$stmt = mysqli_prepare($dbc, $query);
		mysqli_stmt_bind_param($stmt, "s", $companyname);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt); 
		$rows = mysqli_num_rows($result);
		if($rows>=1){ //Client found
			$client = mysqli_fetch_assoc($result); //Fetches the row as an associative array with DB attributes as keys
			$clientid = $client['clientid'];
			$companyname = $client['companyname'];
			$phonenumber = $client['phonenumber'];
			$email = $client['email'];
		} // end if($result)
		else {
			echo "<h2>That client was not found</h2>";
			mysqli_close($dbc);
			exit;
		}
	}
	else {
		echo "You have reached this page in error";
		exit;
	}
	//Clients found, output results
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Client Results</title>
	<meta charset ="utf-8"> 
	<!-- Add some spacing to each table cell -->
	<style> td, th {padding: 1em;} </style>
</head>
<body>
	<h2>Client Name: <?php echo "$companyname";?></h2>
	<h3>Client ID: <?php echo "$clientid";?></h3>
	<h3>Phone Number: <?php echo "$phonenumber";?></h2> 
	<h3>Email: <?php echo "$email";?></h2> 
	<h3><a href="find_client.html">Lookup another client</a></h3>
	<h3><a href="index.html">Back to Home</a></h3>
</body>
</html>