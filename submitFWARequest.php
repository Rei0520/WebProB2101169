

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>FWA Request Form</title>
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
        <form method="POST" action="procsubmitFWARequest.php" class="form-signin">
            <div class="text-center mb-4">
              <h1 class="mb-3 font-weight-bold">Submit FWA Request Form</h1>
            </div>
			<!--input for hork type-->
      
			<div class="form-label-group">
				<label for="workType">Work Type</label>
					<select name="workType"  id="workType" class="form-control">
						<option value="Flexi-Hours" selected>FlexHours</option>
						<option value="Work-From-Home">Work-From-Home</option> 
						<option value="Hybrid">Hybrid</option>
					</select>
			</div>
			<!--input for description-->
			
			<br>
			<div class="form-label-group">
				<label for="description">Description</label> 
				<textarea name="description" id="description" class="form-control" placeholder="Enter Description" required></textarea>  
            </div>
			<br>
			<!--input for reason-->
			
			<div class="form-label-group">
				<label for="reason">Reason</label> 
				<textarea name="reason" id="reason" class="form-control" placeholder="Enter Reason" required></textarea>  
            </div>
			<br>
			<!--input for button-->
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