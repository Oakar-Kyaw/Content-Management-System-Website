<?php 
include 'includes/header.php';
include 'includes/navigation.php';
include 'includes/db.php';

if(isset($_GET['post_id'])){
    $id=$_GET['post_id'];
    $update_post_view="UPDATE post SET post_view_count= post_view_count+1 WHERE post_id=$id ";
    $update_result=mysqli_query($connection,$update_post_view);
    $query="SELECT * FROM post WHERE post_id = $id ";
    $result=mysqli_query($connection,$query);
    if($row=mysqli_fetch_assoc($result)){
        $post_id= $row['post_id'];
        $post_title= $row['post_title'];
        $post_author= $row['post_author'];
        $post_image= $row['post_image'];
        $post_date= $row['post_date'];
        $post_content= $row['post_content'];
        $post_view_count= $row['post_view_count'];
    }
}
if(isset($_POST['create_comment'])){
    $id=$_GET['post_id'];
    $comment_email=$_POST['comment_email'];
    $comment_author=$_POST['comment_author'];
    
    $comment_content=$_POST['comment_content'];
    $query= "INSERT INTO comment (comment_post_id,comment_email,comment_author,comment_content,comment_status,comment_date) VALUES ({$id},'{$comment_email}','{$comment_author}','{$comment_content}','pending', now()) ";
    $result=mysqli_query($connection,$query);
    if(!$result){
        die("Create Failed ">mysqli_errno($connection));
    }
    //This is for post comment count
    $query_comment_count="UPDATE post SET post_comment_count = ";
    $query_comment_count.=" post_comment_count+1 WHERE post_id = $id ";
    $result_update=mysqli_query($connection,$query_comment_count);
    
    

}



?>



    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $post_title; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $post_author; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="<?php echo $post_image; ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $post_content; ?></p>

                <hr>

                <h4 class="text-center"><i class="fa-regular fa-heart"><a href="#" style="text-decoration:none; margin:10px; ">Love</a></i></h4>
                <h4 class="text-center">View : </h4>
                

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method='post'>
                    <div class="form-group">
                        <label for="comment_author">Your Name</label>
                          <input type="text" name="comment_author" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="comment_email">Your Email</label>
                          <input type="email" name="comment_email" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="comment_content">Your Comment</label>
                            <textarea class="form-control" name="comment_content" rows="3"></textarea>
                        </div>
                        <button type="submit" name='create_comment' class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>
                <?php 
                $the_post_id =$_GET['post_id'];
                $query="SELECT * FROM comment WHERE comment_status= 'approved' AND comment_post_id= $the_post_id ORDER BY comment_id DESC ";
                $query_result= mysqli_query($connection,$query);
                while($row=mysqli_fetch_assoc($query_result)){
                    $comment_post_id=$row['comment_post_id'];
                    
                    $comment_author=$row['comment_author'];
                    $comment_date=$row['comment_date'];
                    $comment_content=$row['comment_content'];
                   

                    
                    ?>
               
                
                
               <!-- Blog Comments -->
               <div class="media">
                <a href="" class='pull-left'><img width='50px' height='50px' class='media-object' src="images/106394-pic-1.jpg" alt=""></a>
               <div class="media-body">
                <h4 class="media-heading"><?php echo $comment_author;?>  <small><?php echo $comment_date;?></small> </h4>
                <?php echo $comment_content;?>
               </div>
               </div> 
            <hr>   
            <?php }?>
            </div>

           <?php include 'includes/sidebar.php';?>
           

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
