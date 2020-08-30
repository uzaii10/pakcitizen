<?php
    include "config.php";
    session_start();
    if(!isset($_SESSION["username"])){          //checks if any username is logged in
        header("Location: {$hostname}/admin/");
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Admin Panel</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="bootstrap.min.css" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="font-awesome.css">
        <!-- Custom stlylesheet -->
        <!-- <link rel="stylesheet" href="style.css"> -->
        <link rel="stylesheet" href="adminstyles.css">

    </head>
    <body>
      </div>
        <!-- HEADER -->
        <div id="header-admin">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-6">
                        <div class="admin-logout">Welcome to Pak Citizen</div><br>
                        <div class="admin-logout"><?php echo "Hello!".""; ?></div>
                        <div class="admin-logout"><?php echo $_SESSION["username"]; ?></div>
                    </div>

                    <!-- /LOGO -->
                      <!-- LOGO-Out -->
                    <div class="col-md-offset-5  col-md-1">
                    <a href="logout.php" class="admin-logout btn btn-secodary" >logout</a></button>
                    </div>
                    <!-- /LOGO-Out -->
                </div>
            </div>
        </div>
        <!-- /HEADER -->



        <!-- Menu Bar -->
        <div id="admin-menubar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <ul class="admin-menu">
                            <li>
                                <a class="" href="post.php">Post</a>
                            </li>
                            <?php
                            if($_SESSION["user_role"]=='1'){
                            ?>
                                <li>
                                <a href="category.php">Category</a>
                            </li>
                            <li>
                                <a href="users.php">Users</a>
                            </li>
                            <li>
                                <a href="settings.php">Settings</a>
                            </li>
                            <?php
                        }
                        ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Menu Bar -->
