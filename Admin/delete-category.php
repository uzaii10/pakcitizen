<?php
    include "config.php";
    session_start();
    if($_SESSION["user_role"]=='0'){          //checks if the user is normal user
        header("Location: {$hostname}/admin/post.php");       //redirect to post.php
    }    
    $id=$_GET['id'];
    $sql="DELETE FROM post WHERE postcategory=$id;";
    $sql.="DELETE FROM category WHERE categoryid=$id";
    echo $sql;
    if($conn->multi_query($sql)){
        header("location: {$hostname}/admin/category.php");
    }
    else{
        echo "<p style='color:red; text-align:center; margin:10px 0;'>ERROR: can't delete user</p>". $conn->error;
    }
    $conn->close();

?>