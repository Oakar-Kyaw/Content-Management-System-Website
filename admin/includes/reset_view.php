<?php 
 ob_start();
 include '../../includes/db.php';
 if (isset($_GET['id'])){
    $id=$_GET['id'];
    $update_post_view="UPDATE post SET post_view_count= 0 WHERE post_id=$id ";
    $update_result=mysqli_query($connection,$update_post_view);
    header("Location: ../post.php?source=view");
}



?>