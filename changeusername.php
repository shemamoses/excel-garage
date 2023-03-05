<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Change Username</title>
    <link rel="stylesheet" href="login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" sizes="16x16" href="pictures/logo.png">
	
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
<?php
	session_start();
	include 'link.php';
?>
  <body>
  <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <div class="container-fluid">
            <a href="login.php" class="navbar-brand">EXCEL GARAGE</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="login.php" class="nav-item nav-link active" tabindex="-1">Login</a>
                </div>
            </div>
        </div>
    </nav>
<?php
if (isset($_POST['submit'])) 
{
  $old_user=$_POST['olduser'];
  $new_user=$_POST['newuser'];
  $old_mail=$_POST['oldmail'];
  $new_mail=$_POST['newmail'];
  $old_password=$_POST['oldpassword'];
  $new_password=$_POST['newpassword'];
  $confirm_password=$_POST['confirm'];
  $select=$mysqli->query("SELECT * FROM manager WHERE username='$old_user' AND email='$old_mail' AND password='$old_password'") or die("select failed");
  while($fetch=mysqli_fetch_array($select))
  {
    $id=$fetch['manager_id'];
    $user_db=$fetch['username'];
    $email_db=$fetch['email'];
    $passord_db=$fetch['password'];
  }
  if($old_user==$user_db && $old_mail==$email_db && $old_password==$passord_db)
  {
    if ($confirm_password==$new_password) 
    {
      $update=$mysqli->query("UPDATE manager SET username='$new_user',email='$new_mail',password='$new_password' WHERE manager_id={$id}") or die('update failed');
        if ($update) 
        {
          echo "<script>window.alert('Account well Updated!!')</script>";
          echo "<script>window.location.replace('login.php')</script>";
        }
        else
        {
          echo "<script>window.alert('Failed to changer user account!!!')</script>";
          echo "<script>window.history.back('changeusername.php')</script>";
        }
    }
    else
    {
      echo "<script>window.alert('try to enter collect confirm password')</script>";
    }
  }
  else
  {
    echo "<script>window.alert('log in credentials not match try again!!!')</script>";
    echo "<script>window.history.back('changeusername.php')</script>";

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
          UPDATE <br />
          <span style="color: hsl(218, 81%, 75%)">ACCOUNT</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
        Welcome to Excel Garage! If you're looking to update your account credentials, you've come to the right place. We take the security of your account seriously, which is why we've made it easy for you to update your information.
<p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
        Updating your account information is a quick and straightforward process. Simply follow the prompts to update your credentials. You can change your password, update your email address, and modify any other information that needs to be updated, and then click on Update account. Once you've made the changes, you can rest easy knowing that your account is secure and protected from unauthorized access.
        </p>
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
                    <input type="text" id="form3Example1" class="form-control" placeholder="Old Username" name="olduser" required />
                    <label class="form-label" for="form3Example1"></label>
                  </div>
                </div>

                <div class="form-outline mb-4">
                  <div class="form-outline">
                    <input type="text" id="form3Example1" class="form-control" placeholder="New Username" name="newuser" required />
                    <label class="form-label" for="form3Example1"></label>
                  </div>
                </div>
                
              
              <div class="form-outline mb-4">
                <input type="email" id="form3Example3" class="form-control" placeholder="Old email" name="oldmail" required />
                <label class="form-label" for="form3Example3"></label>
              </div>

              <div class="form-outline mb-4">
                <input type="email" id="form3Example3" class="form-control" placeholder="New email" name="newmail" required />
                <label class="form-label" for="form3Example3"></label>
              </div>

              
               <div class="form-outline mb-4">
                <input type="password" id="form3Example4" class="form-control" placeholder="Old Password" name="oldpassword" required />
                <label class="form-label" for="form3Example4"></label>
              </div>

              <div class="form-outline mb-4">
                <input type="password" id="form3Example4" class="form-control" placeholder="New Password" name="newpassword" required />
                <label class="form-label" for="form3Example4"></label>
              </div>

              <div class="form-outline mb-4">
                <input type="password" id="form3Example4" class="form-control" placeholder="Confirm Password" name="confirm" required />
                <label class="form-label" for="form3Example4"></label>
              </div>

              <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">
                Update Account
              </button>

              </div>
                  <a href="login.php">Login to your existing account?</a>
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
