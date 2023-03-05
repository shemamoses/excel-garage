<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Search Data</title>
    <!-- <link rel="stylesheet" href="home.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/bootstrap.min.js"></script> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> 
    <link rel="icon" sizes="16x16" href="pictures/logo.png">
    
    <style>
		body {
			margin: 0;
			padding: 0;
			height: 100%;
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
	</style>
    

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
	if (!@$_SESSION['username']) 
	{
		echo "<script>window.alert('login to access this page')</script>";
		echo "<script>window.location.replace('login.php')</script>";
	}
?>
  <body>
  <div class="blob"></div>
  <nav class="navbar navbar-expand-sm bg-primary navbar-dark shadow">
        <div class="container-fluid">
            <a href="home.php" class="navbar-brand">EXCEL GARAGE</a>
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

    <section class="background-radial-gradient overflow-hidden">
  <style>
    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>
    <br>
		<div class="card-body">
      <div class="row justify-content-center">
          <div class="col-md-4">
            <form class="box" method="POST">
              <div class="form-group">
                <input type="text" name="get_id" id="mysearch" placeholder="Search Plate number" class="form-control">
              </div>
              <button type="submit" name="send" class="btn btn-success">Search</button>
          </form>
        </div>
      </div>
      </section>
      <?php
        if (isset($_POST['send'])) 
        {
          $input=$_POST['get_id'];
          $select=$mysqli->query("SELECT * FROM vehicles JOIN product ON vehicles.vehicle_id = product.vehicle_id WHERE vehicles.plate LIKE '%$input%'")or die("select failed");
      ?>
      <br>
      <div class="container-lg">
  <div class="card bg-glass">
          <div class="card-body px-4 py-3 px-md-5">
              <div class="row">
                <div class="form-outline mb-4">
                  <div class="form-outline">
      
      <div class="table-responsive">
          <table class="table table-hover table-striped">
          <thead class="shadow">
          <tr>
              <td><b>Plate Number</td>
              <td><b>Telephone</td>
              <td><b>Service</td>
              <td><b>Price</td>
              <td><b>Quantity</td>
              <td><b>Driver Name</td>
              <td><b>Date</td>
              <td><b>Time</td>
              <td><b>Total Price</td>
              <td colspan="4"><b>Actions</td>
            </tr>
          </thead>
          <tbody>
            <?php
              if ($num=mysqli_num_rows($select) > 0) 
              {
                while ($fetch=mysqli_fetch_array($select)) {
                  $price_db=$fetch['price'];
                  $price_format=number_format($price_db);
                  $totalprice_db=$fetch['totalprice'];
                  $format=number_format($totalprice_db);
           	?>
                <tr class="table-info">
                  <td><?php echo $fetch['plate'] ?></td>
                  <td><?php echo $fetch['telephone'] ?></td>
                  <td><?php echo $fetch['service'] ?></td>
                  <td><?php echo $price_format; ?></td>
                  <td><?php echo $fetch['quantity'] ?></td>
                  <td><?php echo $fetch['driver'] ?></td>
                  <td><?php echo $fetch['date'] ?></td>
                  <td><?php echo $fetch['time'] ?></td>
                  <td><?php echo $format; ?></td>
    <td>
  <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
    Actions
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <li><a class="dropdown-item" href="product_add.php?product_id=<?php echo $fetch['product_id']; ?>">Add</></a></li>
    <li><a class="dropdown-item" href="product_remove.php?product_id=<?php echo $fetch['product_id']; ?>">Remove</a></li>
    <li><a class="dropdown-item" href="product_update.php?product_id=<?php echo $fetch['product_id']; ?>">Update</a></li>
    <li><a class="dropdown-item" href="product_delete.php?product_id=<?php echo $fetch['product_id']; ?>">Delete</a></li>
  </ul>
</div>
</td>
                </tr>
              
           	<?php
                }
              }
              else 
              {
                ?>
                <tr>
                  <td colspan="12">No Record Available</td>
                </tr>
                <?php
              }
              ?>
          </tbody>
     <tfoot>
      <tr>
       <th colspan="8" class="shadow">Total</th>
          <?php
            @$result=$mysqli->query("SELECT sum(product.totalprice) FROM product INNER JOIN vehicles WHERE product.vehicle_id=vehicles.vehicle_id AND vehicles.plate LIKE '%$input%'") or die("sum failed");
            while($row=mysqli_fetch_array($result)){
              $sum=$row['sum(product.totalprice)'];
              $number=number_format($sum);
						?>
						<td><b><?php echo $number; ?></b></td>
						</tr>
     </tfoot>
            <?php
            }
          ?>
          </table>
          
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

    </div>
          
    <?php
        }
    ?>
    
  </body>
</html>
