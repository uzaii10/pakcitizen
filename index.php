<?php
	include "header.php";
?>
<!-- Spinner waiting code -->
	<div class="spinner-border text-dark" role="status">
	  <span class="sr-only">Loading...</span>
	</div>
<!-- End of spinner -->

	<!-- Hero slider -->
	<!-- <div class="container"> -->
	<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
	 <ol class="carousel-indicators">
		 <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
		 <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
		 <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
		 <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
		 <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
		 <li data-target="#carouselExampleCaptions" data-slide-to="5"></li>
		 <li data-target="#carouselExampleCaptions" data-slide-to="6"></li>
	 </ol>

	 <div class="carousel-inner">
		<?php

            $limit=7;   //limit the number of posts in recent

            $sql="SELECT * FROM post
            LEFT JOIN category ON post.postcategory=category.categoryID
            ORDER BY post.postID DESC LIMIT {$limit}";
			$result=$conn->query($sql);
            if($result->num_rows>0){
				$temp="active";
                while($row=$result->fetch_assoc()){
		?>
		<div class="carousel-item <?php echo $temp ?> text">
			<a href="news.php?id=<?php echo $row["postID"]?>"><img style="href="news.php" src="admin/upload/<?php echo $row["slider"]?>" class="hel -block w-100" alt="doctors"></a>
			<div class="carousel-caption d-none d-md-block">
				<a  href="news.php?id=<?php echo $row["postID"]?>"><h4><?php echo $row["postTitle"]?></h4></a>
				<a href="news.php?id=<?php echo $row["postID"]?>"><p><?php echo substr($row["postDescription"],0,80).'...';?></p></a>
			</div>
		</div>
		<?php $temp="";} }?>



	 </div>
	 <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
		 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		 <span class="sr-only">Previous</span>
	 </a>
	 <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
		 <span class="carousel-control-next-icon" aria-hidden="true"></span>
		 <span class="sr-only">Next</span>
	 </a>
	</div><br>

<!-- </div> -->

<!-- hero slider  -->

<div class="container">

<!--- Welcome Section -->

		<div class="container-fluid padding">
			<div class="row welcome text-center">
				<div class="col-12">
			<br>
					<h2 class="display-5 font">Welcome to Pak Citizen</h2>
					<h5 class="lead">"A Modern News System"</h5>
				</div>
			</div>
		</div>
		<div class="container-fluid padding">
			<div class="row padding">

				<div class="col-lg-6">
					<img class="img-fluid" src="media/GPak.jpg" alt="The Citizen Text image">
				</div>
				<div class="col-lg-6">
					<!-- <br><br><br><br> -->
					<h4 class="font">PAK CITIZEN</h4>
					<br>
					Pak Citizen is News Channel started and devloped by students of Department of Computer Systems Engineering, University of Engineering and Technology Peshawar, Peshawar.<br>
					Pak Citizen is a Modern News System that aims to make news less boring and more entertaining so that young digital generation who is unaware from the matters of Pakistan and World can take advantage and develope interest....

					<br><br><a href="About.php"><button class="btn btn-success btn-color">Learn More</button></a>
				</div>
			</div>
		</div>
		<div>
			<hr class="my-4">
		</div>



<div class="container">

<!--- Categories heading -->

		<div class="container-fluid padding">
			<div class="row welcome text-center">
				<div class="col-12">
			<br><br>
					<h2 class="display-5 font">CATEGORIES</h2>

				</div>
			</div>
		</div>

		<div class="a">
		<?php
			$sql="SELECT * FROM category ORDER BY category.categoryID DESC";
	        $result=$conn->query($sql);
	        if($result->num_rows>0){
	            while($row=$result->fetch_assoc()){
	?>
			<button class="btn-h btn3">
			<a href="category.php?id=<?php echo $row['categoryID'];?>"><b><?php echo $row['categoryName']; ?></b> </a>
		</button>
				<?php } } ?>

				</div>

<!--- Fixed background -->
<figure>
	<div class="fixed-wrap">
		<div id="fixed">
		</div>
	</div>
</figure>



<div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class="col-12">
	<br><br>
			<h2 class="display-5 font">LATEST NEWS</h2>

		</div>
	</div>
</div>


<!--- Cards -->
<div class="card-deck">
<?php
        $limit=9;   //limit the number of posts in recent

		$sql="SELECT * FROM post
		LEFT JOIN category ON post.postcategory=category.categoryID
		LEFT JOIN USER ON post.postAuthor=user.userid
		ORDER BY post.postID DESC LIMIT {$limit}";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
?>
	<div class="col-sm-8 col-md-6 col-lg-4">
 	 <div class="card">
    <img src="admin/upload/<?php echo $row["postimage"]?>" class="card-img-top" alt="Chess" width="854" height="175">
    <div class="card-body">
      	<a class="text" href="news.php?id=<?php echo $row["postID"]?>"><h6 class="card-title card-title"><?php echo substr($row["postTitle"],0,100).'...';?></h6></a>
      	<p class="card-text card-desc"><?php echo substr($row["postDescription"],0,90).'...';?></p>
		<a class="text" href="news.php?id=<?php echo $row["postID"]?>"><button class="btn btn-outline-success">Learn More</button></a>


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

<br> <br>

<!--- Connect -->
<div class="container-fluid padding">
	<div class="row text-center padding">
		<div class="col-12">
			<h3 class="font">Connect</h3>
		</div>

		<div class="col-12 social padding">
			<a href="#"><i id="social-fb" class="fab fa-facebook-square fa-3x social"></i></a>
			<a href="#"><i id="social-tw" class="fab fa-twitter-square fa-3x social"></i></a>
			<a href="#"><i id="social-gp" class="fab fa-google-plus-square fa-3x social"></i></a>
			<a href="#"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
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
