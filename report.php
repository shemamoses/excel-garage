<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/bootstrap.min.js"></script> 
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
		<script>
					$(document).ready(function(){
						
						var dataTable = $('#table').DataTable({
							"processing" : true,
							"serverSide" : true,
							"order" : [],
							"ajax" : {
							},
							drawCallback:function(settings)
							{
							$('#totalprice').html(settings.json.total);
							}
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

	<div class="card-body">
	<div class="container">
    <h3 style="color: white">Dates</h3>
		<form method="POST">
		
  <div class="form-row">
    <div class="col-md-3">
      <label style="color: white">From</label>
      <input type="date" name="date" class="form-control form-control-md">
    </div>
    <div class="col-md-3">
      <label style="color: white">To</label>
      <input type="date" name="date1" class="form-control" id="date-input">
	  
    </div>
  </div>
  <br>
  <button type="submit" name="send" class="btn btn-info">Check</button>
</div>
<br>
<div class="container-lg">
  <div class="card bg-glass">
          <div class="card-body px-4 py-3 px-md-5">
              <div class="row">
                <div class="form-outline mb-4">
                  <div class="form-outline">
                  
<br>
  <center>
		<a href="vehiclereport.php">Single Vehicle Report</button></a>
	</center>
<div class="table-responsive container">
    <h3>Report</h3>
 			<table id="table" class="table table-bordered table.striped">
			 <thead class="table-info">
					<th>Driver Name</th>
					<th>Telephone</th>
					<th>Plate Number</th>
					<th>Service</th>
					<th>Price</th>
					<th>Imported Quantity</th>
					<th>Imported Date</th>
					<th>Imported Time</th>
					<th>Total Price</th>
			 </thead>
			 <tbody>
					<?php
					include'link.php';
					if (isset($_POST['send'])) 
					{
							$date=$_POST['date'];
							$date1=$_POST['date1'];
							
							
							if (empty($date)|| empty($date1)) 
							{
								echo "<script>alert('Fill The Both Date and Plate Number!!!')</script>";
							}
							else
							{
								$select=$mysqli->query("SELECT product.*,vehicles.* FROM product INNER JOIN vehicles WHERE product.vehicle_id=vehicles.vehicle_id AND date BETWEEN '$date' and '$date1'") or die("failed to join"); 
								
								if ($num=mysqli_num_rows($select) > 0) 
								{
									while($fetch_date=mysqli_fetch_array($select)){
										$price_db=$fetch_date['price'];
										$date_db=$fetch_date['price'];
										$price_format=number_format($price_db);
										$totalprice_db=$fetch_date['totalprice'];
                    $format=number_format($totalprice_db);
                    $_SESSION['date']=$date_db;
									?>
												<tr>
													<td><?php echo $fetch_date['driver'] ?></td>
													<td><?php echo $fetch_date['telephone'] ?></td>
													<td><?php echo $fetch_date['plate'] ?></td>
													<td><?php echo $fetch_date['service'] ?></td>
													<td><?php echo $price_format; ?></td>
													<td><?php echo $fetch_date['quantity'] ?></td>
													<td><?php echo $fetch_date['date'] ?></td>
													<td><?php echo $fetch_date['time'] ?></td>
													<td><?php echo $format; ?></td>
												</tr>
									<?php
								}
							}
							else 
							{
								?>
								<tr>
									<td colspan="8"><?php echo"<script>window.alert('No Record Available')</script>"?></td>
								</tr>
								<?php
							}
						}
					}
							?>
			 </tbody>
     <tfoot>
      <tr>
       <th colspan="8">Total</th>
          <?php
            @$result=$mysqli->query("SELECT sum(product.totalprice) FROM product INNER JOIN vehicles WHERE product.vehicle_id=vehicles.vehicle_id  AND date BETWEEN '$date' and '$date1'") or die("sum failed");
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
<div class="card-footer py-5">
</div>

		</form>
	</div>
</div>
  </body>
  <footer style="position: bottom: 0; left: 0; width: 100%; text-align: center;">
  <p style="color: white;">&copy; Excel Garage. All rights reserved.</p>
</footer>
</html>
