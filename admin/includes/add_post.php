<?php 
 createPost();
 

?>
<form id='fupForm' action="" method="post" enctype='multipart/form-data'>
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" name='post_title' class="form-control">
    </div>
    <div class="form-group">
    <select name="post_categories_id" id="">
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
        <input type="text" name='post_author' class="form-control">
    </div>
    <div class="form-group">
        <label for="post_date">Post Date</label>
        <input type="date" name='post_date' class="form-control">
    </div>
    <label for="post_status">Post Status</label>
    <div class="form-group">
      <select name="post_status" id="">
            <option value="drafted">Drafted</option>
            <option value="published">Published</option>
        </select>
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name='post_image' >
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea rows='10' cols='30' name='post_content'  class="form-control"> </textarea>
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" name='post_tags' class="form-control">
    </div>
    <div class="form-group">
        
        <input type="submit" name='create_post' value='Publish' class="btn btn-primary publish-post">
    </div>

</form>
<input type="button" name='' value='click' class="btn btn-primary click-post">
<!-- jQuery -->
<script src="./js/jquery.js"></script>
 <script type='text/javascript' src='./js/script.js'></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<?php
include 'footer.php';
?>