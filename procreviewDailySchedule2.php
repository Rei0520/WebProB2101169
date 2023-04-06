<?php

require('dbcon.php');
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title> Process Update Comments   </title>
	
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
			// Handle user data [ submitted via form]

			// Retreive values through POST


			if($_SERVER["REQUEST_METHOD"] == "POST") {
				
				$u_user_ID = $_POST["userID"];
				$u_workDate = $_POST["workDate"];
				$u_comments = $_POST["comments"];

			} else {
				echo "Data has not been submitted";
			}

			if($con->connect_error){
				echo " Error connecting to DB" . $con->connect_error;
				die();
			} else {
				//echo "Connection successful";
			}
			// Do not register if user already exists
			// Process all the rows
		


					$sqlQuery = "UPDATE DailySchedule SET supervisorComments='$u_comments' WHERE DailySchedule.userID='$u_user_ID' AND workDate='$u_workDate'";

				$ret = $con->query($sqlQuery);
					if($ret == TRUE)
					
				
						echo "<h3> Successfully Updated comments <br> Comments : ". $u_comments. "</h3>";
					



			$con->close();

		?>
		<br>
		</div>
		<br>
		<br>
		
		<div class="text-center mb-4">
			<a href="supervisor.php" class="btn btn-outline-secondary btn-lg"> Back Home</a>
		</div>
       	
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html><!doctype html>
