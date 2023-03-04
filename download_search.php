<?php
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=Search Table.xls");
    header("Program: no-cache");
    header("Expires: 0");

    include 'link.php';
    $output="";
    $output .="
    <table>
        <thead>
            <tr>
                <th>Plate Number</th>
                <th>Drive Name</th>
                <th>Telephone</th>
                <th>Service</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Date</th>
                <th>Time</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
    ";
    
    $select=$mysqli->query("SELECT product.*,vehicles.* FROM product INNER JOIN vehicles WHERE product.vehicle_id=vehicles.vehicle_id")or die("select failed");
    while ($fetch=mysqli_fetch_array($select)){
    $output .="
        <tr>
            <td>".$fetch['plate']."</td>
            <td>".$fetch['driver']."</td>
            <td>".$fetch['telephone']."</td>
            <td>".$fetch['service']."</td>
            <td>".$fetch['price']."</td>
            <td>".$fetch['quantity']."</td>
            <td>".$fetch['date']."</td>
            <td>".$fetch['time']."</td>
            <td>".$fetch['totalprice']."</td>
        </tr>
        ";
    }
    $output .="
    </tbody>
    </table>
    ";
    echo $output;
?>