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
                if(isset($_GET['author'])){
                    $author= $_GET['author'];
                    $query="SELECT * FROM post WHERE post_author = '$author' ";
                    $result=mysqli_query($connection,$query);
                  
                    while($row=mysqli_fetch_assoc($result)){
                        if($row){  
                        
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
                    by <a href="author_post.php?author=<?php echo $post_author ?>"><?php echo $post_author ;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo  $post_date ; ?></p>
                <hr>
                <a href="post.php?post_id=<?php echo $post_id; ?>"><img class="img-responsive" src="<?php echo $post_image ; ?>" alt=""></a>
                <hr>
                <p><?php echo $post_content ; ?></p>
                <a class="btn btn-primary" href="post.php?post_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                
        
                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>
                <?php     }else  {?>

               <h1 class='text-center'>
                    No Result
                </h1>
                  <?php   }}} ?>
            </div>
            
            <?php include 'includes/sidebar.php';?>
        </div>
        <!-- /.row -->

        <hr>
        
<?php include 'includes/footer.php';
?>
