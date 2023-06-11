<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

 <?php
 
 if(isset($_POST['submit'])){
   $to= "alexjensen7090@gmail.com";
   $subject=mysqli_real_escape_string($connection,$_POST['subject']) ;
   $message= mysqli_real_escape_string($connection,$_POST['description']) ;
   $header= "From: " . mysqli_real_escape_string($connection,$_POST['email']) ;
   mail($to,$subject,$message,$header);




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
                <h1>Contact</h1>
                <form role="form" action="contact.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject">
                        </div>
                         <div class="form-group">
                            <label for="description" class="sr-only"></label>
                           <textarea name="description" placeholder="Enter Your Description" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
<hr>



<?php include "includes/footer.php";?>
