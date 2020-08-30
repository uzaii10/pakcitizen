<!-- Login page -->
<?php

    include "config.php";   //Database file
    session_start();
    if(isset($_SESSION["username"])){          //checks if any username is logged in
        header("Location: {$hostname}/admin/post.php");
    }
?>
<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin Panel</title>
        <link rel="stylesheet" href="bootstrap.min.css" >
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <!-- <link rel="stylesheet" href="style.css"> -->
        <link rel="stylesheet" href="adminstyles.css">
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <!-- <img class="logo" src="images/PakCitizen.png"> -->
                        <img class=" text-center" src="images/logo.png" alt="Logo">  <br>
                        <br><h4 class="heading pak text-center">Admin Panel</h4><br>

                        <!-- Login Form Start -->
                        <form  action="<?php $_SERVER['PHP_SELF'];?>" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <input type="submit" name="login" class="btn btn-info btn-lg" value="login" />
                        </form>
                        <!-- /Login Form  End -->

<!-- php code -->
<?php

if(isset($_POST['login'])){
    // collect form data  with method=$_POST
    $username=$conn -> real_escape_string($_POST['username']);
    $password=md5($_POST['password']);      // MD5 message-digest algorithm
    //sql command
    $sql="SELECT userid,username,userRole from user WHERE username='{$username}' AND userpassword='{$password}'";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            //A session is a way to store information of user(in variables) to be used across multiple pages.
            session_start();        //start the session
            echo $_SESSION["username"]=$row['username'];            // Set session variables
            echo $_SESSION["user_id"]=$row['userid'];
            echo $_SESSION["user_role"]=$row['userRole'];
            header("Location: {$hostname}/admin/post.php");        // If user ifo matches goto posts.php
        }
    }
    else{
        echo "Username and Password not matched";
    }
}
?>
<!-- php code ends -->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
