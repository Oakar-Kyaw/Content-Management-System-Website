
 <div class="col-xs-6">

<form action="" method='post'>

 <?php 
                    if(isset($_GET['edit'])){
                        
                        $edit_id=$_GET['edit'];
                        $query_one_category= "SELECT * FROM categories WHERE cat_id = $edit_id ";
                        $result_one_category= mysqli_query($connection,$query_one_category);
                        while ($row=mysqli_fetch_assoc($result_one_category)){
                            $edit_id=$row['cat_id'];
                            $edit_title=$row['cat_title'];
                             } ?>
                    <label for="cat_title">Edit Category</label>
                    <div class="form-group">
                    <input value='<?php echo  $edit_title; ?> ' type="text" class='form-control' name='title' >
                    </div>
                    <input type="hidden" value=<?php echo  $edit_id; ?> name='id'>
                    <div class="form-group">
                    <input type="submit" class='btn btn-primary'  name='edit' value="Edit Category" > 
                    </div>
                </form>
                    </div>
                          


                        <?php } ?>      

                    
                        <?php  
                        //Post will be not in $GET method
                         if(isset($_POST['edit'])){
                             $id=$_POST['id'];
                            $edit_query=$_POST['title'];
                            $edit_one_query= "UPDATE categories SET cat_title ='$edit_query' WHERE cat_id= $id ";
                            $edit_categories_result= mysqli_query($connection,$edit_one_query);
                            if(!$edit_categories_result){
                            echo "Errror";
                                }
                                header("Location: categories.php");
                            
                            }?>



