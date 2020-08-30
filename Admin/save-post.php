<?php
    include "header.php";
    include "config.php";
    if(isset($_FILES['fileToUpload'])){
        $errors=array();
        $file_name=$_FILES['fileToUpload']['name'];
        $file_size=$_FILES['fileToUpload']['size'];
        $file_tmp=$_FILES['fileToUpload']['tmp_name'];
        $file_type=$_FILES['fileToUpload']['type'];
        if($file_size>2097152){
            $error[]="File size must be lower than 2mb";
        }
        $name=$file_name;
        $target="upload/".$name;
    }
    if(isset($_FILES['slider'])){
        $errors=array();
        $slider_name=$_FILES['slider']['name'];
        $slider_size=$_FILES['slider']['size'];
        $slider_tmp=$_FILES['slider']['tmp_name'];
        $slider_type=$_FILES['slider']['type'];
        if($slider_size>2097152){
            $error[]="File size must be lower than 2mb";
        }
        $sname=$slider_name;
        $starget="upload/".$sname;
    }
    if(empty($errors)==true){
        move_uploaded_file($file_tmp,$target);
        move_uploaded_file($slider_tmp,$starget);
        $title=$conn -> real_escape_string($_POST['post_title']);
        $des=$conn -> real_escape_string($_POST['postdesc']);
        echo $cate=$conn -> real_escape_string($_POST['category']);
        $date=date("d M,Y");
        $author=$_SESSION['user_id'];
        $sql="INSERT INTO post(postTitle,postDescription,postImage,slider,postDate,postCategory,postAuthor)
        VALUES('{$title}','{$des}','{$name}','{$sname}','{$date}','{$cate}','{$author}');";
        $sql .="UPDATE category SET categoryposts=categoryposts+1 WHERE categoryID={$cate}";
        if($conn->multi_query($sql)){
            $last_id = $conn->insert_id;
            header("location: {$hostname}/admin/description.php?id=$last_id");
        }
        else{
            echo "error". $conn->error;
        }
    }else{
        print_r($errors);
    }
?>
