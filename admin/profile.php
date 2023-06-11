<?php
include "includes/header.php";


if (isset($_SESSION['user_name'])){
    $user_id=$_SESSION['user_id'];
    $user_name=$_SESSION['user_name'];
    
    $user_query="SELECT * FROM user WHERE user_id= '$user_id' ";
    $user_query_result=mysqli_query($connection,$user_query); 
    
    while ($row=mysqli_fetch_assoc($user_query_result)){
       
        
        $id=$row['user_id'];
        $user_email=$row['user_email'];
        $user_name=$row['user_name'];
        $user_first_name=$row['user_first_name'];
        $user_last_name=$row['user_last_name'];
        $user_role=$row['user_role'];
    


?>
<div id="wrapper">
<?php include "includes/navigation.php";?>
    
<div id="page-wrapper">

<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
    <h1 class="page-header">Welcome to Admin
    <small><?php echo $user_name; ?></small></h1>
<form action="" method="post" enctype='multipart/form-data'>
    <div class="form-group">
        <label for="user_first_name">First Name</label>
        <input type="text" name='user_first_name' value='<?php echo $user_first_name; ?>' class="form-control">
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" name='user_last_name' value='<?php echo $user_last_name; ?>' class="form-control">
    </div>
    <div class="form-group">
    <select name="user_role" value="<?php echo $user_role; ?>" >
        <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
        
        
        </select>
    </div>
    <div class="form-group">
        <label for="user_name">User Name</label>
        <input type="text" name='user_name' value='<?php echo $user_name; ?>' class="form-control">
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="text" name='user_email' value='<?php echo $user_email; ?>' class='form-control' >
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type='text' name='user_password'  class="form-control"> 
    </div>
    
    <div class="form-group">
        
        <input type="submit" name='Update' value='Update Profile' class="btn btn-primary">
    </div>

</form>
    </div>
    </div>
    </div>
    </div>
    </div>
    <?php } } ?>
<?php
if (isset($_POST['Update'])){
    $user_id=$_SESSION['user_id'];
   
    
    $user_email=$_POST['user_email'];
    $user_name=$_POST['user_name'];
    $user_first_name=$_POST['user_first_name'];
    $user_last_name=$_POST['user_last_name'];
    $user_role=$_POST['user_role'];


    editUserProfile( $user_id,$user_first_name,$user_last_name,$user_email,$user_name,$user_role);


    


}
include "includes/footer.php";


?>