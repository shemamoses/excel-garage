<?php
    session_start();
    session_destroy();
    echo "<script>window.alert('GoodBye!!')</script>";
    echo "<script>window.location.replace('login.php')</script>";
?>