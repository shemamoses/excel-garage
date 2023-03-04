<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Plate</title>
    <link rel="stylesheet" href="vehicle.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/bootstrap.min.js"></script>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body><?php
	session_start();
	include 'link.php';
	if (!@$_SESSION['username']) 
	{
		echo "<script>window.alert('login to access this page')</script>";
		echo "<script>window.location.replace('login.php')</script>";
	}
?>
  <body>
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
        if (isset($_GET['product_id']))
        {
            $id=$_GET['product_id'];
            $select=$mysqli->query("SELECT * FROM product WHERE product_id={$id}") or die("select failed");
            while ($fetch=mysqli_fetch_array($select)) 
            {
              $price_db=$fetch['price'];
              $quantity_db=$fetch['quantity'];
              $totalprice_db=$fetch['totalprice'];
            }
        }
        if (isset($_POST['submit'])) 
        {
          $date=date("y-m-d");
          $time=date("H:i:s");
          $quantity_fm=$_POST['quantity'];
          @$newprice=$price_db+$price_fm;
          @$newquantity=$quantity_db+$quantity_fm;
          $newtotalprice=$newprice*$newquantity;
          $update=$mysqli->query("UPDATE product SET date='$date' time='$time',price='$newprice',quantity='$newquantity',totalprice='$newtotalprice' WHERE product_id={$id}") or die("update failed");
        
 		      if ($update) 
 		      {
			      echo "<script>window.alert('Records are added successfully!!!')</script>";
			      echo "<script>window.location.replace('viewproduct.php')</script>";
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
          ADD <br />
          <span style="color: hsl(218, 81%, 75%)">QUANTITY</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
        Certainly! When you add the unregistered vehicle plate number in the designated field for Excel Tours Agency, you are helping them keep accurate records and manage their garage more effectively. This ensures that the agency is aware of all the vehicles being used for tours and can schedule maintenance accordingly, which ultimately leads to a more enjoyable and safe travel experience for you. By providing the correct information, you are helping Excel Tours Agency and Excel Garage work together to provide the best service possible. Thank you for your cooperation and have a great tour!
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
                
                <input type="number" name="quantity" placeholder="update plate number" class="form-control" required="">

                <label class="form-label" for="form3Example1"></label>
                <br>
              <button type="submit" name="submit" class="btn btn-primary btn-block mb-2">
                UPDATE
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</body>
</html>
