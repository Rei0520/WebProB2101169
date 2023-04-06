<?php
session_start();
$u_utype = $_SESSION["utype"];
echo "<script>var utype = '{$u_utype}';</script>";


require('dbcon.php');

    if($_SERVER["REQUEST_METHOD"] == "POST") {
	
        $u_daterange = $_POST["daterange"];

    
    } else {
        echo "Data has not been submitted";
    }


 

 // get array of first and last date of date range

 $firstANDlastDate = explode('-',$u_daterange,2);

 //get first date of date range

 $firstDate = date($firstANDlastDate[0]);

 $firstDate = date("Y-m-d", strtotime($firstDate));

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View FWA Analytics - Summarized daily schedule for each date in the date range.</title>
<meta name="description" content="example-aggregate-functions-and-grouping-count-with-group-by- php mysql examples | w3resource">


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
        <h2>Summary of Daily Shcedule in chosen date range:</h2>
        <?php
        $lastDate = date($firstANDlastDate[1]);

        $lastDate = date("Y-m-d", strtotime($lastDate));
        print_r("Date Range selected : ". $firstDate. " - ".$lastDate); 


        ?>
        <table class='table table-bordered'>
        <tr>
        <th>Work Date</th><th>User ID</th><th>Work Location</th><th>Work Hours</th>
        </tr>
        <?php
        $hostname="localhost";
        $username="root";
        $db = "BIT210_Project";
        $dbh = new PDO("mysql:host=$hostname;dbname=$db", $username);
        foreach($dbh->query("SELECT userID, workDate, workLocation, workHours
        FROM DailySchedule
        WHERE workDate BETWEEN '$firstDate' AND  '$lastDate'
        ORDER BY workDate
        ") as $row) {
        echo "<tr>";
        echo "<td>" . $row['workDate'] . "</td>";
        echo "<td>" . $row['userID'] . "</td>";
        echo "<td>" . $row['workLocation'] . "</td>";
        echo "<td>" . $row['workHours'] . "</td>";
        echo "</tr>"; 
        }
        ?>
        </tbody></table>
        <br>
        <div class="text-center mb-4">
            <button type="button" class= "btn-outline-secondary btn-lg" onclick="redirectToPage()">Back Home</button>
        </div>
	  
    <br>
</div>
</div>
    </div>   
</main>
        <script> 
            function redirectToPage() {
                if  (utype == 2) {
                    window.location.href = "supervisor.php";
                } else if (utype == 3) {
                    window.location.href = "hradmin.php";
                } else {
                    alert("Invalid input value");
                }
             }
        </script>
</body>
</html>



