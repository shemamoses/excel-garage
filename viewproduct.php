<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>View Product</title>
    <!-- <link rel="stylesheet" href="homev.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/bootstrap.min.js"></script> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=SF+Pro+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" sizes="16x16" href="pictures/logo.png">
  <style>
 
    ::-webkit-scrollbar {
      width: 8px;
      height: 5px;
      
    }

    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

 
    ::-webkit-scrollbar-thumb {
      background: linear-gradient(transparent, #30ff00);
      border-radius: 6px;
    }

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

	<br><br>
  <center>
<div>
  <a href="download_product.php"><button class="btn btn-info">Save Excel File</button></a>
</div>
<br>
		<a href="viewvehicle.php"><button class="btn btn-success">New Service</button></a>
	</center>
  <br>
  

  <div class="container-lg">
  <div class="card bg-glass">
          <div class="card-body px-4 py-3 px-md-5">
              <div class="row">
                <div class="form-outline mb-4">
                  <div class="form-outline">
                  
<div class="table-responsive-sm">
	<table class="table table-hover table-striped">
	<thead class="table-info shadow">
		<th class="shadow">Driver Name</th>
		<th class="shadow">Telephone</th>
		<th class="shadow">Plate Number</th>
		<th class="shadow">Service</th>
		<th class="shadow">Price</th>
		<th class="shadow">Quantity</th>
		<th class="shadow">Date</th>
		<th class="shadow">Time</th>
		<th class="shadow">Total Price</th>
		<th colspan="4" class="shadow">Actions</th>
    
	</thead>
	<tbody>
	<?php
		  include 'link.php';
		  $select=$mysqli->query("SELECT product.*,vehicles.* FROM product INNER JOIN vehicles WHERE product.vehicle_id=vehicles.vehicle_id ORDER BY date DESC")or die("select failed");
           while ($fetch=mysqli_fetch_array($select)) {
            $price_db=$fetch['price'];
            $price_format=number_format($price_db);
             $totalprice_db=$fetch['totalprice'];
             $format=number_format($totalprice_db);
           	?>
           	<tr>
           		<td><?php echo $fetch['driver']; ?></td>
           		<td><?php echo $fetch['telephone']; ?></td>
           		<td><?php echo $fetch['plate']; ?></td>
           		<td><?php echo $fetch['service']; ?></td>
           		<td><?php echo $price_format; ?></td>
           		<td><?php echo $fetch['quantity']; ?></td>
           		<td><?php echo $fetch['date']; ?></td>
           		<td><?php echo $fetch['time']; ?></td>
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
		?>
	</tbody>

     <tfoot>
      <tr>
       <th colspan="8" class="shadow">Total</th>
          <?php
            $result=$mysqli->query("SELECT sum(totalprice) FROM product") or die("sum failed");
            while($row=mysqli_fetch_array($result)){
              $total=$row['sum(totalprice)'];
              $number=number_format($total);
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


<div class="card-footer py-5">


	</center>
	
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
<footer style="position: bottom: 0; left: 0; width: 100%; text-align: center;">
  <p style="color: white;">&copy; Excel Garage. All rights reserved.</p>
</footer>
</html>
