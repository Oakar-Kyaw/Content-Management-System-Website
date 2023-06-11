<?php
    include '../../includes/db.php';
    global $connection;
    header('Content-Type: application/json');

   

    $query_user="SELECT * FROM user ";
    $user_result=mysqli_query($connection, $query_user);
    $user_counts=mysqli_num_rows($user_result);

    $post_count_query= "SELECT * FROM post";
    $post_count_result= mysqli_query($connection,$post_count_query);
    $post_counts=mysqli_num_rows($post_count_result);

    $categories_count_query= "SELECT * FROM categories";
    $categories_count_result= mysqli_query($connection,$categories_count_query);
    $categories_counts=mysqli_num_rows($categories_count_result);

    $post_count_query= "SELECT * FROM post ";
    $post_comment_count_result= mysqli_query($connection,$post_count_query);
    $post_comment_counts=0;
    while($row=mysqli_fetch_assoc($post_comment_count_result)){
     $post_comment_counts+=$row['post_comment_count']; }

    $data = array($post_counts,$post_comment_counts,$user_counts,$categories_counts);

    echo json_encode($data);
?>