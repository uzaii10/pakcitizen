<?php include "header.php"; 
    include "config.php";
    $limit=9;
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }
    else{
        $page=1;
    }
    $id=$_GET['id'];
    $offset=($page-1)*$limit;
        $sql="SELECT * FROM des WHERE postid=$id
        ORDER BY postID DESC LIMIT {$offset},{$limit}";
        $result=$conn->query($sql);
        ?>
          <div id="admin-content">
              <div class="container">
                  <div class="row">
                    <?php if($result->num_rows>0){?>
                      <div class="col-md-10">
                          <h1 class="admin-heading">All Description</h1>
                      </div>
                    <?php } ?>
                    <div class="col-md-2">
                        <a class="add-new" href="add-Description.php?id=<?php echo $id; ?>">add Description</a>
                    </div>
                    <?php 
                        if($result->num_rows>0){
                    ?>
                <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Heading</th>
                          <th>Description</th>
                          <th>image</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                      <?php while($row=$result->fetch_assoc()){
                            ?>
                          <tr>
                              <td class='id'><?php echo $row["desID"];?></td>
                              <td><?php echo substr($row["heading"],0,30).'..';?></td>
                              <td class="text-justify"><?php echo substr($row["descrip"],0,85).'..';?></td>
                              <td><?php echo $row["desImage"];?></td>
                              <td class='edit'><a href='update-des.php?id=<?php echo $row["desID"] ?> & postid=<?php echo $row["postid"] ?>' ><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-des.php?id=<?php echo $row["desID"] ?> & postid=<?php echo $row["postid"] ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                      <?php
                    }?>
                      </tbody>
                </table>
                <?php
                        $sql="SELECT *FROM des where postid=$id";
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
                            echo '<li class="'.$active.'"><a href="description.php?page='.$i.'">'.$i.'</a></li>';
                        }
                        if($total_page>$page){
                        echo '<li><a href="description.php?page='.($page+1).'">Next</li></a>';
                        }
                        echo "</ul>";
                    }
                    ?>
              </div>
                <?php }  $conn->close(); ?>
          </div>
      </div>
  </div>
                <?php include "footer.php"; ?>
