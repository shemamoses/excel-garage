<?php
    session_start();
    session_destroy();
    echo "<script>window.alert('logout succcessfully!!!')</script>";
    echo "<script>window.location.replace('login.php')</script>";
?>