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
    <link rel="stylesheet" href="assets/css/login.css">

    <title>FelxIS Login Page </title>
  
  </head>
  <body class="d-flex justify-content-center bg-light">
    <main>
        <form method="POST" action="procLogin.php" class="form-signin" id="myForm">
            <div class="text-center mb-4">
              <img class="mb-4" src="assets/flexIS_icon.png" alt="flexIS_icon" width="130" height="130"><!--Inline CSS -->
              <h1 class="mb-3 font-weight-bold">Welcome to FlexIS</h1>
            </div>
			<!--Text box for user ID-->
            <div class="form-label-group">
				<label for="loginID"> User ID </label>
				<input type="text" name="loginID" id="loginID" class="form-control" placeholder="Enter Employee ID" >
            </div>
			<!--Text box password-->
            <div class="form-label-group">
				<label for="loginPasswd"> Password </label>
				<input type="password" name="loginPasswd" id="loginPasswd" class="form-control" placeholder="Enter Password" required>
            </div>

			<br>
			<!--Button for submit-->
			<div class="text-center mb-4">
        <button onclick="submitForm()" class= "btn-outline-secondary btn-lg">Log In</button>
      </div>
    </form>
    </main>
    <script>
      function submitForm() {
      const form = document.getElementById('myForm');
      if (checkFormFilled(form)) {
      // Submit the form if all input fields are filled
      form.submit();
       } else {
      alert('Please fill all fields before submitting.');
      }
      }
      </script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="assets/js/checkFormFilled.js" ></script>
  </body>
</html><!doctype html>
