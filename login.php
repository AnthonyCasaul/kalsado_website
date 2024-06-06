<?php
ob_start();
session_start();
include 'db_connect.php';

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `profile` WHERE Email = '$email' AND Password = '$pass'") or die('query failed');
   
   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
           
      $_SESSION['user_id'] = $row['UserID'];
      $_SESSION['email'] = $row['Email'];
      $_SESSION['username'] = $row['Username'];
      header('location:index.php');
   
    }

    else{
        echo '<script> alert("Invalid Account!");</script>';
     }
}

?>
<head>
<style>
body {   
    display: flex;
    align-items: center;
    justify-content: center;
    background-image: url("./assets/images/Kalsado.png");
    background-size: cover;
}
.form-container {
      align-items: center!important;
      justify-content: center !important;
      width: 30% !important;
      background-color: #fff;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 2px 7px rgba(0, 0, 0, 0.5);
      transition: 1.12s ease-out;
    }

    input[type=email], input[type=password] {
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
    align-items: center;
    width: 20% !important;
    height: auto;
    }
    .email{
      width: 100% !important; 
    }
    .password{
      width: 100% !important; 
    }
    .form-container:hover {
      transform: scale(1.1);
      transition: .6s;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.8);
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="form-container justify-content-center align-items-center">
        <div class="text-center"> 
        <img id="logo1" class="mb-4" src='./assets/images/kalsado-icon.png' alt/>
        </div>
        <h2 class="mb-4">LOGIN</h2>
        <form action="" method="post"> 
            <div class="form-floating email">
                <input type="email" class="form-control" id="floatingInput" name="username" placeholder="name@example.com" required/>
                <label for="floatingInput">Email</label>
            </div>  
            <div class="form-floating password">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required/>
                <label for="floatingPassword">Password</label>
            </div>
            <div class="button-container" style="text-align: center;">
                <button type="submit" name="submit">Login</button>
                <a href="registration.php" type="button" name="register">
                <label class="registration-label">Register an Account</label>
                </a>
            </div>
        </form>
    </div>
</body>
</html>