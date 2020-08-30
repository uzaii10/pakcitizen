<?php
include "config.php";
session_start();        //start session

session_unset();        // remove all session variables

session_destroy();      //destroy the session

header("Location: {$hostname}/admin/");        //redirect to login page
?>