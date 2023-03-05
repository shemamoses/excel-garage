<?php include'link.php';
if (isset($_GET['product_id'])) 
{
    $id=$_GET['product_id'];
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