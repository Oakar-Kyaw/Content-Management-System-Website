<?php 

if (isset($_GET['admin'])){
    $id=$_GET['admin'];
    $query="UPDATE user SET user_role= 'admin' WHERE user_id= $id "; 
    $query_result= mysqli_query($connection,$query);
    if(!$query_result){
        die ("Approved Failed ".mysqli_error($connection));
    }
    else {
        header("Location: user.php?source=view");
    }

}
if (isset($_GET['subscriber'])){
    $id=$_GET['subscriber'];
    $query="UPDATE user SET user_role = 'subscriber' WHERE user_id= $id "; 
    $query_result= mysqli_query($connection,$query);
    if(!$query_result){
        die ("Approved Failed ".mysqli_error($connection));
    }
    else {
        header("Location: user.php?source=view");
    }

}


?>


                <table class='table table-bordered table-hover'>
                     <thead>
                        <tr>
                            <td>Id</td>
                            <td>Name</td>
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Role</td>
                            <td>Email</td>
                            <td>Image</td>
                        </tr>
                    </thead>
                    
                    <tbody> 
                      <!-- this function will be in function.php file -->

                      <?php 
                      $user_result=queryUser();
                      
                      while($row=mysqli_fetch_assoc($user_result)){
                           
                            $id=$row['user_id'];
                            $user_email=$row['user_email'];
                            $user_name=$row['user_name'];
                            $user_first_name=$row['user_first_name'];
                            $user_last_name=$row['user_last_name'];
                            $user_role=$row['user_role'];
                            $user_image=$row['user_image'];
                            echo "<tr>";
                            echo "<td> $id</td>";
                            echo "<td>$user_name</td>";
                            echo "<td>$user_first_name</td>"; 
                            echo "<td>$user_last_name</td>";
                            echo "<td>$user_role</td>";
                            echo "<td>$user_email</td>";
                            echo "<td>$user_image</td>";
                            echo "<td> <a href=' ./user.php?source=view&admin=$id'>Admin</a>  </td>";
                            echo "<td> <a href=' ./user.php?source=view&subscriber=$id'>Subscriber</a> </td>";
                            echo "<td> <a href='./user.php?source=edit&edit_user=$id'>Edit</a> </td>";
                            
                            echo "<td> <a href='./user.php?source=view&delete_id=$id'>Delete </a></td>";
                            echo "</tr>";
                         }
                         
                       if (isset($_GET['delete_id'])){
                        $id=$_GET['delete_id'];
                        echo $_SESSION['user_role'];
                        if($_SESSION['user_role']==='admin'){
                            deleteUser($id);
                        }
                        
                        
                       }
                       
                       ?>
                    
                    </tbody>
                    </table>
              