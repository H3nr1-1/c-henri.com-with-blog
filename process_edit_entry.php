<?php
session_start();
if($_SESSION["admin-login"] != "true"){
    header('Location: login.php');
}

?>

<?php

    $message = "";

if($_SERVER["REQUEST_METHOD"]=="POST") {
    $blog_date = $_POST["blog_date"];
    $blog_title = $_POST["blog_title"];
    $blog_content = $_POST["blog_content"];
    $blog_id = $_POST["blog_id"];
    $success = true;
    

if($success){
    require_once("connect-db.php");
        
    $sql = "UPDATE blog SET blog_date = :blog_date, blog_title = :blog_title, blog_content = :blog_content WHERE blog_id = :blog_id";
        
    $statement = $db->prepare($sql);
    
    $statement->bindValue(":blog_date", $blog_date);
    $statement->bindValue(":blog_title", $blog_title);
    $statement->bindValue(":blog_content", $blog_content);
    $statement->bindValue(":blog_id", $blog_id);
    }
    
if($statement->execute()) {
    $statement->closeCursor();
    $message = "<h4>The blog update has been submitted.</h4>";
    }else{
    $message = "<h4>Error submitting blog update.</h4>";
    }
    
}

?>
    
<script>
    window.location.replace("admin.php");
</script>
        
    