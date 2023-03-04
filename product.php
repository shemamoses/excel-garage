<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Supply Vehicle</title>
    <link rel="stylesheet" href="vehicle.css">
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
  <body>
  <?php
	session_start();
	include 'link.php';
	if (!@$_SESSION['username']) 
	{
		echo "<script>window.alert('login to access this page')</script>";
		echo "<script>window.location.replace('login.php')</script>";
	}
?>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">ATHANASE GARAGE</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="home.php" class="nav-item nav-link active">Home</a>
                    <a href="vehicles.php" class="nav-item nav-link active">Add Vehicle</a>
                    <a href="Viewvehicle.php" class="nav-item nav-link active">View Vehicle</a>
                    <a href="viewproduct.php" class="nav-item nav-link active">View Product</a>
                    <a href="search.php" class="nav-item nav-link active">Search</a>
                    <a href="Report.php" class="nav-item nav-link active">Report</a>
                    <a href="logout.php" class="nav-item nav-link active" tabindex="-1">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <?php
    if (isset($_GET['vehicle_id'])) 
    {
      $id=$_GET['vehicle_id'];
      if (isset($_POST['submit'])) 
      {
        $driver=$_POST['driver'];
        $tel=$_POST['tel'];
        $service=$_POST['service'];
        $price=$_POST['price'];
        $quantity=$_POST['quantity'];
        $date=$_POST['date'];
        $time=date("H:i:s");
        $totalprice=$quantity*$price;
        //$formated_number=number_format($totalprice);
        $select_vechicle=$mysqli->query("SELECT * FROM vehicles WHERE vehicle_id={$id}") or die("select failed");
          while($row=mysqli_fetch_array($select_vechicle))
          {
            $plate=$row['plate'];
          }
        $select_product=$mysqli->query("SELECT * FROM product WHERE vehicle_id='$id' and service='$service' and driver='$driver'") or die("select failed");
        while ($fetch=mysqli_fetch_array($select_product)) 
        {
          //$date_db=$fetch['date'];
          $plate_db=$fetch['vehicle_id'];
          $service_db=$fetch['service'];
          $driver_db=$fetch['driver'];
        }
          $insert=$mysqli->query("INSERT INTO product(product_id,driver,telephone,service,price,quantity,date,time,totalprice,vehicle_id ) VALUES('','$driver','$tel','$service','$price','$quantity','$date','$time','$totalprice','$id')") or die("insert failed");
          if ($insert) 
          {
            echo "<script>window.alert('Product Well Inserted')</script>";
            echo "<script>window.location.replace('viewproduct.php')</script>";
          }
          else
          {
            echo "<script>window.alert('Insert Failed!!!')</script>";
          }
        }
        
    }

?>
<div class="signup-form">
<form class="box" method="POST" id="phone-form" data-parsley-validate>
  <?php
        $select_vechicle=$mysqli->query("SELECT * FROM vehicles WHERE vehicle_id={$id}") or die("select failed");
          while($row=mysqli_fetch_array($select_vechicle))
          {
            $plate=$row['plate'];
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
            <?php
              $select_plate=$mysqli->query("SELECT * FROM vehicles WHERE vehicle_id={$id}") or die("select plate failed");
              while ($result=mysqli_fetch_array($select_plate)) 
              {
                $plate_db=$result['plate'];
              }
            ?>
            <form method="POST">
              <center><?php echo $plate_db;?></center>
              <div class="row">
                <div class="form-outline mb-4">
                  <div class="form-outline">
                    <input type="text" id="form3Example1" class="form-control" placeholder="Driver Name" name="driver" required />
                    <label class="form-label" for="form3Example1"></label>
                  </div>
                </div>

                <div class="form-outline mb-4">
                  <div class="form-outline">
                    <input type="tel" id="phone" class="form-control" placeholder="Driver's Phone" name="tel" minlength="10" maxlength="10" required />
<script>
  // Get the input element
  const phoneInput = document.getElementById("phone");

  // Add an event listener for input changes
  phoneInput.addEventListener("input", function() {
    // Remove any non-numeric characters from the input value
    phoneInput.value = phoneInput.value.replace(/[^0-9]/g, "");
  });
</script> 
                    <label class="form-label" for="form3Example1"></label>
                  </div>
                </div>

                <div class="form-outline mb-4">
                  <div class="form-outline">
                    <input type="text" id="form3Example1" class="form-control" placeholder="Service" name="service" required />
                    <label class="form-label" for="form3Example1"></label>
                  </div>
                </div>

                <div class="form-outline mb-4">
                  <div class="form-outline">
                    <input type="number" id="form3Example1" class="form-control" placeholder="Price" name="price" required />
                    <label class="form-label" for="form3Example1"></label>
                  </div>
                </div>

                <div class="form-outline mb-4">
                  <div class="form-outline">
                    <input type="number" id="form3Example1" class="form-control" placeholder="Quanity" name="quantity" required />
                    <label class="form-label" for="form3Example1"></label>
                  </div>
                </div>

                <div class="form-outline mb-4">
                  <div class="form-outline">
                    <input type="date" id="date-input" class="form-control" placeholder="Date" name="date" required />
                    <script>
    // Get the date input element
const dateInput = document.getElementById('date-input');
// Set the maximum date to today's date
dateInput.max = new Date().toISOString().split("T")[0];

// Add an event listener to the date input element
dateInput.addEventListener('input', function(event) {
  // Get the selected date from the input element
  const selectedDate = new Date(event.target.value);

  // Get the current date
  const currentDate = new Date();

  // If the selected date is in the future, reset the input value to today's date
  if (selectedDate > currentDate) {
    dateInput.value = currentDate.toISOString().split("T")[0];
  }
});

   </script>


  <script>
    var today=new Date();
    var dd= today.getDate();
    var mm= today.getMonth()+1;
    var yyyy= today.getFullyear();
    if (dd<10) 
    {
      dd='0'+dd; 
    }
    if (mm<10) 
    {
      mm='0'+mm; 
    }
    today=yyyy+'-'+mm+'-'+dd;
    document.getElementByid("dateInput").setAttribute("max",today);
  </script>
                    <label class="form-label" for="form3Example1"></label>
                  </div>
                </div>
          
              <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">
                ADD Service
              </button>


</form>
</div>

</body>
</html>
