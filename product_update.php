<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Product</title>
    <link rel="stylesheet" href="vehicle.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/bootstrap.min.js"></script>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
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
          include 'link.php';
          if (isset($_GET['product_id'])) 
          {
              $id=$_GET['product_id'];
              $select=$mysqli->query("SELECT * FROM product WHERE product_id='$id'") or die("select failed");
           while ($fetch=mysqli_fetch_array($select)) {
           	?>
<div class="signup-form">
<form class="box" method="POST">
  <h2>Update Product</h2>
  <input type="text" name="driver" placeholder="Plate Number" value="<?php echo $fetch['driver'];?>">
  <input type="text" name="tel" placeholder="Plate Number" value="<?php echo $fetch['telephone'];?>">
  <input type="text" name="service" placeholder="Service" value="<?php echo $fetch['service'];?>">
  <input type="text" name="price" placeholder="Price" value="<?php echo $fetch['price'];?>">
  <button type="submit" class="login" name="submit">UPDATE</button>
</form>
</div>
<?php
$quantity_db=$fetch['quantity'];
}
          
}
if (isset($_POST['submit'])) 
{
    $date=date('y-m-d');
    $driver=$_POST['driver'];
    $tel=$_POST['tel'];
    $service=$_POST['service'];
    $price=$_POST['price'];
    $totalprice=$quantity_db*$price;
    $update=$mysqli->query("UPDATE product SET driver='$driver',telephone='$tel',service='$service',date='$date',price='$price',totalprice='$totalprice' where product_id='$id'");
        if ($update) 
        {
            echo"<script>alert('Product well updated');</script>";
            echo "<script>window.location.replace('viewproduct.php')</script>";
        }
            else
        {
            echo"<script>alert('Product Not Updated');</script>";
            echo "<script>window.history.back()</script>";
        }
}
            
    ?>
</body>
</html>
