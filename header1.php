<?php
	include "config.php";
	include "config.php";
	$sql="SELECT * FROM settings";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
	$page_name=basename($_SERVER['PHP_SELF']);
	switch($page_name){
		case "news.php";
			if(isset($_GET['id'])){
				$sql_title="SELECT * FROM post WHERE postID={$_GET['id']}";
				$result=$conn->query($sql_title);
				$row=$result->fetch_assoc();
				$page_title=$row['postTitle'];
					}
				else{
					$page_title="	No post Found";
				}
			break;
		case "category.php";
			/*if(isset($_GET['id'])){
				$sql_title="SELECT * FROM post WHERE postID={$_GET['id']}";
				$result=$conn->query($sql_title);
				$row=$result->fetch_assoc();
				$page_title=$row['postTitle'];
			}
			else{
					$page_title="	No post Found";
			}*/
			break;
		/*case "author.php";
			echo "news.php";
		break;*/
		case "search.php";
			if(isset($_GET['search'])){
				$page_title=$_GET['search'];
			}
			else{
				$page_title= "No Search Result Found";
			}
			break;
		default:
			$page_title=$row["websiteName"];
		break;
	}}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<!-- <link href="style.css" rel="stylesheet"> -->
    <link href="style1.css" rel="stylesheet">
	<link rel="stylesheet" href="Hovereffect.css">
	<link rel="html" href="news.html">
</head>
<body>

	<!-- Navigation -->

	<nav class="navbar navbar-expand-lg navbar-light bg-light nav-font">
	<!-- <nav class="navbar navbar-custom"> -->
	<a class="navbar-brand font" href="index.php">Pak Citizen</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav fancy-nav">
			<a class="nav-item nav-link active " href="index.php"><b>Home</b><span class="sr-only">(current)</span></a>
			<a class="nav-item nav-link active" href="#"><b>Trending</b> </a>
			<a class="nav-item nav-link active" href="#"> <b>Sports</b></a>
			<a class="nav-item nav-link active" href="#"> <b>Global</b> </a>
			<a class="nav-item nav-link active" href="#"> <b>Entertainment</b></a>
			<a class="nav-item nav-link active" href="Contact.php"><b>Contact</b></a>
			<a class="nav-item nav-link active" href="About.php"><b>About</b></a>
		</div>
	</div>
	</nav>

	<!-- Navigation end -->
