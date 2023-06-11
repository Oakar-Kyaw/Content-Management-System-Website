<?php 
include "../../includes/db.php";
function categoriesCount(){
    global $connection;
    $categories_count_query= "SELECT * FROM categories";
    $categories_count_result= mysqli_query($connection,$categories_count_query);
    return $categories_count_result;
}
$categories_count_result=categoriesCount();
$categories_counts=mysqli_num_rows($categories_count_result);
?>
<div class='huge'><?php echo $categories_counts; ?></div>
<div>Categories</div>