<?php include'link.php';
if (isset($_GET['vehicle_id'])) 
{
    $id=$_GET['vehicle_id'];
}
$select=$mysqli->query("SELECT * FROM product WHERE vehicle_id={$id}") or die("select failed");
while ($fetch=mysqli_fetch_array($select)) 
{
    $id_db=$fetch['vehicle_id'];
}
if (@$id_db==$id) 
{
	echo"<script>window.alert('You Can Not Delete This Vehicle !!!!!!!!!')</script>";
	echo"<script>window.location.replace('viewvehicle.php')</script>";   
}
else
{
    $delete=$mysqli->query("DELETE FROM vehicles WHERE vehicle_id={$id}");
    if ($delete) 
    {

        echo"<script>window.alert('Vehicle well removed')</script>";
        echo"<script>window.location.replace('viewvehicle.php')</script>";

    }
    else 
    {
        echo "<script>window.location.replace('viewvehicle.php)</script>";
    }  
}
?>