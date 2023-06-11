<?php
include "../../includes/db.php";
function commentsCount(){
    global $connection;
    $post_count_query= "SELECT * FROM post ";
    $post_comment_count_result= mysqli_query($connection,$post_count_query);return $post_comment_count_result;
    
} 
   $post_comment_count_result=commentsCount();
   
    $post_comment_counts=0;
     while($row=mysqli_fetch_assoc($post_comment_count_result)){
      $post_comment_counts+=$row['post_comment_count']; }
                         
                           ?>
                       <div class='huge'><?php echo  $post_comment_counts; ?></div> 
                      <div>Comments</div>