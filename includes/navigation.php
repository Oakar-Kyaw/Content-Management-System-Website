<?php include 'db.php';
 session_start();
 $cat_active='';
 $contact_active='';
 $register_active='';
 if (isset($_GET['cat_id'])){
    $cat_id= $_GET['cat_id'];
 }
 
$pagelink=  basename($_SERVER['PHP_SELF']); //php url
if($pagelink=='categories.php'){
    $cat_active='active';
}
else if ($pagelink=='contact.php'){
    $contact_active="active";
}
else if($pagelink=='registration.php') {
    $register_active="active";
}
?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./index.php">CMS BLOG</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">


                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>

                     <?php 
                    $query= "SELECT * FROM categories";
                    $select_all_from_categories= mysqli_query($connection,$query);
                    while ($row=mysqli_fetch_assoc($select_all_from_categories)){   
                        $categories_id= $row['cat_id'];
                        $categories= $row['cat_title'];
                        if (!empty($cat_id) && $cat_id==$categories_id){
                            echo "<li class={$cat_active} >
                        <a href='./categories.php?cat_id=$categories_id'>$categories</a>
                        </li>" ;
                        }
                        else {
                            echo "<li >
                            <a href='./categories.php?cat_id=$categories_id'>$categories</a>
                            </li>" ;
                        }
                    }
                    
                    ?>


                    <li class=<?php echo $contact_active; ?>>
                        <a  href="./contact.php">Contact</a>
                    </li>
                    <li class=<?php echo $register_active; ?>>
                        <a href="./registration.php">Register</a>
                    </li>
                    <li>
                        <?php 
                        if(isset($_SESSION['user_role'])){
                        if ( $_SESSION['user_role']=== 'admin'){
                                $route='admin/index.php';
                        }
                       else {
                        $route='./index.php';
                       } 
                        
                        echo "<a href='$route'>Admin</a>";
                        }
                        
                        ?>
                    </li>
                   


                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
