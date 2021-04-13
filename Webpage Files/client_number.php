<?php
	//Make sure this page was called from find_manager.html
	if(!empty($_GET['projectid'])) {
		$id = $_GET['projectid'];
		require_once('../mysqli_config.php'); //adjust the relative path as necessary to find your config file
		//Retrieve specific vendor data using prepared statements:
        $query = "SELECT phonenumber,companyname,email FROM Client
                    WHERE clientid = 
                        (SELECT clientid FROM Project
                         WHERE projectid = ?)";
		$stmt = mysqli_prepare($dbc, $query);
		mysqli_stmt_bind_param($stmt, "i", $id); //second argument one for each ? either i(integer), d(double), b(blob), s(string or anything else)
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt); 
		
		if($result){ //it ran successfully
			$client= mysqli_fetch_assoc($result); //Fetches the row as an associative array with DB attributes as keys
			//Assign the array variable to scalar variables to simplify output statements
			$clientname = $client['companyname'];
			$phonenumber = $client['phonenumber'];
			$email = $client['email'];

		}
		else {
			echo "That project was not found";
			mysqli_close($dbc);
			exit;
		}
	} // end isset
	else {
		echo "You have reached this page in error";
		exit;
	}
	//Vendor found, output results
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Client Number</title>
	<meta charset ="utf-8"> 
</head>
<body>
	<h2>Client Data:</h2>
	<?php
		echo "<h3>Client Name: $clientname</h3>";
		echo "<h3>Phone Number: $phonenumber</h3>";
		echo "<h3>Email: $email</h3>";

	?>
	<br>
	<h3><a href="find_client_number.php">Lookup another project</a></h3>
	<h3><a href="index.html">Back to Home</a></h3>
</body>
</html>