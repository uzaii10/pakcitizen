<?php
	include "header.php";
?>
<!-- Spinner waiting code -->
	<div class="spinner-border text-dark" role="status">
	  <span class="sr-only">Loading...</span>
	</div>
<!-- End of spinner -->

<?php
$id=$_GET['id'];
			$sql="SELECT * FROM category where categoryid=$id";
			$result=$conn->query($sql);
            while($row=$result->fetch_assoc()){?>
<div class="container-fluid">
  <img src="Admin/upload/<?php echo $row['catImage'];?>" class="img-fluid" alt="Responsive image">
</div>
			<?php }?>
<div class="container padding">
  <!-- <img src="media/Sports.jpg" class="img-fluid" alt="Responsive image"> -->

	<div class="row welcome text-center">
		<div class="col-12">
	<br><br>
			<h2 class="display-5 font">Top Stories</h2>

		</div>
	</div>


	<!--- Cards -->
	<div class="card-deck">
	<?php
			$id=$_GET['id'];
			$sql="SELECT * FROM post
			LEFT JOIN category ON post.postcategory=category.categoryID
			LEFT JOIN USER ON post.postAuthor=user.userid
			where postcategory=$id
			ORDER BY post.postID DESC";
	        $result=$conn->query($sql);
	        if($result->num_rows>0){
	            while($row=$result->fetch_assoc()){
	?>
		<div class="col-sm-12 col-md-6 col-lg-4">
	 	 <div class="card">
	    <img src="admin/upload/<?php echo $row["postimage"]?>" class="card-img-top" alt="" width="854" height="175">
	    <div class="card-body">

				<a class="text" href="news.php?id=<?php echo $row["postID"]?>"><h6 class="card-title card-title"><?php echo substr($row["postTitle"],0,80).'...';?></h6></a>

	      <p class="card-text card-desc"><?php echo substr($row["postDescription"],0, 90).'...';?></p>

			<a class="text card-desc" href="news.php?id=<?php echo $row["postID"]?>"><button class="btn btn-outline-success">Learn More</button></a>


	    </div>
	    <div class="card-footer">
	      <small class="text-muted">
		  <?php echo $row["categoryName"]." - ";?>
		  	<?php echo $row["firstname"]." ".$row["lastName"]." - "; ?>
		   	<?php echo $row["postDate"];?></small>

	    </div>
	 	</div>
		</div>
				<?php }}?>
	</div>

	<!-- Card Ends -->

<br><br>
<!--- Connect -->
<div class="container-fluid padding">
	<div class="row text-center padding">
		<div class="col-12">
			<h3 class="font">Connect</h3>
		</div>

		<div class="col-12 social padding">
			<a href="#"><i id="social-fb" class="fab fa-facebook-square fa-3x social"></i></a>
			<a href="#"><i id="social-tw" class="fab fa-twitter-square fa-3x social"></i></a>
			<a href="@"><i id="social-gp" class="fab fa-google-plus-square fa-3x social"></i></a>
			<a href="#"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
		</div>
	</div>
</div>
</div>
</div>

<!-- Footer -->
<?php
	include "footer.php";
?>
</body>
</html>
