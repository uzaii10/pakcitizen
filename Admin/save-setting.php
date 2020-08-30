<?php
    include "config.php";
    if(empty($_FILES['new-image']['name'])){
        $file_name=$_POST['old-image'];
    }
    else{
        $errors=array();
        echo $file_name=$_FILES['new-image']['name'];
        $file_size=$_FILES['new-image']['size'];
        $file_tmp=$_FILES['new-image']['tmp_name'];
        $file_type=$_FILES['new-image']['type'];
        $tmp=explode('.',$file_name);
        $file_ext=strtolower(end($tmp));
        $extensions= array("jpeg","jpg","png");
        if(in_array($file_ext,$extensions)===false){
            $errors[]="this extension file is not allowed, please choose a JPG or PNG file";
        }
        if($file_size>2097152){
            $error[]="File size must be lower than 2mb";
        }
        if(empty($errors)==true){
            move_uploaded_file($file_tmp,"images/".$file_name);
        }
        else{
            print_r($errors);
        }
    }
    $name=$conn -> real_escape_string($_POST['Website_Name']);
    $sql="UPDATE settings SET  websiteName='{$name}',logo='{$file_name}'";
    if($conn->query($sql)){
        header("Location: {$hostname}/admin/settings.php");
    }  
    else{
        echo "ERROR ". $conn->error;
    }
?>