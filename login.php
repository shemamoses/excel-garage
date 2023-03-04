<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	
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
            <a href="#" class="navbar-brand">ATHANASE GARAGE</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="changeusername.php" class="nav-item nav-link active" tabindex="-1">Update Account</a>
                </div>
            </div>
        </div>
    </nav>
<?php
	
	session_start();
	include 'link.php';

	if (isset($_POST['send'])) 
	{
		$username=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];

		$select=$mysqli->query("SELECT * FROM manager WHERE username='$username' AND password='$password'AND email='$email'") or die("select failed");

		while($fetch=mysqli_fetch_array($select))
		{
			$user=$fetch['username'];
			$pass=$fetch['password'];
			$mail=$fetch['email'];
		}
		if ($username==@$user && $password==$pass && $email==$mail) 
		{
            $_SESSION['username']=$user;
            $_SESSION['password']=$pass;
            $_SESSION['email']=$mail;
            
			echo "<script>window.alert('$username login successful')</script>";
			echo "<script>window.location.replace('home.php')</script>";
		}
		else
		{
			echo "<script>window.alert('Login Fail')</script>";
			echo "<script>window.location.replace('login.php')</script>";
		}

	}
?>

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
          ATHANASE <br />
          <span style="color: hsl(218, 81%, 75%)">GARAGE</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
        Excel Travel and Tour Agency Ltd is a Private Company constrained by shared enrolled beneath 102264441(Company code/TIN/ RSSB).
It has been corporate in 2011 beneath the activity of Mr. Felix Rurangirwa
(50%) and Mr. Felix Gasangwa (50%) with the center commerce exercises of giving traveler transportation administrations as well as messenger administrations specialized in the Transportation sector , it was founded in 2011 with aims of providing good transportation services to the clients.
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
            <form method="POST">
              
              <div class="row">
                <div class="form-outline mb-4">
                  <div class="form-outline">
                    <input type="text" id="form3Example1" class="form-control" placeholder="Username" name="name" required />
                    <label class="form-label" for="form3Example1"></label>
                  </div>
                </div>
                
              <div class="form-outline mb-4">
                <input type="email" id="form3Example3" class="form-control" placeholder="E-mail" name="email" required />
                <label class="form-label" for="form3Example3"></label>
              </div>
              
               <div class="form-outline mb-4">
                <input type="password" id="form3Example4" class="form-control" placeholder="Password" name="password" required />
                <label class="form-label" for="form3Example4"></label>
              </div>

              <button type="submit" name="send" class="btn btn-primary btn-block mb-4">
                Login
              </button>

              </div>
                  <a href="forgot.php">Forgot password?</a>
                </div>
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
