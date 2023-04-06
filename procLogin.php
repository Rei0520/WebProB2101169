<?php 

session_start();
require('dbcon.php');
// Handle user data [ submitted via form]

// Retreive values through POST

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$login_ID = $_POST["loginID"];
	$login_passwd = $_POST["loginPasswd"];


} else {
	echo "Data has not been submitted";
}



if($con->connect_error){
	echo " Error connecting to DB" . $con->connect_error;
	die();
} else {
	//echo " Connection successful";
}


// Formulate query
$sqlQuery = "SELECT * from users INNER JOIN DEPARTMENT ON users.dptID=DEPARTMENT.dptID WHERE users.userID='$login_ID' AND users.password='$login_passwd' ";

// Execute
$results = $con->query($sqlQuery);

// process
if ($results == TRUE) {
	//echo " <br> Select Query executed successfully";

	if($results->num_rows > 0) {
		echo "Login Successful";

		$row = $results->fetch_assoc();
		// redirect to dashboard

		if ($row["utype"] == 1 ) {
			$_SESSION["user"] = $row["fname"];
			$_SESSION["userID"] = $row["userID"];
			
			$_SESSION["supervisorID"] = $row["supervisorID"];
			$_SESSION["departmentID"] = $row["dptID"];
		header("location:employee.php");

		} elseif ($row["utype"] == 2) {
			// code...
			$_SESSION["user"] = $row["fname"];
			$_SESSION["userID"] = $row["userID"];
			$_SESSION["utype"] = $row["utype"];
		header("location:supervisor.php");

		} elseif ($row["utype"] == 3) {
			// code...
			$_SESSION["user"] = $row["fname"];
			$_SESSION["utype"] = $row["utype"];
		header("location:hradmin.php");
		}
	}
	else
		echo "<script>alert('UserID/password does not match');</script>";

}



$con->close();
?>