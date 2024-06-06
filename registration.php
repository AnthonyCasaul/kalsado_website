<?php
include 'db_connect.php';
session_start();

if(isset($_POST['submit'])){

   $firstName = mysqli_real_escape_string($conn, $_POST['first_name']);
   $lastName = mysqli_real_escape_string($conn, $_POST['last_name']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
   $contactNumber = mysqli_real_escape_string($conn, $_POST['contactNumber']);
   $socials = mysqli_real_escape_string($conn, $_POST['socials']);
   $gender = mysqli_real_escape_string($conn, $_POST['gender']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `profile` WHERE Email = '$email'") or die('query failed');
    
  $fullName = $firstName." ".$lastName;
   if(mysqli_num_rows($select) == 0){  

     $insert = mysqli_query($conn, "INSERT INTO `profile`(Username, Email, Address, Fullname, PhoneNumber, Password, DoB, Gender, Socials)VALUES('$username', '$email', '$address', '$fullName', '$contactNumber', '$pass', '$birthdate', '$gender', '$socials')") or die('query failed');
      header('location:login.php');

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
    <div class="form-floating text">
      <input type="text" class="form-control" id="floatingInput" name="address" placeholder="" required/>
      <label for="floatingInput">Full Address</label>
    </div>
    <div class="form-floating text">
      <input type="date" name="birthdate" id="birthdate" class="form-control" required placeholder=" "/>
      <label for="contact-number">BirthDate</label>
    </div>
    <div class="form-floating text">
      <input type="number" class="form-control" id="floatingInput" name="contactNumber" placeholder="" required maxlength="11">
      <label for="floatingInput">Contact Number</label>
    </div>
    <div class="form-floating text">
      <input type="text" class="form-control" id="floatingInput" name="socials" placeholder="" required/>
      <label for="floatingInput">Socials</label>
    </div>
    <div class="d-flex flex-row gap-5 align-items-left my-4">
      <label for="role ">Gender:</label>
      <div class="form-check mr-2 mb-0">
              <input class="form-check-input" type="radio" name="gender" id="staff" value="male">
              <label class="form-check-label" for="staff">
                  Male
              </label>
      </div>
      <div class="form-check mb-0">
              <input class="form-check-input" type="radio" name="gender" id="manager" value="female">
              <label class="form-check-label" for="manager">
                  Female
              </label>
      </div>
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
