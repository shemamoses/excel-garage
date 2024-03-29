<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="vehicle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/jquery/jquery.min.js"></script>  
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
include 'link.php';
session_start();
 if(isset($_POST['submit']))
 {
     $mail=$_POST['email'];
     $select=$mysqli->query("SELECT * FROM manager WHERE email='$mail'") or die("select failed");
     $check=mysqli_num_rows($select);
     $fetch=mysqli_fetch_array($select);
     if ($check<=0) 
     {
         ?>
         <script>
            alert("<?php echo "Sorry,Email doesn't exist"?>");
         </script>
         <?php
     }
     else
     {
        // generate token by binary hexa 
        $token = bin2hex(random_bytes(50));

        //session_start ();
        $_SESSION['token'] = $token;
        $_SESSION['email'] = $mail;

        require "Mail/phpmailer/PHPMailerAutoload.php";
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->Port=587;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';

        // h-hotel account
        $mail->Username='mosesshema1@gmail.com';
        $mail->Password='okomnfekbupxnbkw';

        // send by h-hotel email
        $mail->setFrom('mosesshema1@gmail.com', 'Password Reset');
        // get email from input
        $mail->addAddress($_POST["email"]);
        //$mail->addReplyTo('mosesshema1@gmail.com');

        // HTML body
        $mail->isHTML(true);
        $mail->Subject="Recover your password";
        $mail->Body="<b>Dear User</b>
        <h3>We received a request to reset your password.</h3>
        <p>Kindly click the below link to reset your password, Otherwise Ignore this message</p>
        http://localhost/excel-garage/updatepassword.php
        <br><br>
        <p>With regards,</p>
        <b>EXCEL Garage</b>";

        if(!$mail->send()){
            ?>
                <script>
                    alert("<?php echo " Invalid Email "?>");
                </script>
            <?php
        }
        else{
            ?>
                <script>
                    window.location.replace("notification.html");
                </script>
            <?php
        }

     }
 }
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
                    <a href="login.php" class="nav-item nav-link active" tabindex="-1">Log in</a>
                </div>
            </div>
        </div>
    </nav>
<?php
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
          RESET <br />
          <span style="color: hsl(218, 81%, 75%)">PASSWORD</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
        Welcome! If you are a user who needs to reset your account password, you've come to the right place. To get started, please use this page to input the email address associated with your account during registration. Once you have entered your email address, you will receive a reset password link via email. Please follow the instructions in the email to reset your password and regain access to your account. If you encounter any issues during the password reset process, please do not hesitate to contact our support team for assistance. We are always here to help you get back into your account. Thank you for using this tool to reset your password.
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong">
        </div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
            <form method="POST">
              <div class="row">
                <div class="form-outline mb-4">
                  <div class="form-outline">
                  </div>
                </div>
                
                <input type="email" name="email" placeholder="E-mail" class="form-control" required="">

                <label class="form-label" for="form3Example1"></label>
                <br>
              <button type="submit" name="submit" class="btn btn-primary btn-block mb-2">
                SEND PASSWORD RESET LINK
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
