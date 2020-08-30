<?php include "header.php"; 
    include "config.php";
    $limit=3;
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }
    else{
        $page=1;
    }
    $offset=($page-1)*$limit;

    if($_SESSION["user_role"]=='1'){
        $sql="SELECT *,categoryname,username
        FROM  ((post
        INNER JOIN category ON post.postcategory=category.categoryID)
        INNER JOIN user ON user.userid=post.postAuthor)
        ORDER BY postID DESC LIMIT {$offset},{$limit}";
        }
        else{
            $sql="SELECT *,categoryname,username
            FROM  ((post
            INNER JOIN category ON post.postcategory=category.categoryID)
            INNER JOIN user ON user.userid=post.postAuthor) WHERE user.userRole=0
            ORDER BY postID DESC LIMIT {$offset},{$limit}";
        }
        $result=$conn->query($sql);
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
          <?php if($result->num_rows>0){ ?>
                <div class="col-md-10">
                    <h1 class="admin-heading">All Posts</h1>
                </div>
            <?php }?>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <?php if($result->num_rows>0){ ?>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                      <?php while($row=$result->fetch_assoc()){
                            ?>
                          <tr>
                              <td class='id'><?php echo $row["postID"];?></td>
                              <td><?php echo $row["postTitle"];?></td>
                              <td><?php echo $row["categoryName"];?></td>
                              <td><?php echo $row["postDate"];?></td>
                              <td><?php echo $row["username"];?></td>
                              <td class='edit'><a href='update-post.php?id=<?php echo $row["postID"] ?> & cateid=<?php echo $row["categoryID"]?>''><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-post.php?id=<?php echo $row["postID"] ?>& cateid=<?php echo $row["categoryID"] ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                      <?php
                    }}?>
                      </tbody>
                </table>
                <?php
                    if($_SESSION["user_role"]=='1'){
                        $sql="SELECT *FROM post";
                        }
                        else{
                            $sql="SELECT *,userrole
                            FROM post INNER JOIN user ON user.userid=post.postAuthor WHERE user.userRole=0";
                        }
                        $result=$conn->query($sql);
                        if($result->num_rows>0){
                        $total_records=$result->num_rows;
                        $total_page=ceil($total_records/$limit);
                        echo '<ul class="pagination admin-pagination">';
                        if($page>1){
                            echo '<li><a href="post.php?page='.($page-1).'">Prev</li></a>';
                        }
                        for($i=1;$i<=$total_page;$i++){
                        if($i==$page){
                            $active="active";
                        }else{
                            $active="";
                        }
                            echo '<li class="'.$active.'"><a href="post.php?page='.$i.'">'.$i.'</a></li>';
                        }
                        if($total_page>$page){
                        echo '<li><a href="post.php?page='.($page+1).'">Next</li></a>';
                        }
                        echo "</ul>";
                    }
                    ?>
              </div>
                <?php  ?>
          </div>
      </div>
  </div>
                <?php include "footer.php"; ?>
