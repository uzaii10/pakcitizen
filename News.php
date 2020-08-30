<?php
	include "header.php";
    include "config.php";
    ?>
<div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                  <!-- post-container -->
                    <div class="post-container">
<?php
	$id=$_GET['id'];
	$sql="SELECT * FROM post
	LEFT JOIN category ON post.postcategory=category.categoryID
	LEFT JOIN USER ON post.postAuthor=user.userid where postid=$id";
	$result=$conn->query($sql);
	while($row=$result->fetch_array()){
?>
<br><br>
                        <div class="post-content single-post">
                            <h3 class="card-title"><?php echo $row["postTitle"];?></h3> <br>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <?php echo $row["categoryName"]." - ";?>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <?php echo $row["firstname"]." ".$row["lastName"]." - "; ?>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $row["postDate"];?>
                                </span>
                            </div>
														<br>

                            <img class="single-feature-image" src="admin/upload/<?php echo $row["postimage"]?>" alt=""/>

                            <p class="para">
															<br>

												<?php echo $row["postDescription"];?></p>
                        <?php }
                            $sql="SELECT * FROM des where postid=$id";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_array()){
                        ?>
                        <b><?php echo $row["heading"]; ?></b>
                        </br>
                        <p><?php echo $row["descrip"]; ?></p>
                        </br>
                        <?php
                            if($row['desImage']!=null || $row['desImage']!=''){
                        ?>
                        <div class= "des-image">
                            <img src="admin/upload/<?php echo $row["desImage"]?>" alt=""/>
                            </br>
                            </div>
                            </br>
                            <?php }} ?>
                        </div>
                    </div>
                    <!-- /post-container -->
				</div>
                            <?php
                             include 'sidebar.php'; ?>

            </div>
        </div>
    </div>
<!--- Footer -->
<?php
	include "footer.php";
?>



</body>
</html>
