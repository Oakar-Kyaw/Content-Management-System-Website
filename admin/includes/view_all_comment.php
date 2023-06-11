<?php 

if (isset($_GET['approve'])){
    $id=$_GET['approve'];
    $query="UPDATE comment SET comment_status= 'approved' WHERE comment_id= $id "; 
    $query_result= mysqli_query($connection,$query);
    if(!$query_result){
        die ("Approved Failed ".mysqli_error($connection));
    }

}
if (isset($_GET['unapprove'])){
    $id=$_GET['unapprove'];
    $query="UPDATE comment SET comment_status= 'unapproved' WHERE comment_id= $id "; 
    $query_result= mysqli_query($connection,$query);
    if(!$query_result){
        die ("Approved Failed ".mysqli_error($connection));
    }

}


?>


                <table class='table table-bordered table-hover'>
                     <thead>
                        <tr>
                            <td>Id</td>
                            <td>Commented In Response to</td>
                            <td>Comment Email</td>
                            <td>Comment Author</td>
                            <td>Comment Date</td>
                            <td>Comment Content</td>
                            <td>Comment Status</td>
                        </tr>
                    </thead>
                    
                    <tbody> 
                      <!-- this function will be in function.php file -->

                      <?php 
                      $result=queryComment();
                      
                      while($row=mysqli_fetch_assoc($result)){
                           
                            $id=$row['comment_id'];
                            $comment_email=$row['comment_email'];
                            $comment_author=$row['comment_author'];
                            $comment_status=$row['comment_status'];
                            $comment_content=$row['comment_content'];
                            $comment_post_id=$row['comment_post_id'];
                            $comment_date=$row['comment_date'];
                            echo "<tr>";
                            echo "<td> $id</td>";
                            $query="SELECT * FROM post WHERE post_id =$comment_post_id";
                            $result1=mysqli_query($connection,$query);
                            while($row=mysqli_fetch_assoc($result1))
                            {
                                $post_id=$row['post_id'];
                                $post_title=$row['post_title'];
                                echo "<td><a href='../post.php?post_id=$comment_post_id'>$post_title</a></td>";
                            }
                            echo "<td>$comment_email</td>";
                            echo "<td>$comment_author</td>";
                            echo "<td>$comment_date</td>";
                            echo "<td>$comment_content</td>";
                            echo "<td>$comment_status</td>";
                            echo "<td> <a href=' ./comment.php?source=view&approve=$id'>Approve </a>  </td>";
                            echo "<td> <a href=' ./comment.php?source=view&unapprove=$id'>Unapprove</a> </td>";
                            
                            echo "<td> <a href='./comment.php?source=view&delete_id=$id'>Delete </a></td>";
                            echo "</tr>";
                         }
                         
                       if (isset($_GET['delete_id'])){
                        $id=$_GET['delete_id'];
                        if($_SESSION['user_role']==='admin'){
                            deleteComment($id,$post_id);
                        }
                        
                       }
                       
                       ?>
                    
                    </tbody>
                    </table>
                    <?php
include 'footer.php';
?>