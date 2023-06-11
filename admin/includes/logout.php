<?php 
ob_start();
session_start();

            $_SESSION['user_id']=null;
            $_SESSION['user_email']=null;
            $_SESSION['user_name']=null;
            $_SESSION['user_first_name']=null;
            $_SESSION['user_last_name']=null;
            $_SESSION['user_role']=null;
            $_SESSION['user_image']=null;
            header("Location: ../../index.php")
?>
