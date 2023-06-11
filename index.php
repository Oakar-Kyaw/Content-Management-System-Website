<?php 
include 'includes/header.php';
include 'includes/navigation.php';
include 'includes/db.php';
    $n=0;
    $n_last=5;
    $pagination_id=0;
if(isset($_GET['pagination_id'])){
    $pagination_id=$_GET['pagination_id'];
    $n_last=5*$pagination_id;
    $n=$n_last-5;
    
   
}
    
?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php 
                
               
                $query_main_posts= "SELECT * FROM post";
                $select_all_from_post= mysqli_query($connection,$query_main_posts);
                
                $post_all_count=mysqli_num_rows($select_all_from_post);
                $total_count=ceil($post_all_count/5);
                $query_limit_posts= "SELECT * FROM post LIMIT $n, $n_last";
                $select_all_from_limit_post= mysqli_query($connection,$query_limit_posts);
                
                while ($row=mysqli_fetch_assoc($select_all_from_limit_post)){
                    
                    $post_id= $row['post_id'];
                    $post_title= $row['post_title'];
                    $post_author= $row['post_author'];
                    $post_image= $row['post_image'];
                    $post_status= $row['post_status'];
                    $post_date= $row['post_date'];
                    $post_content= substr($row['post_content'],0,120) ;
                   
                   

                        
                    
                    
                        
                ?>
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

            
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
            <?php  }
             
                
               
                ?>
               
                <!-- Pager -->
                <ul class="pager">
                    <?php 
                    for($i=1;$i<=$total_count;$i++){
                     if($pagination_id == $i){
                         echo "<li >
                        <a class='link-pagination ' id='pagination-color' href='index.php?pagination_id=$i'>$i</a>
                    </li>";
                     }
                          
                    else {
                         echo "<li >
                        <a class='link-pagination ' href='index.php?pagination_id=$i'>$i</a>
                        </li>";
                    }
                   
                     
                       
                    }
                    
                    
                    ?>
                    
                   
                </ul>

            </div>
            
            <?php include 'includes/sidebar.php';?>
        </div>
        <!-- /.row -->

        <hr>
        
<?php include 'includes/footer.php';
?>
