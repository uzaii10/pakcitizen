<?php
    include "config.php"; 
    $id=$_GET['id'];
    $cate=$_GET['cateid'];
    $sql1="DELETE FROM des WHERE postid={$id}";
    if($conn->query($sql1)){
    $sql="DELETE FROM post WHERE postid={$id};";
    $sql.="UPDATE category SET categoryposts=categoryposts-1 WHERE categoryID={$cate}";
    echo $sql;
    if($conn->multi_query($sql)){
       Header("location: {$hostname}/admin/post.php");
    }
    else{
        echo "<p style='color:red; text-align:center; margin:10px 0;'>ERROR: can't delete user</p>". $conn->error;
    }
}
    $conn->close();
?>