<?php include'link.php';
if (isset($_GET['product_id'])) 
{
    $id=$_GET['product_id'];
}
$select=$mysqli->query("SELECT * FROM export WHERE product_id={$id}") or die("select failed");
while ($fetch=mysqli_fetch_array($select)) 
{
    $id_db=$fetch['product_id'];
}
if (@$id_db==$id) 
{
	echo"<script>window.alert('You Can Not Delete This Record !!!!!!!!!')</script>";
	echo"<script>window.location.replace('viewproduct.php')</script>";   
}
else
{
    $delete=$mysqli->query("DELETE FROM product WHERE product_id={$id}");
    if ($delete) 
    {

        echo"<script>window.alert('Product well removed')</script>";
        echo"<script>window.location.replace('viewproduct.php')</script>";

    }
    else 
    {
        echo "<script>window.location.replace('viewproduct.php)</script>";
    }  
}
?>