<?php
session_start();
?>

<?php

    if($_SERVER["REQUEST_METHOD"]=="GET") {
        $blog_id=$_GET["blog_id"];
    }

    require_once("connect-db.php");        
        
        $sql = "DELETE FROM blog WHERE blog_id = :blog_id";         
        $statement = $db->prepare($sql);    
        $statement->bindValue(":blog_id", $blog_id);
    

    
    if($statement->execute()){
        $statement->closeCursor();     
        
    }
?>
 

<script>
    window.location.replace("admin.php");
</script>
