<?php
include "includes/header.php";


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
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                            
                        </h1>
                        <div class="col-xs-6">
                        <?php 
                        Post()
                        ?>
                    <form action="categories.php" method='post'>
                    <label for="cat_title">Add Categories</label>
                    <div class="form-group">
                        <input type="text" class='form-control' name='post_title' >
                    </div>
                    <div class="form-group">
                        <input type="submit" class='btn btn-primary'  name='submit' value="Add Category" > 
                    </div>
                    </form>
                </div>
                     <div class="col-xs-6">
                        <table class='table table-bordered table-hover'>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Categories</th>
                                </tr>
                            </thead>
                            
                           
                            
                            
                            <?php $categories_result=queryAll();
                             while($row=mysqli_fetch_assoc($categories_result)){
                                $categories_id=$row['cat_id'];
                                $categories_title=$row['cat_title'];
                                ?>
                                <tbody>
                                <tr>
                                    <td><?php echo  $categories_id; ?></td>
                                    <td><?php echo  $categories_title; ?></td>
                                    <td><a href="categories.php?edit=<?php  echo  $categories_id; ?>">Edit</a></td>
                                    <td><a href="categories.php?delete=<?php echo  $categories_id; ?>">Delete</a></td>
                                    
                                </tr>
                            </tbody>
                            <?php }
                            ?>
                        </table>
                        <?php
                        Delete()?>
                     </div>  
                    
 
 
                    <?php include 'includes/update.php' ?>
 
                    </div>
                </div>
                <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   
    <?php
include "includes/footer.php";
    ?>