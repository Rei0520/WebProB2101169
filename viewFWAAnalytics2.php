

<?php

require('dbcon.php');

    if($_SERVER["REQUEST_METHOD"] == "POST") {
	
        $u_department = $_POST["department"];

    
    } else {
        echo "Data has not been submitted";
    }
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View FWA Analytics - The Number Of Employees FWA requests </title>
<meta name="description" content="example-aggregate-functions-and-grouping-count-with-group-by- php mysql examples | w3resource">
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="bg-light">
<header>
    <div class="d-flex flex-column flex-md-row align-items-center p-2 px-md-2 mb-3 bg-white border-bottom shadow-sm">
			<img class="mb-2 my-0 mr-md-auto" src="assets/flexIS_icon.png" alt="flexIS_icon" width="100" height="100">
			<a class="btn btn-outline-secondary" href="logout.php">Log out</a>
		</div>
</header>
    <main>
    <div class="container">
    <div class="row">
    <div class="col-md-12">
    <h1 class="mb-3 font-weight-bold">The Number Of Employees FWA requests by date in <?php echo $u_department; ?></h1>
    <table class='table table-bordered'>
    <tr>
    <th>Date</th><th>Number of Employee</th>
    </tr>
    <?php
    $hostname="localhost";
    $username="root";
    $db = "BIT210_Project";
    $dbh = new PDO("mysql:host=$hostname;dbname=$db", $username);
    foreach($dbh->query("SELECT FWARequest.requestDate, count(*) FROM users
    INNER JOIN DEPARTMENT ON users.dptID = DEPARTMENT.dptID
    INNER JOIN FWARequest ON users.userID = FWARequest.userID
    WHERE DEPARTMENT.dptName = '$u_department'
    GROUP BY requestDate
    ORDER BY requestDate") as $row) {
    echo "<tr>";
    echo "<td>" . $row['requestDate'] . "</td>";
    echo "<td>" . $row['count(*)'] . "</td>";
    echo "</tr>"; 
    }
    ?>
    </tbody></table>
    <br>
    <form method="POST" action="viewFWAAnalytics3.php" class="form-signin">

        <?php
      $host = 'localhost';
      $user = 'root';
      $pass = '';
      $db = 'BIT210_Project';
      $mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
        ?>        
    <div class="text-center mb-4">
    <label><h4>Chooses a date range to view the daily schedule</h4></label>
    <br>
    <input type="text" name="daterange" />
    </div>

    <script>
    $(function() {
      $('input[name="daterange"]').daterangepicker({
        
        opens: 'left'
      }, function(start, end, label) {
        
        
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
      });
    });
    </script>

        <div class="text-center mb-4">
				<input type="submit" name="submit" class="btn btn-outline-secondary btn-lg">
      	</div>
      </form>
        <br>
    </div>
    </div>
    </div>
    <main>
</body>
</html>
<!doctype html>








