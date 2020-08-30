<?php
    include "config.php"; 
    $id=$_GET['id'];
    $pid=$_GET['postid'];
    $sql="DELETE FROM des WHERE desid={$id}";
    if($conn->query($sql)){
       Header("location: {$hostname}/admin/description.php?id=$pid");
    }
    else{
        echo "<p style='color:red; text-align:center; margin:10px 0;'>ERROR: can't delete user</p>". $conn->error;
    }
    $conn->close();  
?>