<form action="" method="post" enctype='multipart/form-data'>
    <div class="form-group">
        <label for="user_first_name">First Name</label>
        <input type="text" name='user_first_name' class="form-control">
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" name='user_last_name' class="form-control">
    </div>
    <div class="form-group">
    <select name="user_role" id="">
        <option value="admin">admin</option>
        <option value="subscriber">subscriber</option>
        
        </select>
    </div>
    <div class="form-group">
        <label for="user_name">User Name</label>
        <input type="text" name='user_name' class="form-control">
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="text" name='user_email'class='form-control' >
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type='text' name='user_password'  class="form-control"> 
    </div>
    
    <div class="form-group">
        
        <input type="submit" name='register' value='Register' class="btn btn-primary">
    </div>

</form>

<?php 
 addUser();
 
 

?>