<?php
    include "header.php";
    if($_SESSION["user_role"]=='0'){          //checks if the user is normal user
        header("Location: {$hostname}/admin/post.php");       //redirect to post.php
    }
    $limit=4;                                  //no of post per page=3
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }
    else{
        $page=1;
    }
    $offset=($page-1)*$limit;                   //offset=(1-1)*3=0 (start from 0)
    $sql="SELECT * FROM category ORDER BY categoryID DESC LIMIT {$offset},{$limit}";        //start from 0 ed at 3
    $result=$conn->query($sql);
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
        <?php if($result->num_rows>0) {?>
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
        <?php }?>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <!-- start if -->
            <?php if($result->num_rows>0){?>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                    <!-- start While loop -->
                    <?php while($row=$result->fetch_assoc()){?>
                        <tr>
                            <td class='id'><?php echo $row["categoryID"]; ?></td>
                            <td><?php echo $row["categoryName"]; ?></td>
                            <td><?php echo $row["categoryPosts"]; ?></td>
                            <td class='edit'><a href="update-category.php?id=<?php echo $row['categoryID']; ?>"><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href="delete-category.php?id=<?php echo $row['categoryID']; ?>"><i class='fa fa-trash-o'></i></a></td>
                        </tr>
                    <?php } //while loop ended?>
                    </tbody>
                </table>
                <?php
                    $sql1="SELECT * FROM category";
                    $result1=$conn->query($sql1);
                    if($result1->num_rows>0){
                        $total_records=$result1->num_rows;
                        $total_page=ceil($total_records/$limit);
                        echo '<ul class="pagination admin-pagination">';
                        if($page>1){
                            echo '<li><a href="category.php?page='.($page-1).'">Prev</li></a>';
                        }
                        for($i=1;$i<=$total_page;$i++){
                        if($i==$page){
                            $active="active";
                        }else{
                            $active="";
                        }
                            echo '<li class="'.$active.'"><a href="category.php?page='.$i.'">'.$i.'</a></li>';
                        }
                        if($total_page>$page){
                        echo '<li><a href="category.php?page='.($page+1).'">Next</li></a>';
                        }
                        echo "</ul>";
                    }
                    ?>
            </div>
                    <?php } //if ended ?>
         </div>
     </div>
</div>
<?php
include "footer.php"; ?>
