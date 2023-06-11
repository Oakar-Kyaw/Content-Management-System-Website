 
<?php
include 'db.php';



?>
 
 
 <!-- Blog Sidebar Widgets Column -->
 
 
 <div class="col-md-4">

<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action='search.php' method='post'>
    <div class="input-group">
       
        <input type="text" name='search' class="form-control">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit"  name='submit' >
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span> 
       
        
    </div>
 </form>
    <!-- /.input-group -->
</div>


<!-- Blog Categories Well -->
<div class="well"> 
   
    <h4>Blog Categories</h4>
   
        <div class="row">
        <?php 
        $query= "SELECT * FROM categories";
        $select_all_from_categories= mysqli_query($connection,$query);
        while ($row=mysqli_fetch_assoc($select_all_from_categories)){  
            $categories_id=$row['cat_id'];
            $categories= $row['cat_title'];
            ?>
        <div class="col-lg-12">
            <ul class="list-unstyled">
                <li><a href="./categories.php?cat_id=<?php echo $categories_id;?>"><?php echo $categories; ?></a>
                </li>
                
            </ul>
           
        </div>
        <?php }?>
        
    </div> 
    
    <!-- /.row -->
    
</div>
<div class="well">
    <?php if(!empty($_SESSION['user_name'])){
      echo " <a class='btn btn-primary' href='./admin/includes/logout.php' >Log Out</a>";
    }
    else {
     ?>   
   
    <h4>Login</h4>
    <form action="./includes/login.php" method='post'>
        <div class="form-group">

         
                
            <input type="email" class='form-control' placeholder="Enter a Vailid Email Address" name='user_email'>
            </div>
            <div class="input-group">
               <input type="password" class='form-control'  placeholder="Enter Password" name='user_password'>
                <span class='input-group-btn'>
                <button type="submit" name='login' class="btn btn-primary">Log In</button>
                </span>
            </div>
            <?php 
            if(isset($_GET['source'])){
                 $user= $_GET['source'];
                 if($user==='nouser'){
                   echo  "<h6 class='text-center' style='color:red;' >Error.There is no such username.</h6>";
                 }
                 else if ($user==="wrongpassword"){
                    echo  "<h6 class='text-center' style='color:red;' >Your password is wrong.</h6>";
                 }
            }
            ?>
         </form>
         <?php } ?>
</div>
  
<!-- Side Widget Well -->
<?php include 'widget.php' ?>

</div>