<?php include 'header.php'; ?>

    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-lg-8">

                <!-- post-container -->
                <div class="post-container">
                <?php
                if(isset($_GET['search'])){
                    $search_term=$conn->real_escape_string($_GET['search']);
                ?>
                <h3 class="page-heading alert alert-light "> Search: <?php echo $search_term; ?></h3>
                <?php
                    $limit=3;
                    if(isset($_GET['page'])){
                        $page=$_GET['page'];
                    }
                    else{
                        $page=1;
                    }
                    $offset=($page-1)*$limit;
                    $sql="SELECT * FROM post
                    LEFT JOIN category ON post.postcategory=category.categoryID
                    LEFT JOIN USER ON post.postAuthor=user.userid
                    WHERE post.posttitle LIKE '%{$search_term}%' or
                    post.postdescription LIKE '%{$search_term}%'
                    ORDER BY postID DESC LIMIT {$offset},{$limit}";
                    $result=$conn->query($sql);
                    if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                ?>
                    <div class="post-content">
                        <div class="row">
                            <div class="col-md-4">
                                <div><img src="admin/upload/<?php echo $row["postimage"]?>" alt=""/></div>
                            </div>
                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                    <h3 ><a href='news.php?id=<?php echo $row["postID"]?>'><?php echo $row["postTitle"]?></a></h3>
                                    <div class="post-information">
                                        <span>
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                            <a href='category.php'><?php echo $row["categoryName"];?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <a href='author.php'><?php echo $row["firstname"]." ".$row["lastName"]; ?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <?php echo $row["postDate"];?>
                                        </span>
                                    </div>
                                    <p class="description">
                                    <?php echo substr($row["postDescription"],0,100).'...';?>
                                    </p>
                                    <a class='read-more pull-right' href='news.php?id=<?php echo $row["postID"]?>'>read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }}else{?>
                        <h5 class=" alert alert-warning">No record found</h5>
                    <?php } ?>
                    <?php
                    $sql1="SELECT * FROM post
                    LEFT JOIN category ON post.postcategory=category.categoryID
                    LEFT JOIN USER ON post.postAuthor=user.userid
                    WHERE post.posttitle LIKE '%{$search_term}%' or
                    post.postdescription LIKE '%{$search_term}%'";
                    $result1=$conn->query($sql1);
                    if($result1->num_rows>0){
                        $total_records=$result1->num_rows;
                        $total_page=ceil($total_records/$limit);
                        echo '<ul class="pagination admin-pagination">';
                        if($page>1){
                            echo '<li><a href="search.php?search='.$search_term.'& page='.($page-1).'">Prev</li></a>';
                        }
                        for($i=1;$i<=$total_page;$i++){
                        if($i==$page){
                            $active="active";
                        }else{
                            $active="";
                        }
                            echo '<li class="'.$active.'"><a href="search.php?search='.$search_term.'& page='.$i.'">'.$i.'</a></li>';
                        }
                        if($total_page>$page){
                        echo '<li><a href="search.php?search='.$search_term.'&page='.($page+1).'">Next</li></a>';
                        }
                        echo "</ul>";
                    }}
                    ?>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
