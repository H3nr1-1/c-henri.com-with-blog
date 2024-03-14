<!DOCTYPE html>
<html lang="en">

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
		<meta property="og:title" content="Sign_in - © Chris Henrickson Web Designer">
		<meta property="og:url" content="https://www.c-henri.com/sign_in">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap CDN links -->
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
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

		<div class="container">

			<?php include("header.html");?>

    <main>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 login login_content">
            <h2>Login:</h2><br>
            <form action="process_sign_in.php" method="POST">
            <input type="text" name="username" required placeholder="Username"><br><br>
            <input type="password" name="password" required placeholder="Password"><br><br>
            <button type="submit" class="btn btn-outline-danger">Sign In</button>
            </form><br><br>
            </div>
            <div class="col-md-4"></div>
        </div>
    </main>

			<?php include("footer.html");?>

		</div>
	</body>
</html>