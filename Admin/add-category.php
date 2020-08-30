<?php include "header.php"; 
    if($_SESSION["user_role"]=='0'){          //checks if the user is normal user
        header("Location: {$hostname}/admin/post.php");       //redirect to post.php
    }
if(isset($_POST['save'])){
    $name=$conn -> real_escape_string($_POST['cat']);
    echo $sqll = "SELECT * FROM category WHERE categoryname='{$name}'";
    $result=$conn->query($sqll);
    if ($result->num_rows > 0) {
        echo "<p style='color:red; text-align:center; margin:10px 0;'>CATEGORY ALREADY EXISTS</p>";
    }
    else{
        $sql="INSERT INTO category(categoryname) VALUES ('{$name}')";
        if($conn->query($sql)){
            header("Location: {$hostname}/admin/category.php");
        }  
        else{
            echo "ERROR ". $conn->error;
        }
    }
    $conn->close();
    }
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
