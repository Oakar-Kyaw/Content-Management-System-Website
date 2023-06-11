<?php



if(isset($_POST['Update'])){
    $id=$_GET['edit_user'];
    $user_email=$_POST['user_email'];
    if($user_email == $_SESSION['user_email'] ){
        $user_password=$_POST['user_password'];
        $user_password=password_hash($user_password, PASSWORD_ARGON2I); 
       
    }
    else {
       
        $edit_id = $_GET['edit_user'];
        $edit_query_result=queryToEditUser($edit_id);
        while($row=mysqli_fetch_assoc( $edit_query_result)){
            $user_password=$row['user_password'];
            
            
        }
        
    }
   
       
    $user_name=$_POST['user_name'];
    $user_first_name=$_POST['user_first_name'];
    $user_last_name=$_POST['user_last_name'];
    $user_role=$_POST['user_role'];
    
    editUser($id,$user_first_name,$user_last_name,$user_email,$user_password,$user_name, $user_role);
}
if(isset($_GET['edit_user'])) {
    $edit_user_id = $_GET['edit_user'];
    $edit_user_query_result=queryToEditUser($edit_user_id);
    while($row=mysqli_fetch_assoc( $edit_user_query_result)){
        $id=$row['user_id'];
        $user_email=$row['user_email'];
        $user_name=$row['user_name'];
        $user_first_name=$row['user_first_name'];
        $user_last_name=$row['user_last_name'];
        $user_role=$row['user_role'];
        
 }} 

?>


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
        <?php 
        if($user_role=="admin"){
            echo "<option value='subscriber'>subscriber</option>";
        }
        else {
           echo  "<option value='admin'>admin</option>?>";
        }
       ?>
        
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
        
        <input type="submit" name='Update' value='Update' class="btn btn-primary">
    </div>

</form>
