<?php
include "includes/header.php";
if(isset($_SESSION['user_name'])){
    $user_name=$_SESSION['user_name'];
}
?>

    <div id="wrapper">

    <?php
        include "includes/navigation.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Welcome to Admin
                        <small><?php echo $user_name;?></small></h1>

               <?php
               if (isset($_GET['source'])){
                $source=$_GET['source'];
                switch ($source){
                    case 'view':
                     include 'includes/view_all_comment.php';
                     break;
                     case 'add':
                        include 'includes/add_post.php';
                        break;
                     
                    } } 
                      
                ?>
                </div>
               </div>
                
                <!-- /.row -->
              </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   
<?php include "includes/footer.php";?>