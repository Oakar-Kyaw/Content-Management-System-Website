<?php
include 'includes/header.php';
include 'includes/navigation.php';


?>
 <!-- Page Content -->
 <div class="container">

<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">
       
        <h1 class="page-header">
            Page Heading
            <small>Secondary Text</small>
        </h1>
        <?php
 if(isset($_POST['submit'])){
  
    $search_word=$_POST['search'];

    $query= "SELECT * FROM post WHERE post_tags LIKE '%$search_word%' ";
    $search_query_result= mysqli_query($connection,$query);$rowcount=mysqli_num_rows($search_query_result);
    
      
     
        if($rowcount==0){
            echo '<h2>No Result</h2>';
        }
        else {
            while ($row=mysqli_fetch_assoc($search_query_result)){
           
            $post_title=$row['post_title'];
            $post_author= $row['post_author'];
            $post_image= $row['post_image'];
            $post_date= $row['post_date'];
            $post_content= $row['post_content'];
            
        ?>
        <!-- First Blog Post -->
        <h2>
            <a href="#"><?php echo $post_title ; ?></a>
        </h2>
        <p class="lead">
            by <a href="index.php"><?php echo $post_author ;?></a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span><?php echo  $post_date ; ?></p>
        <hr>
        <img class="img-responsive" src="<?php echo $post_image ; ?>" alt="">
        <hr>
        <p><?php echo $post_content ; ?></p>
        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>
    <?php  }
        }
        }
        ?>
                </div>
            
            <?php include 'includes/sidebar.php';?>
        </div>
        <!-- /.row -->

        <hr>

        
<?php include 'includes/footer.php';
?>
