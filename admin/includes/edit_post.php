
<?php 
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $edit_result=queryToEditPost($id);
    if($row=mysqli_fetch_assoc($edit_result)){
        
        $post_title=$row['post_title'];
        $post_categories_id=$row['post_categories_id'];
        $post_author=$row['post_author'];
        $post_date=$row['post_date'];
        $post_image=$row['post_image'];
        
        $post_title=$row['post_title'];
        $post_status=$row['post_status'];
        $post_content=$row['post_content'];
        $post_tags=$row['post_tags'];
       
        
       

    }
}
if(isset($_POST['update_post'])){
    
    $updateId=$_GET['id'];
    $post_title=$_POST['post_title'];
    $post_categories_id=$_POST['categories'];
    $post_author=$_POST['post_author'];
    $post_date= $_POST['post_date'];
    $post_images=$_FILES['post_image']['name'];
    $temp_image=$_FILES['post_image']['tmp_name'];
    move_uploaded_file($temp_image,"../images/$post_images");
    
    $post_status=$_POST['post_status'];
    $post_content=$_POST['post_content'];
    $post_tags=$_POST['post_tags'];
    editPost($updateId,$post_title, $post_categories_id, $post_author, $post_date, $post_images, $post_status, $post_content, $post_tags );

   echo "<h5>Edited Completely. <a href='./post.php?source=view'>View Post</a></h5>";
}
?>

<form action="" method="post" enctype='multipart/form-data'>
    <div class="form-group">
        <label for="post_title">Post Title</label>
        
        <input type="text" name='post_title' value="<?php echo $post_title ; ?>" class="form-control">
    </div>
    
    <div class="form-group">
        <select name="categories" id="">
        <?php 
         $query="SELECT * FROM categories";
         $categories_result= mysqli_query($connection,$query);
         while($row=mysqli_fetch_assoc($categories_result)){
             $categories_id=$row['cat_id'];
             $categories_title=$row['cat_title'];
             ?>
         
         <option value="<?php echo $categories_id; ?> " ><?php echo $categories_title; ?></option>
            
        <?php } ?>
            
        
        
        </select>
        
    </div>
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" name='post_author'  value="<?php echo $post_author ; ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="post_date">Post Date</label>
        <input type="date" name='post_date'  value="<?php echo $post_date ; ?>" class="form-control">
    </div>
    <label for="post_status">Post Status</label>
    <div class="form-group">
      <select name="post_status" id="">
            <option value="draft">Drafted</option>
            <option value="publish">Published</option>
        </select>
    </div>
    
    <div class="form-group">
        <img width='100px' height='80px' src="../<?php echo $post_image ; ?>" alt="No Photos">
    </div>
    <div class="form-group">
        <input type="file"  value="<?php echo $post_image ; ?>" name='post_image' >
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        
        <textarea rows='10' cols='30' name='post_content'  class="form-control"> <?php echo $post_content ; ?></textarea>
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" name='post_tags'  value="<?php echo $post_tags ; ?>" class="form-control">
    </div>
    <div class="form-group">
        
        <input type="submit" name='update_post' value='Update' class="btn btn-primary">
    </div>

</form>
