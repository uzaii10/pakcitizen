<?php include "header.php";
include "config.php";
?>
<div id="admin-content">
<div class="container">
    <div class="row">
    <div class="col-md-12">
        <h5 class="admin-heading">Add New Post </h5>
    </div>
    <div class="col-md-offset-3 col-md-6">


    <!-- Form -->
    <form  action="save-post.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Title</label>
        <input type="text" name="post_title" class="form-control" autocomplete="off" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1"> Description</label>
        <textarea name="postdesc" class="form-control" rows="5"  required></textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Category</label>
        <select name="category" class="form-control">
        <option value=""> Select Category</option>
    <?php
        $sql="select * from category";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo "<option value={$row['categoryID']}>{$row['categoryName']}</option>";
            }
            }
    ?>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">slider Image</label>
        <input type="file" name="slider" accept="image/png,image/gif,image/jpeg" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Cover Image</label>
        <input type="file" name="fileToUpload" accept="image/x-png,image/gif,image/jpeg" required>
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
    </form>
    <!--/Form -->


    </div>
</div>
</div>
</div>

<?php include "footer.php"; ?>
