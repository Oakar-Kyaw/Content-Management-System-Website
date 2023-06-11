<?php 
//CRUD function for categories
function queryAll(){
    global $connection;
//select all from categories table
                            $query="SELECT * FROM categories  ";
                            $categories_result= mysqli_query($connection,$query);
                           return $categories_result; }
function Post(){
    global $connection;
    if(isset($_POST['submit'])){ 
                           
        $cat_name=  $_POST['post_title'];
       
        if($cat_name=="" || empty($cat_name)){
            echo "This field can't be empty ";
        }else{

       
        
        $post="INSERT INTO categories(cat_title) ";
        $post.="VALUES ('$cat_name') ";
        $post_result =mysqli_query($connection,$post);
        if(!$post_result){
            die ("Query Failed".mysqli_error($connection));
        }
       
        }
      }
}


?>

<?php
function  Delete() {
    global $connection;
    if(isset($_GET['delete'])){
        $delete_id=$_GET['delete'];
       
        $delete_query = "DELETE FROM categories WHERE cat_id= $delete_id ";
        $delete_categories= mysqli_query($connection,$delete_query);
        header("Location: categories.php");

        }
}
//End of CRUD function for categories
?>
<?php 

//Start for CRUD function for Post
function queryPostAll(){
    global $connection;
    $query= "SELECT * FROM post  ";
    $query_result= mysqli_query($connection,$query);
    return $query_result;
}

//create Post
function createPost(){
    global $connection;
    if(isset($_POST['create_post'])){
      
        $post_categories_id=$_POST['post_categories_id'];
        $post_title=$_POST['post_title'];
        $post_author=$_POST['post_author'];
        $post_date=date('d-m-y');
        $post_image=$_FILES['post_image']['name'];
        $temp_image=$_FILES['post_image']['tmp_name'];
        $post_status=$_POST['post_status'];
        
        $post_content=$_POST['post_content'];
        $post_tags=$_POST['post_tags'];
        move_uploaded_file($temp_image,"../images/$post_image");
        $createPost="INSERT INTO post 
                    (post_categories_id,
                    post_title,
                    post_author,
                    post_date,
                    post_image,
                    post_content,
                    post_status,
                    post_tags) 
                    VALUES ({$post_categories_id} ,
                    '{$post_title}' ,
                    '{$post_author}' ,
                    '{$post_date}' ,
                    'images/{$post_image}' ,
                    '{$post_content}' ,
                    '{$post_status}' ,
                    '{$post_tags}') " ;
        $post_create_result= mysqli_query($connection,$createPost);
        if(!$post_create_result){
            die("Post Failed ".mysqli_errno($connection));
        }
        echo "<h5>Edited Completely. <a href='./post.php?source=view'>View Post</a></h5>";

    }
}

function deletePost($id){
    global $connection;
    $delete_query="DELETE FROM post WHERE post_id= $id ";
    $delete_result= mysqli_query($connection,$delete_query);
    if(!$delete_result){
        die("Delete failed ".mysqli_errno($connection));
    }
    else {
        header("Location: post.php?source=view");
    }
    
}

function queryToEditPost($id){
    global $connection;
    $edit_query="SELECT * FROM post WHERE post_id=$id";
    $edit_result= mysqli_query($connection,$edit_query);
    if(!$edit_result){
        die("Edit Failed ".mysqli_errno($connection));
    }
    return $edit_result;
}
function editPost($id,$post_title,$post_categories_id, $post_author,$post_date,$post_image, $post_status, $post_content,$post_tags){
    
    global $connection; 
    $update_query="UPDATE post SET ";
    $update_query.="post_title = '{$post_title}', ";
    $update_query.="post_categories_id = {$post_categories_id}, ";
    $update_query.="post_author = '{$post_author}', ";
    $update_query.="post_date = '{$post_date}' , ";
    if(empty($post_image)){
        $query="SELECT * FROM post WHERE post_id= $id ";
        $selected_image=mysqli_query($connection,$query);
        while($row=mysqli_fetch_array($selected_image)){
            $post_image=$row['post_image'];
            $update_query.="post_image = '{$post_image}', ";
        }
    }
    else {
        $update_query.="post_image = 'images/{$post_image}', ";
    }
    
    
    $update_query.="post_status = ' {$post_status} ', post_content = '{$post_content}', post_tags = '{$post_tags}' WHERE post_id= {$id} ";
    $update_result= mysqli_query($connection,$update_query);
    if(!$update_result){
        die("Update Failed ".mysqli_errno($connection));
    }
    else {
        
    }
}
//These functions will be for Comment Section
function queryComment(){
    global $connection;
    $query= "SELECT * from comment";
    $result= mysqli_query($connection,$query);
    return $result;
}

function deleteComment($id,$post_id){
    global $connection;
    echo $post_id;
    $query ="DELETE FROM comment WHERE comment_id= $id ";
    $result=mysqli_query($connection,$query);
    //subtract 1 from post_comment count only if post_comment_count is not 0
    $query_comment_count="SELECT * FROM post WHERE post_id= $post_id ";
    $result_query_comment_count=mysqli_query($connection,$query_comment_count);
    while ($row=mysqli_fetch_assoc( $result_query_comment_count)){
        $post_comment_count= $row['post_comment_count'];
        
        if($post_comment_count !==  0){
            $comment_count="UPDATE post SET post_comment_count = ";
            $comment_count.=" post_comment_count-1 WHERE post_id = $post_id ";
            $result_update=mysqli_query($connection,$comment_count);
        }
    }
    
    if(!$result){
        die("Delete Failed ".mysqli_errno($connection));
    }
    else {
        
        
        header("Location: comment.php?source=view");
    }
}

//These function will be for User Section
function queryUser(){
    global $connection;
    $query_user="SELECT * FROM user ";
    $user_result=mysqli_query($connection, $query_user);
    return $user_result;
}

function deleteUser($id){
    global $connection;
    $delete_user="DELETE FROM user WHERE user_id=$id";
    $delete_user_result=mysqli_query($connection,$delete_user);
    if(!$delete_user){
        die("Delete Failed ".mysqli_error($connection));
    }
    else{
        header("Location: ./user.php?source=view");
    }
}

function addUser(){
    global $connection;
   
    if(isset($_POST['register'])){
       $user_first_name= $_POST['user_first_name'];
       $user_last_name= $_POST['user_last_name'];
       $user_name= $_POST['user_name'];
       $user_email= $_POST['user_email'];
       $user_password= $_POST['user_password'];
       $user_password=password_hash($user_password,PASSWORD_ARGON2I);
       $user_role= $_POST['user_role'];
       $add_user="INSERT INTO user (user_name,user_first_name,user_last_name,user_email,user_password,user_role,user_image ) ";
       $add_user.="VALUES ('{$user_name}','{$user_first_name}','{$user_last_name}','{$user_email}', '{$user_password}', '{$user_role}', 'images' )";
       $add_result=mysqli_query($connection,$add_user);
       if(!$add_result){
        die("ADD Failed".mysqli_error($connection));
       }
       else {
            header("Location: ./user.php?source=view");
       }
    }
}
function queryToEditUser($id){
    global $connection;
    $edit_user_query="SELECT * FROM user WHERE user_id=$id";
    $edit_user_result= mysqli_query($connection,$edit_user_query);
    if(!$edit_user_result){
        die("Edit Failed ".mysqli_errno($connection));
    }
    return $edit_user_result;
}
function editUser($id,$user_first_name,$user_last_name,$user_email,$user_password,$user_name, $user_role){
    
    global $connection; 
    
    $update_query="UPDATE user SET ";
    $update_query.="user_first_name = '{$user_first_name}', ";
    $update_query.="user_last_name = '{$user_last_name}', ";
    $update_query.="user_email = '{$user_email}', ";
    $update_query.="user_password = '{$user_password}', ";
    $update_query.="user_name = '{$user_name}', ";
    $update_query.="user_role = ' {$user_role}' ";
   
    $update_query.="WHERE user_id= {$id} ";
    $update_result= mysqli_query($connection,$update_query);
    if(!$update_result){
        die("Update Failed ".mysqli_errno($connection));
    }
    else {
        header("Location: ./user.php?source=edit&edit_user=$id");
    }
   
}

//This function will be used for update user profile

function editUserProfile($id,$user_first_name,$user_last_name,$user_email,$user_name, $user_role){
    
    global $connection; 
    $update_query="UPDATE user SET ";
    $update_query.="user_first_name = '{$user_first_name}', ";
    $update_query.="user_last_name = '{$user_last_name}', ";
    $update_query.="user_email = '{$user_email}', ";
    $update_query.="user_name = '{$user_name}', ";
    $update_query.="user_role = ' {$user_role}' ";
    $update_query.="WHERE user_id= {$id} ";
    $update_result= mysqli_query($connection,$update_query);
    if(!$update_result){
        die("Update Failed ".mysqli_errno($connection));
    }
    else {
        header("Location: ./profile.php");
    }
   
}



function userOnline(){
    
    if(isset($_GET['useronline'])){
        global $connection;
        if(!$connection){
            session_start();
            $db['server']='localhost';
$db['username']='root';
$db['password']='';
$db['dbname']='cms';





            $sessionId=session_id();
            $time= time();
            $time_out= $time-60;
        $user_online_session_query= "SELECT * FROM user_online WHERE  session= '$sessionId' ";
        $user_online_query=mysqli_query($connection,$user_online_session_query);
        $user_online_count= mysqli_num_rows($user_online_query);
        if($user_online_count==0){
        mysqli_query($connection,"INSERT INTO user_online(session,time) VALUES ('$sessionId','$time')" );
        }
        else {
        mysqli_query($connection,"UPDATE user_online SET time= '$time' WHERE session= '$sessionId'" );
        }
        $actual_user_online= "SELECT * FROM user_online WHERE time > '$time_out' ";
        $actual_user_online_query=mysqli_query($connection,$actual_user_online);
        $actual_user_online_count=mysqli_num_rows($actual_user_online_query);
        return $actual_user_online_count;
        }
        
    }
}
    
    
   
    

?>                         
