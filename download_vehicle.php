<?php
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=Vehicle Table.xls");
    header("Program: no-cache");
    header("Expires: 0");

    include 'link.php';
    $output="";
    $output .="
    <table>
        <thead>
            <tr>
                <th>Vehicle Id</th>
                <th>Plate Number</th>
            </tr>
        </thead>
        <tbody>
    ";
    
    $select=$mysqli->query("SELECT * FROM vehicles");
    while ($fetch=mysqli_fetch_array($select)){
    $output .="
        <tr>
            <td>".$fetch['vehicle_id']."</td>
            <td>".$fetch['plate']."</td>
        </tr>
        ";
    }
    $output .="
    </tbody>
    </table>
    ";
    echo $output;
?>