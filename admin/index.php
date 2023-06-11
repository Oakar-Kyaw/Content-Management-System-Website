<?php
include "includes/header.php";
include "../vendor/autoload.php";
if(isset($_SESSION['user_name'])){
    $user_name=$_SESSION['user_name'];
    
}

  $options = array(
    'cluster' => 'ap4',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    '09edccdb6eb9142a05b2',
    'a056b36226470bd015f9',
    '1531811',
    $options
  );

  $data['message'] = 'New Content Is Updated';
  $pusher->trigger('my-channel', 'my-event', $data);


?>


<div id="wrapper">

<?php
include "includes/navigation.php";
    ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" id='welcome'>
                            Welcome to Admin
                            <small><?php echo $user_name;?></small>
                           
                            
                        </h1>
                       
                          <!-- /.row -->
                
        <div class="row">
            <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    
                    <div class="col-xs-9 text-right post-count">
                        <?php
                    $post_count_result=queryPostAll();
                    $post_counts=mysqli_num_rows($post_count_result);
                     ?>
                    <div class='huge'><?php echo $post_counts; ?></div>
                    <div>Posts</div> 
                    </div>
                </div>
            </div>
            <a href="post.php?source=view">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>

                    </div>
                    <div class="col-xs-9 text-right comment-count">
                     <?php
                       $post_comment_count_result=queryPostAll();
   
                       $post_comment_counts=0;
                       while($row=mysqli_fetch_assoc($post_comment_count_result)){
                        
                        $post_comment_counts+=$row['post_comment_count'];
                         
                          } ?>
                       <div class='huge'><?php echo  $post_comment_counts; ?></div> 
                      <div>Comments</div>
                   
                    </div>
                </div>
            </div>
            <a href="comment.php?source=view">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right user-count totaluser">
                    <?php
                    $user_count_query=queryUser();
                    $user_counts=mysqli_num_rows($user_count_query);?>
                    <div class='huge'><?php echo $user_counts ?></div>
                    <div>Users</div>
                    </div>
                </div>
            </div>
            <a href="user.php?source=view">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right categories-count">
                    <?php
                    $categories_count_result=queryAll();
                    $categories_counts=mysqli_num_rows($categories_count_result);
                     ?>
                    <div class='huge'><?php echo $categories_counts; ?></div>
                     <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php?source=view">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
 </div>
                <!-- /.row -->
                    </div>
                </div>
                <!-- /.row -->
                <div>
              <canvas id="myChart"></canvas>
              
             </div>
            </div>
            <!-- /.container-fluid -->

        <!-- /#page-wrapper -->
 
        </div>
      
   
    

</div>
    <!-- /#wrapper -->  
    
 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
          $.ajax({
            type:"GET",
            url:'includes/data.php',
            success:function (data){
                
                const ctx = document.getElementById('myChart');
         return  new Chart(ctx, {
         type: 'bar',
         data: {
         labels: ['Post', 'Comment', 'User', 'Categories'],
         datasets: [{
         label: 'Total Count',
         data: data,
         borderWidth: 1
        }]
         },
        options: {
        scales: {
        y: {
           beginAtZero: true
           }
         }
         }
         });
            }
          })
      
         
</script>
<script src='js/script.js'>
</script>
 
<?php
include "includes/footer.php";
    ?>