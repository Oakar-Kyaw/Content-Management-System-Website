<?php 
include 'db.php';
ob_start();
session_start();
if(isset($_POST['login'])){
    $user_login_email=$_POST['user_email'];
    $user_login_email=mysqli_real_escape_string($connection,$user_login_email);
    $user_login_password=$_POST['user_password'];
    $user_login_password=mysqli_real_escape_string($connection,$user_login_password);
    
    $query_user= "SELECT * FROM user WHERE user_email= '$user_login_email' ";
    $query_user_result= mysqli_query($connection,$query_user);
    if(mysqli_num_rows($query_user_result)==0){
        header("Location: ../index.php?source=nouser");

    }
    else {
        while ($row=mysqli_fetch_assoc($query_user_result)){
            $id=$row['user_id'];
            $user_email=$row['user_email'];
            $user_name=$row['user_name'];
            $user_first_name=$row['user_first_name'];
            $user_last_name=$row['user_last_name'];
            $user_role=$row['user_role'];
            $user_password=$row['user_password'];
        
            $user_image=$row['user_image'];
            
        if($user_login_email===$user_email && password_verify($user_login_password,$user_password)){
            $_SESSION['user_id']=$id;
            $_SESSION['user_email']=$user_email;
            $_SESSION['user_name']=$user_name;
            $_SESSION['user_first_name']=$user_first_name;
            $_SESSION['user_last_name']=$user_last_name;
            $_SESSION['user_role']=$user_role;
            $_SESSION['user_image']=$user_image;
            if($_SESSION['user_role']==='admin'){
              header("Location: ../admin/index.php");  
            }
            else {
                header("Location: ../index.php"); 
            }
            
        }
        else {

            header("Location: ../index.php?source=wrongpassword");
        }
      
        
        }
    }
    
        
    
}

?>