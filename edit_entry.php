<?php
session_start();
if($_SESSION["admin-login"] != "true"){
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<?php 

$message="";

if($_SERVER["REQUEST_METHOD"] == "GET") {
     $blog_id=$_GET["blog_id"];    
 }    
 
 require_once("connect-db.php");

 $sql = "SELECT * FROM blog WHERE blog_id = :blog_id";
     
 $statement = $db->prepare($sql);     
 $statement->bindValue(":blog_id", $blog_id); 
 
 if($statement->execute()) {
     $blog = $statement->fetchAll();
     $statement->closeCursor();
     $message = "<h3>blog successfully retreived.</h3>";
     
 } else {
     $message = "<h3>ERROR retreiving blog data.</h3>";
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
		<meta property="og:title" content="Edit_entry - © Chris Henrickson Web Designer">
		<meta property="og:url" content="https://www.c-henri.com/edit_entry">
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

            <article>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                            <?php
                                foreach($blog as $b) {
                            ?>
                    <div class="intro">
                            <h2>Update Blog Entry</h2>
                        
                            <form action="process_edit_entry.php" method="POST">
                                <input type="hidden" name="blog_id" value="<?php echo $b["blog_id"];?>">
                                <input type="text" class="form-control" name="blog_date" value="<?php echo $b["blog_date"];?>"><br>
                                <input type="text" class="form-control" name="blog_title" value="<?php echo $b["blog_title"];?>"><br>
                                <textarea id="message" class="form-control" name="blog_content" rows="5"><?php echo $b["blog_content"];?></textarea>                  
                                <button type="submit" class="btn btn-primary" id="entry">Submit</button>
                            </form>
                    </div>

                            <?php } ?>  
                                            
                    </div>
                    <div class="col-md-2"></div>
                </div>            
            </article>


			<?php include("footer.html");?>

		</div>
	</body>
</html>