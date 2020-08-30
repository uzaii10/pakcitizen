<?php
    $hostname="http://localhost/news-template";
    $conn = new mysqli("localhost", "root","","pakCitizen");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>