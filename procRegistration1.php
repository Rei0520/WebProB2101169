<?php
				session_start();
				
				require('dbcon.php');
				// Handle user data [ submitted via form]

				// Retreive values through POST

				if($_SERVER["REQUEST_METHOD"] == "POST") {
					
					$user_dpt = $_POST["department"];

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
				//echo "Welcome to ".$user_dpt;
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Registration</title>
  </head>
  <body class="bg-light">
  	<header>
	  	<div class="d-flex flex-column flex-md-row align-items-center p-2 px-md-2 mb-3 bg-white border-bottom shadow-sm">
			<img class="mb-2 my-0 mr-md-auto" src="assets/flexIS_icon.png" alt="flexIS_icon" width="100" height="100">
			<a class="btn btn-outline-secondary" href="logout.php">Log out</a>
		</div>
  	</header>
    <main>
		<div class="d-flex justify-content-center">
        <form method="POST" action="procRegistration2.php" class="form-signin">
            <div class="text-center mb-4">
              <h1 class="mb-3 font-weight-bold">Register New Employee</h1>
			  <!--show department name-->
			  <h3> <?php  echo "Welcome to ".$user_dpt; ?></h3>

            </div>
			<!--textbox for user ID-->
            <div class="form-label-group">
				<label for="userID"> User ID </label>
				<input type="text" name="userID" id="userID" class="form-control" placeholder="Enter Employee ID" required>   
            </div>
			<br>
      
			<!--textbox for full name-->
			<div class="form-label-group">
				<label for="fname"> Full Name </label>
				<input type="text" name="fname" id="fname" class="form-control" placeholder="Enter full name" required>
            </div>
            <br>
			<!--input for position-->
			<div class="form-label-group">
				<label>Position </label>
					<select name="utype" class="form-control">
						<option name="utype" value="1">Employee</option>
						<option name="utype" value="2">Supervisor</option>
						<option name="utype" value="3">HR Admin</option>
					</select>
			</div>
			<br>
			<!--input for email-->
			<div class="form-label-group">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" class="form-control" placeholder="Enter Email Address" required>
			</div>
			<!--input for superviorID-->
			<br>
			<div class="form-label-group">
				<label for="supervisorID">Supervisor ID(Optional)</label>
				<input type="text" name="supervisorID" id="supervisorID" class="form-control" placeholder="Enter Supervisor ID">   
            </div>
			<br>
			<!--input for department ID-->
			<div class="form-label-group">
				<label for="dptID">Department ID</label>
				<input type="text" name="dptID" id="dptID" class="form-control" placeholder="Enter Department ID" required>   
            </div>
			<br>
			<!--submit button-->
			<div class="text-center mb-4">
				<input type="submit" name="submit" class="btn btn-outline-secondary btn-lg">
      		</div>
          </form>
		  </div>
		  <br>
		  <br>
		  <br>
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html><!doctype html>