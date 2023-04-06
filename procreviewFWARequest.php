
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>review FWA Request</title>
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
        <form method="POST" action="procupdateRequest.php" class="form-signin">
            <div class="text-center mb-4">
              <h1 class="mb-3 font-weight-bold">Review FWA Request</h1>
            </div>
<?php
session_start();

require('dbcon.php');

	
	$u_userID = $_SESSION["userID"];


if($con->connect_error){
	echo " Error connecting to DB" . $con->connect_error;
	die();
} else {
	//echo " Connection successful";
}


// Formulate query
$sqlQuery = "select * from FWARequest where supervisorID='$u_userID' and status='pending'";

// Execute
$results = $con->query($sqlQuery);


$flag = 0;
// Execute Query
$results = $con->query($sqlQuery);
if ($results->num_rows > 0) {
    // output data of each row
    echo "<table>";
    echo "<tr><th> Request ID</th><th>User ID</th><th>Request Date</th><th>Work Type</th><th>Description</th><th>Reason</th><th>Pending</th></tr>";
    while($row = $results->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["requestID"]. "</td>";
      echo "<td>" . $row["userID"]. "</td>";
      echo "<td>" . $row["requestDate"]. "</td>";
      echo " <td>" . $row["workType"]. "</td>";
      echo " <td>" . $row["description"]. "</td>";
      echo " <td>" . $row["reason"]. "</td>";
      echo " <td>" . $row["status"]. "</td>";
      echo "</tr>";
      }
      echo "</table>";
    }
    
  else {
    echo "0 request";
  }
  //$conn->close();
  ?>
      
            <div class="form-label-group">
              <br>
              <!--input for user ID-->
				      <label for="requestID">Select Request ID to update</label>
				      <input type="text" name="requestID" id="requestID" class="form-control" placeholder="Enter Request ID" required>   
            </div>
			      <br>
            <!--input for status-->
			      <div class="form-label-group">
				      <label for="status">Status </label>
                <select name="status" class="form-control">
                  <option name="status" value="accepted" selected>Accept</option>
                  <option name="status" value="rejected">Reject</option>
                </select>
			      </div>
			      <br>
            <!--input for comments-->
            <div class="form-label-group">
              <label for="comment">Comment</label>
              <textarea name="comment" id="comment" class="form-control" placeholder="Enter Comment ID" ></textarea> 
				      
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