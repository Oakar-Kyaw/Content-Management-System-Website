<?php 
include "../../includes/db.php";
function postCount(){
    global $connection;
    $post_count_query= "SELECT * FROM post";
    $post_count_result= mysqli_query($connection,$post_count_query);
    return $post_count_result;
}
$post_count_result=postCount();
$post_counts=mysqli_num_rows($post_count_result);
?>
<div class='huge'><?php echo $post_counts; ?></div>
<div>Posts</div> 
