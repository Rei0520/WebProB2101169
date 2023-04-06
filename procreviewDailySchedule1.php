

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title> Process Review Daily Schedule</title>
    <style>
    /* Style the table */
    table {
        border-collapse: collapse;
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
        font-size: 1rem;
        color: #333;
    }

    /* Style the table headers */
    th {
        text-align: left;
        background-color: #f2f2f2;
        padding: 0.5rem;
        border: 1px solid #ddd;
    }

    /* Style the table cells */
    td {
        padding: 0.5rem;
        border: 1px solid #ddd;
    }

    /* Style the table rows on hover */
    tr:hover {
        background-color: #f5f5f5;
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
		<div class="d-flex justify-content-center">
        <form method="POST" action="procreviewDailySchedule2.php" class="form-signin">
            <div class="text-center mb-4">
              <h1 class="mb-3 font-weight-bold">Review Daily Schedule</h1>
            </div>
            <?php
session_start();

require('dbcon.php');

	
	$u_userID = $_SESSION["userID"];
    $u_supervisorID = $_SESSION["supervisorID"];


    if($_SERVER["REQUEST_METHOD"] == "POST") {
	
        $u_workDate = $_POST["workDate"];

    
    } else {
        echo "Data has not been submitted";
    }


if($con->connect_error){
	echo " Error connecting to DB" . $con->connect_error;
	die();
} else {
	//echo " Connection successful";
}

echo $u_workDate;
// Formulate query
$sqlQuery = "SELECT DailySchedule.userID, DailySchedule.workLocation, DailySchedule.workHours, DailySchedule.workReport, DailySchedule.supervisorComments  FROM DailySchedule JOIN users ON DailySchedule.userID=users.userID WHERE users.supervisorID='$u_userID' AND DailySchedule.workDate='$u_workDate'";

// Execute
$results = $con->query($sqlQuery);


$flag = 0;
// Execute Query
$results = $con->query($sqlQuery);
if ($results->num_rows > 0) {
    // output data of each row
    echo "<table>";
    echo "<tr><th>User ID</th><th>Work Location</th><th>Work Hours</th><th>Work Report</th><th>Supervisor Comments</th></tr>";
    while($row = $results->fetch_assoc()) {
      
      echo "<tr>";
      echo "<td>" . $row["userID"]. "</td>";
      echo "<td>" . $row["workLocation"]. "</td>";
      echo "<td>" . $row["workHours"]. "</td>";
      echo " <td>" . $row["workReport"]. "</td>";
      echo " <td>" . $row["supervisorComments"]. "</td>";
      echo "</tr>";
    }
    echo "</table>";
  
  } else {
    echo "  0 daily schedule submitted on this date";
  }
  //$conn->close();
  ?>


      
            <div class="form-label-group">
              <br>
              <!--input for user ID-->
				      <label for="userID">Select user ID to update</label>
				      <input type="text" name="userID" id="userID" class="form-control" placeholder="Enter user ID" required>   
              </div>
			      <br>
            <div class="form-label-group">
  
              <!--Work Date-->
				      <label for="userID">WorkDate</label>
				      <select name=workDate id="workDate" class="form-control">
                <option name="<?php $u_workDate ?>"> <?php echo $u_workDate?> </option>
              </select>   
              </div>
			      <br>
            <!--input for comments -->
      
            <div class="form-label-group">
              <label for="comments">Comment</label>
              <textarea name="comments" id="comments" class="form-control" placeholder="Enter Comment ID" ></textarea> 
				      
			      </div>

			      <br>
            <!--submit button-->
			
            <div class="text-center mb-4">
				      <input type="submit" name="submit" class="btn btn-outline-secondary btn-lg">
              <a href="supervisor.php" class="btn btn-outline-secondary btn-lg"> Back Home</a>
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