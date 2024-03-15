<?php
session_start();
if($_SESSION["admin-login"] != "true"){
    header('Location: login.php');
}
?>

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
		<meta property="og:title" content="Admin - © Chris Henrickson Web Designer">
		<meta property="og:url" content="https://www.c-henri.com/admin">
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

		<div class="container">

			<?php include("header.html");?>

			<section>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h2>Submit New Blog Entry</h2>
                        <form action="blog_entry.php" method="POST">
                        <input type="text" class="form-control" name="blog_date" required placeholder="Today's Date (YYYY/MM/DD Format)"><br>
                        <input type="text" class="form-control" name="blog_title" required placeholder="Title for Today's Blog Entry"><br>
                        <textarea id="message" class="form-control" name="blog_content" rows="5" required placeholder="Blog Content"></textarea>
                        <br>
                        <button type="submit" class="btn btn-primary" id="entry">Submit</button>
                        </form>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </section>

			<section>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">

						<?php                                              
                            foreach($blog as $b){
                        ?>
					<div class="blog_content">
					<div class="blog">

						<?php echo $b["blog_date"];?><br>
						<h3><?php echo $b["blog_title"];?></h3><br>
						<?php echo $b["blog_content"];?><br><br>

                        <form action="edit_entry.php" method="GET">
                        <input type="hidden" name="blog_id" value="<?php echo $b["blog_id"];?>">
                        <button type="submit" class="btn btn-outline-primary form-control" id="entry">Edit Blog Entry</button>
                        </form>
                        <br>
                        <form action="delete.php" method="GET">
                        <input type="hidden" name="blog_id" value="<?php echo $b["blog_id"];?>">
                        <button onclick="return confirm('Are you sure you want to delete this blog entry')" type="submit" class="btn btn-outline-danger form-control" id="entry">Delete Entry</button>
                        </form>

					</div>
					</div><br><br>					

						<?php 
							}
						?>

					</div>
					<div class="col-md-2"></div>
				</div>
			</section>

            <div class="row">
                <div class="col-md-7"></div>
                <div class="col-md-1">
                    <form action="logout.php" method="POST">
                    <button type="submit" class="btn btn-danger">Sign Out</button>
                    </form>
                </div>
                <div class="col-md-4">
            </div>
            <br>
            <br>

			<?php include("footer.html");?>

		</div>
	</body>
</html>