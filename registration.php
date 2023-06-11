<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

 <?php
 global $salt;
 $message='';
 $name_error='';
 $email_error='';
 if(isset($_POST['submit'])){
    global $connection;
    $username='';
    $register_username=$_POST['username'];
    $register_email=$_POST['email'];
    $name_error=$register_username;
    $email_error=$register_email;
    $search_usernameandemail="SELECT * FROM user WHERE user_name= '$register_username' OR user_email= '$register_email' ";
    $usernameandemail_query=mysqli_query($connection,$search_usernameandemail);
    echo mysqli_num_rows($usernameandemail_query);
    if(mysqli_num_rows($usernameandemail_query)==0){
        $username=$register_username; 
        $username=mysqli_real_escape_string($connection,$username);
        $email=mysqli_real_escape_string($connection,$email);
        $password=$_POST['password'];
        $password=mysqli_real_escape_string($connection,$password);
        $password=password_hash($password, PASSWORD_ARGON2I);
    
    if(!empty($username) && !empty($email) && !empty($password) ) {
        $insert="INSERT INTO user (user_name, user_email, user_password ) ";
        $insert.=" VALUES ('$username', '$email', '$password' ) ";
        $insert_result = mysqli_query($connection,$insert);
        $message="Your Account has been created";
    }
    else {
        $message="Fields shouldn't be empty ";
    }
    }
    else {
      $row= mysqli_fetch_assoc($usernameandemail_query);
      $name=$row['user_name'];
      $useremail=$row['user_email'];
      if($register_username===$name && $register_email=== $useremail){
        $message="This name and email is already used";
      }
      else if ($name==$register_username){
        $message="This name is already used";
      }
      else {
        $message="This email is already used";
      }
     
        
    }
   
    
    




 }
 
 ?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
<div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                <?php if(isset($_POST['submit'])){ 
                    if($message =="Your Account has been created"){
                        $color= 'color:green';
                        $namebackgroundColor='';
                        $emailbackgroundColor='';
                    }
                    else if($message=="This name and email is already used") {
                        $color= 'color:red';
                        $namebackgroundColor='background-color:#E7E35F';
                        $emailbackgroundColor='background-color:#E7E35F';
                    }
                    else if($message=="This name is already used") {
                        $color= 'color:red';
                        $namebackgroundColor='background-color:#E7E35F';
                      
                        
                    }
                    else if($message=="This email is already used") {
                        $color= 'color:red';
                        $emailbackgroundColor='background-color:#E7E35F';
                    }
                    else {
                        $color= 'color:red';
                        $namebackgroundColor='';
                        $emailbackgroundColor='';
                    }
                
                
                
                        
                    
                   
                    echo "<h5 class='text-center' style='$color' >$message</h5>";
                } ?>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" value="<?php echo $name_error;?>" style="<?php echo $namebackgroundColor; ?>">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" value="<?php echo $email_error;?>"style="<?php echo $emailbackgroundColor; ?>" >
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
<hr>



<?php include "includes/footer.php";?>
