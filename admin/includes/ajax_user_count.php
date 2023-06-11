<?php 
include "../../includes/db.php";
function queryUser(){
    global $connection;
    $query_user="SELECT * FROM user ";
    $user_result=mysqli_query($connection, $query_user);
    return $user_result;
}
$user_count_query=queryUser();
$user_counts=mysqli_num_rows($user_count_query);?>
<div class='huge'><?php echo $user_counts ?></div>
<div>Users</div> 
