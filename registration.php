<?php
include 'db_connect.php';
session_start();

if(isset($_POST['submit'])){

   $firstName = mysqli_real_escape_string($conn, $_POST['first_name']);
   $lastName = mysqli_real_escape_string($conn, $_POST['last_name']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, $_POST['password']);

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');
    

   if(mysqli_num_rows($select) == 0){  

     $insert = mysqli_query($conn, "INSERT INTO `users`(first_name, last_name, username, email, password, type)VALUES('$firstName', '$lastName', '$username', '$email', '$pass', 3)") or die('query failed');
      header('location:index.php');

    }

    else{
        echo '<script> alert("Account Already Exist!");</script>';
     }
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration Form</title>
  <style>
    /* Basic Form Styling */
    body { 
      font-family: Arial, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      background-color: #f0f0f0;
      background-image: url("./assets/images/Kalsado.png");
      background-size: cover; 
      background-repeat: no-repeat; 
    }

    .form-container {
      width: 40% !important;
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 7px rgba(0, 0, 0, 0.5);
      transition: 1.12s ease-out;
    }

    input[type=email], input[type=password], input[type=text] {
      width: 100% !important; 
      padding: 12px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box; 
    }

    button[type=submit] {
      background-color: #379237;
      color: white;
      padding: 9px 18px;
      border: none;
      border-radius: 7px;
      cursor: pointer;
      display: block;
      margin: 0 auto;
      margin-bottom: 7px;
    }
    button[type=button] {
      color: white;
      padding: 9px 18px;
      border: none;
      border-radius: 7px;
      cursor: pointer;
      display: block;
      margin: 0 auto;
    }

    button[type=submit]:hover {
      opacity: 0.8;
    }

    button[type=button]:hover {
      opacity: 0.8;
    }
    #logo1{
    width: 20% !important;
    height: auto;
    }
    .email{
      width: 100% !important; 
    }
    .password{
      width: 100% !important; 
    }
    .registerTitle{
        margin-top: 5px;
    }
  </style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="assets/js/global.js"></script>
</head>
<body>
  <div class="form-container">
  <div class="text-center mb-4">
    <img id="logo1" src='./assets/images/kalsado-icon.png' alt/>
  </div>
    <h2 class="registerTitle mb-4">REGISTER</h2>
    <form action="" method="post"> 
    <div class="form-floating text">
      <input type="text" class="form-control" id="floatingInput" name="first_name" placeholder="" required/>
      <label for="floatingInput">First Name</label>
    </div>
    <div class="form-floating text">
      <input type="text" class="form-control" id="floatingInput" name="last_name" placeholder="" required/>
      <label for="floatingInput">Last Name</label>
    </div>
    <div class="form-floating text">
      <input type="text" class="form-control" id="floatingInput" name="username" placeholder="" required/>
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating email">
      <input type="text" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required/>
      <label for="floatingInput">Email</label>
    </div>  
    <div class="form-floating password">
      <input type="password" class="form-control" id="Password" placeholder="Password" name="password" required/>
      <label for="floatingPassword">Password</label>
    </div>
    <div class="form-floating password">
      <input type="password" class="form-control" id="confirmPassword" placeholder="Password" name="confirm_password" disabled required/>
      <label for="floatingPassword">Confirm Password</label>
    </div>

    <div class="row">
        <div class="col-md-6">
            <button type="submit" id="confirm" name="submit" class="btn btn-primary">Confirm</button>
        </div>
        <div class="col-md-6">
            <button type="button" id="cancel" name="register" class="btn btn-danger">Cancel</button>
        </div>
    </div>

    </form>
  </div>
</body>

<script>

    const cancelButton = document.getElementById("cancel");
    cancelButton.addEventListener("click", function() {
    window.location.href = "login.php";
    });

    $('#confirmPassword').on('keyup', function() {
      const Password = document.getElementById("Password").value;
      const Cpass = document.getElementById("confirmPassword").value;

      if (Password === Cpass){
         $("#Password").css({
                    'outline-color': 'lightgreen',
                    'background-color': 'lightgreen'
                });
         $("#confirmPassword").css({
                    'outline-color': 'lightgreen',
                    'background-color': 'lightgreen'
                });
         $("#confirm").prop("disabled", false);
      }else{
         $("#Password").css({
                    'outline-color': 'pink',
                    'background-color': 'pink'
                });
         $("#confirmPassword").css({
                    'outline-color': 'pink',
                    'background-color': 'pink'
                });
         $("#confirm").prop("disabled", true);
      }
   });

   $(document).ready(function () {
    $("#Password").change(function () {
      var password = $(this).val();
      var validPassword = /^(?=.*[A-Z])(?=.*\d).{8,}$/.test(password);
      if (validPassword) {
        $("#Password").css({
            'outline-color': 'lightgreen',
            'background-color': 'lightgreen'
        });
        toastr.success("Valid Password");
        $("#confirmPassword").prop("disabled", false);
      } else {
        $("#Password").css({
            'outline-color': 'pink',
            'background-color': 'pink'
        });
        toastr.error(
          "Password must be 8 characters long and contain at least one capital letter and one number"
        );
      }
    });
  });

   $(document).ready(function () {
    $("#Password").popover({
      title: "Password Requirements",
      content:
        "Password must be 8 characters long and contain at least one capital letter and one number",
      trigger: "hover",
      placement: "top",
    });
  });
</script>
</html>
