<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="vehicle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/jquery/jquery.min.js"></script>  
    <link rel="icon" sizes="16x16" href="pictures/logo.png">
    <title>Update password</title>
    <style>
    /* Set the width and height of the scrollbar */
    ::-webkit-scrollbar {
      width: 8px;
      height: 5px;
      
    }

    /* Style the scrollbar track */
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    /* Style the scrollbar thumb */
    ::-webkit-scrollbar-thumb {
      background: linear-gradient(transparent, #30ff00);
      border-radius: 6px;
    }

    /* Style the scrollbar on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: linear-gradient(transparent, #00c6ff);
      border-radius: 6px;
    }
  </style>

</head>
<body>
  <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <div class="container-fluid">
            <a href="login.php" class="navbar-brand">EXCEL GARAGE</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="login.php" class="nav-item nav-link active" tabindex="-1">Log in</a>
                </div>
            </div>
        </div>
    </nav>
    <?php
     include 'link.php';
     session_start();
     if(isset($_POST["submit"]))
     {
         $psw = $_POST["password"];
 
         $token = $_SESSION['token'];
         $Email = $_SESSION['email'];
 
         
 
         $select=$mysqli->query("SELECT * FROM manager WHERE email='$Email'") or die("select failed");
         $query = mysqli_num_rows($select);
         $fetch = mysqli_fetch_assoc($select);
 
         if($Email)
         {
             
             $update=$mysqli->query("UPDATE manager SET password='$psw' WHERE email='$Email'") or die("update failed");
             ?>
             <script>
                 alert("<?php echo "your password has been succesful reset"?>");
                 window.location.replace("login.php");
             </script>
             <?php
         }
         else
         {
             ?>
             <script>
                 alert("<?php echo "Please try again"?>");
             </script>
             <?php
         }
     }
 
 ?>
 <script>
     const toggle = document.getElementById('togglePassword');
     const password = document.getElementById('password');
 
     toggle.addEventListener('click', function()
     {
         if(password.type === "password")
         {
             password.type = 'text';
         }
         else
         {
             password.type = 'password';
         }
         this.classList.toggle('bi-eye');
     }
     );
 </script>
 
 <section class="background-radial-gradient overflow-hidden">
  <style>
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image: radial-gradient(650px circle at 0% 0%,
          hsl(218, 41%, 35%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
          hsl(218, 41%, 45%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%);
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>

  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          SET <br />
          <span style="color: hsl(218, 81%, 75%)">NEW PASSWORD</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
        Hello there! If you are a user who wants to change your account password, you are in the right place. Please use this page to input your new strong password. To create a strong password, make sure it includes a combination of upper and lower case letters, numbers, and symbols. Once you have entered your new password, click on the "Change Password" button to save the changes. It is important to update your password regularly to ensure the security of your account. If you have any questions or concerns about changing your password, please feel free to reach out to our support team for assistance. Thank you for using this tool to keep your account secure!
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong">
        </div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-4 px-md-5">
            <form method="POST">
              <div class="row">
                <div class="form-outline mb-4">
                  <div class="form-outline">
                  </div>
                </div>
                <label class="form-label" for="form3Example1"></label>
                <br>
                <input type="password" id="password" name="password" placeholder="New Password" class="form-control" required autofocus>
                <i class="bi bi-eye-slash" id="togglePassword"></i>
                <br>
                <br>
              <button type="submit" name="submit" class="btn btn-primary btn-block mb-2">
                CHANGE
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer style="position: bottom: 0; left: 0; width: 100%; text-align: center;">
  <p style="color: white;">&copy; Excel Garage. All rights reserved.</p>
</footer>
</section>
</body>

</html>