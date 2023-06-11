<?php 
include 'includes/header.php';
include 'includes/navigation.php';
include 'includes/db.php';

 


?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php 
                if(isset($_GET['cat_id'])){
                    $id=$_GET['cat_id'];
                    $query="SELECT * FROM post WHERE post_categories_id = $id ";
                    
                    $result=mysqli_query($connection,$query);
                    $cat_count=mysqli_num_rows($result);
                    if($cat_count<1)  {?>

                        <h3 class='text-center'>
                            No Post Avaliable
                        </h3>
                  <?php   }
                  else {
                    while($row=mysqli_fetch_assoc($result)){
                     
                        
                        $post_id= $row['post_id'];
                        $post_title= $row['post_title'];
                        $post_author= $row['post_author'];
                        $post_image= $row['post_image'];
                        $post_date= $row['post_date'];
                        $post_content= substr($row['post_content'],0,120) ;
                    

                
                
                ?>
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?post_id=<?php echo $post_id; ?>"><?php echo $post_title ; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo  $post_date ; ?></p>
                <hr>
                <a href="post.php?post_id=<?php echo $post_id; ?>"><img class="img-responsive" src="<?php echo $post_image ; ?>" alt=""></a>
                <hr>
                <p><?php echo $post_content ; ?></p>
                <a class="btn btn-primary" href="post.php?post_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                
        
                
                <?php     }}} ?>
            </div>
            
            <?php include 'includes/sidebar.php';?>
        </div>
        <!-- /.row -->

        <hr>
        
<?php include 'includes/footer.php';
?>
