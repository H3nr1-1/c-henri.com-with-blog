<?php
session_start();
if($_SESSION["admin-login"] != "true"){
    header('Location: sign_in.php');
}

?>

<?php

    $message = "";

if($_SERVER["REQUEST_METHOD"]=="POST") {
    $blog_date = $_POST["blog_date"];
    $blog_title = $_POST["blog_title"];
    $blog_content = $_POST["blog_content"];
    $success = true;
    

if($success){
    require_once("connect-db.php");
        
    $sql = "INSERT INTO blog (blog_date, blog_title, blog_content) VALUES (:blog_date, :blog_title, :blog_content)";
        
    $statement = $db->prepare($sql);
    
    $statement->bindValue(":blog_date", $blog_date);
    $statement->bindValue(":blog_title", $blog_title);
    $statement->bindValue(":blog_content", $blog_content);
    }
    
if($statement->execute()) {
    $statement->closeCursor();
    $message = "<h4>The new blog entry is entered.</h4>";
    }else{
    $message = "<h4>Error submitting blog entry.</h4>";
    }
    
}

?>
    
<script>
    window.location.replace("admin.php");
</script>