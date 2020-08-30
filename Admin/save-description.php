<?php
    include "header.php";
    include "config.php";
    if(isset($_FILES['fileToUpload'])){
        $errors=array();
        echo $file_name=$_FILES['fileToUpload']['name'];
        $file_size=$_FILES['fileToUpload']['size'];
        $file_tmp=$_FILES['fileToUpload']['tmp_name'];
        $file_type=$_FILES['fileToUpload']['type'];
        if($file_size>2097152){
            $error[]="File size must be lower than 2mb";
        }
        if(empty($errors)==true){
        $name=$file_name;
        $target="upload/".$name;
        move_uploaded_file($file_tmp,$target);
        }
        else{
            print_r($errors);
        }
       
    }else{$name="";}
        echo $id=$_GET['id'];        
        $heading=$conn -> real_escape_string($_POST['heading']);
        $des=$conn -> real_escape_string($_POST['desc']);
        if(isset($_FILES['fileToUpload'])){
            $sql="INSERT INTO des(postID,heading,Descrip,desImage)
            VALUES('{$id}','{$heading}','{$des}','{$name}')";
        }
        else{
            $sql="INSERT INTO des(postID,heading,Descrip)
            VALUES('{$id}','{$heading}','{$des}')";
        }
        if($conn->query($sql)){
            header("location: {$hostname}/admin/description.php?id=$id");
        }
        else{
            echo "error". $conn->error;
        }
?>

