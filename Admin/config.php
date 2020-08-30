<?php
    $hostname="http://localhost/project";
    $conn = new mysqli("localhost", "root","","pakcitizen");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>