<?php 
    include "header.php";
    include "config.php";
    $id=$_GET['id'];
?>
<div id="admin-content">
<div class="container">
    <div class="row">
    <div class="col-md-12">
        <h1 class=" admin-heading">Add post Description</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
    <!-- Form -->
    <form  action="save-Description.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Heading</label>
        <input type="text" name="heading" class="form-control" autocomplete="off">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1"> Description</label>
        <textarea name="desc" class="form-control" rows="10" ></textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Image</label>
        <input type="file" name="fileToUpload" accept="image/x-png,image/gif,image/jpeg" >
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
    </form>
    <!--/Form -->
    </div>
</div>
</div>
</div>
<?php include "footer.php"; ?>
