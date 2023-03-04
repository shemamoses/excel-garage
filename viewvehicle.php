<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>View Vehicle</title>
    <!-- <link rel="stylesheet" href="home.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/bootstrap.min.js"></script>  
		<script src="bootstrap/jquery/jquery.min.js"></script>  
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

    
    <script>
        $(document).ready(function(){
          $("#myInput").on("keyup",function(){
            var value=$(this).val().toLowerCase();
            $("#myTable tr").filter(function(){
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
    </script>
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
<center>
    <div class="container">
	<br><br><br>
  <div class="form-group">
    <input type="text" id="myInput" placeholder="Search vehicle" class="form-control col-md-4">
  </div>

<div>
  <a href="download_vehicle.php"><button class="btn btn-info">Save Excel File</button></a>
</div>
<br>
<div>
  <a href="vehicles.php"><button class="btn btn-success">Insert New Vehicle</button></a>
</div>
	<br>
<div class="table-responsive">
	<table class="table table-hover table-striped">
  <thead class="table-info">
		<th>Plate Number</th>
		<th colspan="3">Actions</th>
  </thead>
  <tbody id="myTable">
		<?php
		  include 'link.php';
		  $select=$mysqli->query("SELECT * FROM vehicles");
           while ($fetch=mysqli_fetch_array($select)) {
           	?>
           	<tr>
           		<td><?php echo $fetch['plate'] ?></td>
           		<td><a href="product.php?vehicle_id=<?php echo $fetch['vehicle_id'] ?>"><button class="btn btn-primary">New service</button></a></td>
           		<td><a href="vehicle_delete.php?vehicle_id=<?php echo $fetch['vehicle_id'] ?>"><button class="btn btn-danger">Delete</button></a></td>
           		<td><a href="vehicle_update.php?vehicle_id=<?php echo $fetch['vehicle_id'] ?>"><button class="btn btn-warning">Update</button></a></td>
           	</tr>
           	<?php
           }
		?>
  </tbody>
	</table>
	</center>
	<br><br>
    </div>
	
</div>
    </div>
  </body>
  <footer style="position: bottom: 0; left: 0; width: 100%; text-align: center;">
  <p style="color: white;">&copy; Excel Garage. All rights reserved.</p>
</footer>
</html>
