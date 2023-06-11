 
                <table class='table table-bordered table-hover'>
                     <thead>
                        <tr>
                            <td>Id</td>
                            <td>Categories</td>
                            <td>Post Title</td>
                            <td>Post Author</td>
                            <td>Post Date</td>
                            <td>Post Content</td>
                            <td>Comment</td>
                            <td>Post Tag</td>
                            <td>Post Image</td>
                            <td>Post Status</td>
                            <td>View</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php 
                        $query_post_result=queryPostAll();
                        while($row=mysqli_fetch_assoc($query_post_result)){
                            $post_id=$row['post_id'];
                            $post_categories_id=$row['post_categories_id'];
                            $post_title=$row['post_title'];
                            $post_author=$row['post_author'];
                            $post_status=$row['post_status'];
                            $post_date=$row['post_date'];
                            $post_image=$row['post_image'];
                            $post_content=$row['post_content'];
                            $post_tags=$row['post_tags'];
                            $post_comment_count=$row['post_comment_count'];
                            $post_view_count= $row['post_view_count'];
                            $query="SELECT * FROM categories WHERE cat_id= $post_categories_id";
                            $categories_result= mysqli_query($connection,$query);
                            while($row=mysqli_fetch_assoc($categories_result)){
                                
                                $categories_title=$row['cat_title'];
                            }?>
                        
                            <tr><td><?php echo $post_id ?></td>
                            <td><?php echo $categories_title ?></td>
                            <td><?php echo $post_title ?></td>
                            <td><?php echo $post_author ?></td>
                            <td><?php echo $post_date ?></td>
                            <td><?php echo $post_content ?></td>
                            <td><a href='../post.php?post_id=$post_id'><?php echo $post_comment_count ?></a></td>
                            <td><?php echo $post_tags ?></td>
                            <td> <img width='120px' height='80px' src='../<?php echo $post_image?>' /></td>
                            <td><?php echo $post_status ?></td>
                            <td><a href='includes/reset_view.php?id=<?php echo $post_id ?>'><?php echo $post_view_count ?></a></td>
                            <td> <a href='./post.php?source=edit&id=<?php echo $post_id ?>' >Edit </a></td>
                            <td> <a href='./post.php?source=view&id=<?php echo $post_id ?>'>Delete </a></td>
                           </tr>
                       
                   <?php }
                    
                        if(isset($_GET['id'])){
                           
                                if($_SESSION['user_role']==='admin'){
                                    deletePost($_GET['id']);
                                }
                                
                            }
                       
                           
                          ?>   
                        
                        
                    </tbody>
                    </table>
                    <?php
include 'footer.php';
?>