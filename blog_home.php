<!DOCTYPE html>
<html lang="en">

<?php 

    $message = "";
    require_once("connect-db.php");
    
    $sql = "SELECT * FROM blog ORDER BY blog_date desc";
    
    $statement = $db->prepare($sql);
    
    if($statement->execute()){
		$blog = $statement->fetchAll();
        $statement->closeCursor();
        $message = "<h3>Blog was successfully retrieved.</h3>";
    }else{
        $message = "<h3>Error retrieving blog.</h3>";
    }
?>   


	<head>	
		<meta charset="UTF-8">
		<!-- Important Meta data -->
		<meta http-equiv="Content-Language" content="en">
		<meta name="description" content="A blog to my journey as a Front-end Web Developer">
		<meta name="keywords" content="Website Developement, Website Design, Manitowoc, Wisconsin, Web Developement, Blog">
		<meta name="geo.placename" content="Manitowoc, Wisconsin, USA">
		<meta name="robots" content="index, follow">
		<meta property="og:site_name" content="© Chris Henrickson Web Designer">
		<meta property="og:type" content="website">
		<meta property="og:title" content="Home - © Chris Henrickson Web Designer">
		<meta property="og:url" content="https://www.c-henri.com/index">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap CDN links -->
		<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script> -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="stylesheet_blog.css" type="text/css">
		<!-- Logo and page title -->
		<link rel="icon" href="my-logo.png" type="image/x-icon">
		<title>Henri's Blog</title>
	</head>
	
	<body>

    <video id="video-background" autoplay muted loop>
        <source src="campfire.mp4" type="video/mp4">
    </video>


			<?php include("header.html");?>

			<article>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6 intro">
					<h3>Welcome to my Blog</h3>
						<p>Hello and Welcome!!  My name is Chris Henrickson and I am currently attending Northeast Wisconsin Technical College studying to obtain an associate degree in Web Development.  In 2022-2023 I attended Lakeshore Technical College and completed a technical diploma as a Web Development Specialist.  My future plan is to become a Front-end developer or web designer.  I am creating this blog as a project to showcase some of my skills using, HTML5, CSS, Bootstrap5, PHP, and JavaScript.<br><br>Thank you for taking the time to check out my website!!</p>
					</div>
					<div class="col-md-3"></div>
				</div>
			</article>

			<section>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">

						<?php                                              
                            foreach($blog as $b){
                        ?>
					<div class="blog_content rounded">
					<div class="blog">

						<?php echo $b["blog_date"];?><br>
						<h3><?php echo $b["blog_title"];?></h3><br>
						<?php echo $b["blog_content"];?><br>
					</div>
					</div><br><br>					

						<?php 
							}
						?>
					</div>
					<div class="col-md-2"></div>
				</div>
			</section>

			<?php include("footer.html");?>

	</body>
</html>