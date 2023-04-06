<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    

    <title>Employee Home</title>
	<style>
		h4 {
			text-align: center;

		}
	</style>
  </head>
  <body class="bg-light">
  	<header>
	  	<div class="d-flex flex-column flex-md-row align-items-center p-2 px-md-2 mb-3 bg-white border-bottom shadow-sm">
			<img class="mb-2 my-0 mr-md-auto" src="assets/flexIS_icon.png" alt="flexIS_icon" width="100" height="100">
			<a class="btn btn-outline-secondary" href="logout.php">Log out</a>
		</div>
  	</header>
    <main>
		<div class="d-flex  justify-content-center">
		<?php
			require('dbcon.php');
			// Handle user data [ submitted via form]
			
			// Retreive values through POST
			
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				
				$work_type = $_POST["workType"];
				$u_description = $_POST["description"];
				$u_reason = $_POST["reason"];
			} else {
				echo "Data has not been submitted";
			}
			
			if($con->connect_error){
				echo " Error connecting to DB" . $con->connect_error;
				die();
			} else {
				//echo " Connection successful";
			}
			// Do not register if user already exists
			// Process all the rows
			
			$user_ID = $_SESSION["userID"];
			$supervisor_ID = $_SESSION["supervisorID"];
			$request_ID = uniqid('REQ');
			$request_date = date('Y-m-d');
			
			
				$sqlQuery = "insert into FWARequest values ('$request_ID', '$user_ID', '$supervisor_ID', '$request_date', '$work_type', '$u_description', '$u_reason', 'pending', 'NULL')";
			
				// Execute Query
				$ret = $con->query($sqlQuery);
				if($ret == TRUE)
					echo "<h4>Submitted successfully. <br>An email is sent to ". $supervisor_ID ." to inform that there is a pending request. (" . $request_date . ") <br>Request ID auto generated : ". $request_ID ."</h4>";
				else
					echo '<script>alert("Not submission successful")</script>';
			
			
			
			
			$con->close();
		?>
		<br>
		</div>
		<br>
		<br>
		
		<div class="text-center mb-4">
			<a href="submitFWARequest.php" class="btn btn-outline-secondary btn-lg  "> Submit Again </a>
			<a href="employee.php" class="btn btn-outline-secondary btn-lg "> Back Home</a>
		</div>
       	
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html><!doctype html>