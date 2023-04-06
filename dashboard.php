<?php 

echo " Dashboard";

require("dbcon.php");

if($con->connect_error){
	echo " Error connecting to DB" . $con->connect_error;
	die();
} else {
	//echo " Connection successful";
}


// Formulate query
$sqlQuery = "select * from users";

// Execute
$results = $con->query($sqlQuery);

// process
if ($results == TRUE) {
	while ( $row = $results->fetch_assoc()){

		echo "Name: " . $row["fname"] . "Password: ". $row["password"];
		echo "<br>";
	}


}



$con->close();

?>